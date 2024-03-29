<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if (!function_exists('WP_Filesystem')) {
     require ABSPATH . 'wp-admin/includes/file.php';
}
WP_Filesystem();

function theme_install_dummy_data($demotype){
	define('WP_LOAD_IMPORTERS', true);

	if ( !class_exists( 'WP_Import' ) ) {
		require_once (THEME_PLUGINS . '/wordpress-importer/wordpress-importer.php');
	}
	if (empty($demotype)) $demo_type = theme_get_option('advanced','demotype');
	else $demo_type=$demotype;
	
	//if (empty($demo_type)) $demo_type='large';
	$demoarray= array('large','small','wooshop');
	if (!in_array($demo_type, $demoarray)) $demo_type='large';

	$demo_server_url='http://kaptinlin.com/demo-content/';
	$demo_destination_url=THEME_CACHE_DIR."/demo-content/";
	$demo_type_path=$demo_destination_url.$demo_type;
	
	remove_all_content_demo_folder($demo_destination_url,$demo_destination_url);
	
	$result = theme_get_demo_content($demo_server_url,$demo_type.'.zip');
	if (!is_wp_error($result)) {
		$result = theme_get_demo_content($demo_server_url,'revsliders.zip');
	}
	if (is_wp_error($result)){
		echo __('Error retrieving demo files from server.', 'theme_admin');
		return;
	}
	
	$content_xml = $demo_type_path.'/content.txt';

	if(!is_file($content_xml)) {
		remove_all_content_demo_folder($demo_destination_url,$demo_destination_url);
		echo sprintf(__("The XML file containing the dummy content is not available or could not be read in <pre>%s</pre>", 'theme_admin'), $content_xml);
	} else {
		$wp_import = new WP_Import();
		$wp_import->fetch_attachments = true;
		$wp_import->import($content_xml);

		theme_install_dummy_menus();
		theme_install_dummy_options($demo_type_path);
		theme_install_dummy_widgets($demo_type_path);
		theme_install_revslider_demos($demo_type,$demo_destination_url);

		theme_check_image_folder();
		theme_clear_cache();
		theme_save_skin_style();
		remove_all_content_demo_folder($demo_destination_url,$demo_destination_url);
		echo ( 'Done !');
	}
}


function theme_get_demo_content($from='',$file_name='') {

	global $wp_filesystem;
	//WP_Filesystem();

	$from=$from.$file_name;
	$to = THEME_CACHE_DIR."/demo-content/".$file_name;
	
	$to_dir = dirname($to);
	if(!$wp_filesystem->is_dir($to_dir)){
		$result = theme_file_mkdir($to_dir);
		if ( is_wp_error($result) )
			return $result;
	}
	if ( ! $wp_filesystem->copy( $from, $to, true, FS_CHMOD_FILE) )
		return new WP_Error('copy_failed', __('Could not copy file.','theme_admin'), $from);
	$result = unzip_file( $to,$to_dir  );
	if ( is_wp_error($result)) 	return $result;
	return '';
}	

function theme_file_mkdir($dir){
	global $wp_filesystem;
	$parent_dir = dirname($dir);
	if(!$wp_filesystem->is_dir($parent_dir)){
		$result = _copy_theme_file_mkdir($parent_dir);
		if ( is_wp_error($result) )
			return $result;
	}
	if ( !$wp_filesystem->mkdir($dir, FS_CHMOD_DIR) )
		return new WP_Error('mkdir_failed', __('Could not create directory.','theme_admin'), $dir);
}

function remove_all_content_demo_folder($path,$base='') {
	if (empty($path)) return;
	$files = glob($path . '/*');
	foreach ($files as $file) {
		is_dir($file) ? remove_all_content_demo_folder($file) : unlink($file);
	}
	if ($path!=$base) rmdir($path);
	return;
}


function theme_install_dummy_menus() {
	global $wpdb;
	$table_db_name = $wpdb->prefix . "terms";
	$rows = $wpdb->get_results("SELECT * FROM $table_db_name where name='Main Navigation' OR name='Footer Menu'",ARRAY_A);
	$menu_ids = array();
	foreach($rows as $row) {
		$menu_ids[$row["name"]] = $row["term_id"] ;
	}
	$locations = get_nav_menu_locations();
	if( !has_nav_menu( 'primary-menu' ) ){
		$locations['primary-menu'] = (int)$menu_ids['Main Navigation'];
	}
	if( !has_nav_menu( 'footer-menu' ) ){
		$locations['footer-menu'] = (int)$menu_ids['Footer Menu'];
	}
	set_theme_mod( 'nav_menu_locations', $locations );
}

function theme_install_dummy_options($demo_type_path) {
	$dummy_options = $demo_type_path.'/options.txt';
	if(is_file($dummy_options)) {
		$data = file_get_contents($dummy_options);
		$options_array = unserialize( base64_decode( $data ) );
		if(is_array($options_array)){
			foreach($options_array as $name => $options){
				update_option('theme_' . $name, $options);
			}
		}
	}
}

/* thanks to Steven Gliebe (Widget Importer & Exporter) */

function theme_wie_available_widgets() {

	global $wp_registered_widget_controls;

	$widget_controls = $wp_registered_widget_controls;

	$available_widgets = array();

	foreach ( $widget_controls as $widget ) {

		if ( ! empty( $widget['id_base'] ) && ! isset( $available_widgets[$widget['id_base']] ) ) { // no dupes

			$available_widgets[$widget['id_base']]['id_base'] = $widget['id_base'];
			$available_widgets[$widget['id_base']]['name'] = $widget['name'];

		}

	}

	return apply_filters( 'theme_wie_available_widgets', $available_widgets );

}

function theme_install_dummy_widgets($demo_type_path) {
	global $_sidebarGenerator;
	$_sidebarGenerator = new sidebarGenerator;
	$_sidebarGenerator->register_sidebar();

	$dummy_widgets = $demo_type_path.'/widgets.php';
	if(!is_file($dummy_widgets)){
		return;
	}
	//$file = $dummy_widgets;
	//$data = file_get_contents( $file );
	$data = include ($dummy_widgets);	
	$data = json_decode( $data );	

	// Have valid data?
	// If no data or could not decode
	if ( empty( $data ) || ! is_object( $data ) ) {
		return;
	} 


	global $wp_registered_sidebars;
	
	//do_action( 'wie_before_import' );
	$data = apply_filters( 'wie_import_data', $data );

	// Get all available widgets site supports
	$available_widgets = theme_wie_available_widgets();

	// Get all existing widget instances
	$widget_instances = array();
	foreach ( $available_widgets as $widget_data ) {
		$widget_instances[$widget_data['id_base']] = get_option( 'widget_' . $widget_data['id_base'] );
	}

	// Loop import data's sidebars
	foreach ( $data as $sidebar_id => $widgets ) {

		// Skip inactive widgets
		// (should not be in export file)
		if ( 'wp_inactive_widgets' == $sidebar_id ) {
			continue;
		}

		// Check if sidebar is available on this site
		// Otherwise add widgets to inactive, and say so
		if ( isset( $wp_registered_sidebars[$sidebar_id] ) ) {
			$sidebar_available = true;
			$use_sidebar_id = $sidebar_id;
		} else {
			$sidebar_available = false;
			$use_sidebar_id = 'wp_inactive_widgets'; // add to inactive if sidebar does not exist in theme
		}

		// Loop widgets
		foreach ( $widgets as $widget_instance_id => $widget ) {

			$fail = false;

			// Get id_base (remove -# from end) and instance ID number
			$id_base = preg_replace( '/-[0-9]+$/', '', $widget_instance_id );
			$instance_id_number = str_replace( $id_base . '-', '', $widget_instance_id );

			// Does site support this widget?
			if ( ! $fail && ! isset( $available_widgets[$id_base] ) ) {
				$fail = true;
			}

			// Filter to modify settings object before conversion to array and import
			// Leave this filter here for backwards compatibility with manipulating objects (before conversion to array below)
			// Ideally the newer wie_widget_settings_array below will be used instead of this
			$widget = apply_filters( 'wie_widget_settings', $widget ); // object

			// Convert multidimensional objects to multidimensional arrays
			// Some plugins like Jetpack Widget Visibility store settings as multidimensional arrays
			// Without this, they are imported as objects and cause fatal error on Widgets page
			// If this creates problems for plugins that do actually intend settings in objects then may need to consider other approach: https://wordpress.org/support/topic/problem-with-array-of-arrays
			// It is probably much more likely that arrays are used than objects, however
			$widget = json_decode( wp_json_encode( $widget ), true );

			// Filter to modify settings array
			// This is preferred over the older wie_widget_settings filter above
			// Do before identical check because changes may make it identical to end result (such as URL replacements)
			$widget = apply_filters( 'wie_widget_settings_array', $widget );

			// Does widget with identical settings already exist in same sidebar?
			if ( ! $fail && isset( $widget_instances[$id_base] ) ) {

				// Get existing widgets in this sidebar
				$sidebars_widgets = get_option( 'sidebars_widgets' );
				$sidebar_widgets = isset( $sidebars_widgets[$use_sidebar_id] ) ? $sidebars_widgets[$use_sidebar_id] : array(); // check Inactive if that's where will go

				// Loop widgets with ID base
				$single_widget_instances = ! empty( $widget_instances[$id_base] ) ? $widget_instances[$id_base] : array();
				foreach ( $single_widget_instances as $check_id => $check_widget ) {

					// Is widget in same sidebar and has identical settings?
					if ( in_array( "$id_base-$check_id", $sidebar_widgets ) && (array) $widget == $check_widget ) {

						$fail = true;

						break;

					}

				}

			}

			// No failure
			if ( ! $fail ) {

				// Add widget instance
				$single_widget_instances = get_option( 'widget_' . $id_base ); // all instances for that widget ID base, get fresh every time
				$single_widget_instances = ! empty( $single_widget_instances ) ? $single_widget_instances : array( '_multiwidget' => 1 ); // start fresh if have to
				$single_widget_instances[] = $widget; // add it

					// Get the key it was given
					end( $single_widget_instances );
					$new_instance_id_number = key( $single_widget_instances );

					// If key is 0, make it 1
					// When 0, an issue can occur where adding a widget causes data from other widget to load, and the widget doesn't stick (reload wipes it)
					if ( '0' === strval( $new_instance_id_number ) ) {
						$new_instance_id_number = 1;
						$single_widget_instances[$new_instance_id_number] = $single_widget_instances[0];
						unset( $single_widget_instances[0] );
					}

					// Move _multiwidget to end of array for uniformity
					if ( isset( $single_widget_instances['_multiwidget'] ) ) {
						$multiwidget = $single_widget_instances['_multiwidget'];
						unset( $single_widget_instances['_multiwidget'] );
						$single_widget_instances['_multiwidget'] = $multiwidget;
					}

					// Update option with new widget
					update_option( 'widget_' . $id_base, $single_widget_instances );

				// Assign widget instance to sidebar
				$sidebars_widgets = get_option( 'sidebars_widgets' ); // which sidebars have which widgets, get fresh every time
				// Avoid rarely fatal error when the option is an empty string
				if ( ! $sidebars_widgets ) {
					$sidebars_widgets = array();
				}
				$new_instance_id = $id_base . '-' . $new_instance_id_number; // use ID number from new widget instance
				$sidebars_widgets[$use_sidebar_id][] = $new_instance_id; // add new instance to sidebar
				update_option( 'sidebars_widgets', $sidebars_widgets ); // save the amended data
				// After widget import action
				$after_widget_import = array(
					'sidebar'           => $use_sidebar_id,
					'sidebar_old'       => $sidebar_id,
					'widget'            => $widget,
					'widget_type'       => $id_base,
					'widget_id'         => $new_instance_id,
					'widget_id_old'     => $widget_instance_id,
					'widget_id_num'     => $new_instance_id_number,
					'widget_id_num_old' => $instance_id_number
				);
				do_action( 'wie_after_widget_import', $after_widget_import );
			}
		}
	}
}

function theme_install_revslider_demos($demo_type,$demo_destination_url) {
	if(class_exists('RevSliderAdmin')){
		//Set defaults
		$slider_to_import = array("splashpage.zip","homepage.zip");
		$revslider_path = $demo_destination_url.'revsliders/';

		switch($demo_type) {
			case 'large':
				$revslider_path = $demo_destination_url.'revsliders/';
				$slider_to_import = array("splashpage.zip","homepage.zip");
				break;
			case 'small':
				$revslider_path = $demo_destination_url.'revsliders/';
				$slider_to_import = array("homepage.zip");
				break;
			case 'wooshop':
				$revslider_path = $demo_destination_url.'revsliders/';
				$slider_to_import = array("homepage.zip");
				break;
		}

		$slider = new RevSlider();

		if (!empty($slider_to_import)) {
			foreach($slider_to_import as $slider_file){
				if(file_exists($revslider_path.$slider_file)) $response=$slider->importSliderFromPost(true,true,$revslider_path.$slider_file);
			}
		}
	}
}