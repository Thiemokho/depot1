<?php
/**
 * Implement Custom Header functionality for mode
 *
 * @package WpOpal
 * @subpackage fullhouse
 * @since fullhouse 1.0
 */

/**
 * Set up the WordPress core custom header settings.
 *
 * @since fullhouse 1.0
 *
 * @uses fullhouse_fnc_header_style()
 * @uses fullhouse_fnc_admin_header_style()
 * @uses fullhouse_fnc_admin_header_image()
 */
function fullhouse_fnc_custom_header_setup() {
	/**
	 * Filter mode custom-header support arguments.
	 *
	 * @since fullhouse 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type bool   $header_text            Whether to display custom header text. Default false.
	 *     @type int    $width                  Width in pixels of the custom header image. Default 1260.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 240.
	 *     @type bool   $flex_height            Whether to allow flexible-height header images. Default true.
	 *     @type string $admin_head_callback    Callback function used to style the image displayed in
	 *                                          the Appearance > Header screen.
	 *     @type string $admin_preview_callback Callback function used to create the custom header markup in
	 *                                          the Appearance > Header screen.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'fullhouse_fnc_custom_header_args', array(
		'default-text-color'     => 'fff',
		'width'                  => 1260,
		'height'                 => 240,
		'flex-height'            => true,
		'wp-head-callback'       => 'fullhouse_fnc_header_style',
		'admin-head-callback'    => 'fullhouse_fnc_admin_header_style',
		'admin-preview-callback' => 'fullhouse_fnc_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'fullhouse_fnc_custom_header_setup' );

if ( ! function_exists( 'fullhouse_fnc_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see fullhouse_fnc_custom_header_setup().
 *
 */
function fullhouse_fnc_header_style() {  
	$text_color = get_header_textcolor(); 

	// If no custom color for text is set, let's bail.
	

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="fullhouse-header-css">
		<?php 
		$theme_color = get_option('theme_color');
		if( !empty($theme_color) && preg_match("#\##", $theme_color) ) :  ?>
		a.pbr-user-login, .searchform:hover .pbr-search .input-group-addon , .search-properies-form ul.list-property-status li.active , .noUi-base, .btn-primary, #property-filter-status .list-property-status li.active, #property-filter-status .list-property-status li:hover, .opalestate-rows article:hover .property-meta-list, .team-header .agent-levels, .pbr-footer-wrapper , .owl-controls .owl-page.active span , .bg-primary , .pbr-footer .widget .widget-title:after, .pbr-footer .widget .widgettitle:after , .scrollup , .counters .counter-wrap .counter:after , .widget-text-heading.style-2 .widget-heading > span:first-child:before , .vc_tta.vc_tta-style-flat .vc_tta-panels-container .vc_tta-panel-body .vc_toggle .vc_toggle_title i.vc_toggle_icon, .form-title:after, .pbr-pagination .pagination > li.active a, .pbr-pagination .pagination > li span.current, .pbr-pagination .pagination > li a:hover, .widget .widget-title:after, .widget .widgettitle:after, .single-opalestate-container > article .property-price, .property-preview .carousel-control:hover, .property-preview .carousel-control:focus, .google-map-tabs .nav.nav-tabs > li.active > a, .comments .comment-reply-title:before, .comments .comments-title:before , .entry-content-page .slider-property-featured-wrapper .slider-property-featured .widget-estate-property .opalestate-rows article .property-meta .property-meta-list {
			background-color:<?php echo trim($theme_color); ?>!important;
		}
		a.pbr-user-login, .search-properies-form .btn-search, .btn-3d.btn-primary, .wpcf7-form .contact-form-3 .wpcf7-submit, .comment-form .form-submit .btn {
			box-shadow: 0 2px <?php echo trim($theme_color); ?> inset !important;
		}
		a:hover, .text-primary, .navbar-mega .navbar-nav li.active > a, .navbar-mega .navbar-nav li.active > a .caret, .navbar-mega .navbar-nav li > a:hover .caret, .navbar-mega .navbar-nav li > a:focus .caret, .opalestate-rows article .property-price , .display-mode .btn:hover, i.property-toggle-favorite:hover, .opalestate_agent .bo-social-icons [class^="bo-social-"]:hover i, #pbr-footer .widget_pbr_socials_widget ul > li a:hover i, .counters .counter-wrap , .history-timeline .entry-timeline .content-inner h4 , .testimonials.testimonials-v5 .testimonials-body .media-left:before, .vc_tta.vc_tta-style-flat .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active > a, .vc_tta.vc_tta-style-flat .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab:hover > a , .page-template-404 .page-title, .error404 .page-title, .opalestate-results span, .feature-box.feature-box-v3 .fbox-icon .icons, article.post .post-sub-content .entry-date {
			color: <?php echo trim($theme_color); ?>!important;
		}
		#content .vc_row .widget .widget-title:after, #content .vc_row .widget .widgettitle:after, .opalestate_agent .bo-social-icons [class^="bo-social-"]:hover, .widget-text-heading:after , .owl-controls .owl-page span , .btn-primary {
			border-color: <?php echo trim($theme_color); ?>!important;
		}
		.btn-primary:hover, a.pbr-user-login:hover, .pbr-pagination .pagination > li.active a, .pbr-pagination .pagination > li span.current, .pbr-pagination .pagination > li a:hover {
			color: #fff !important;
		}
		<?php endif; ?>

		<?php 
		$sencondary_color = get_option('sencondary_color');
		if( !empty($sencondary_color) && preg_match("#\##", $sencondary_color) ) :  ?>
		.noUi-base, .team-header .agent-levels, .scrollup,   .search-properies-form ul.list-property-status li.active , .noUi-connect, .bg-primary,
		.comment-form .form-submit .btn, button.btn-danger, button.btn-primary ,
		#property-filter-status .list-property-status li.active, #property-filter-status .list-property-status li:hover
		 {
			background-color:<?php echo trim($sencondary_color); ?>!important;
			border-color:<?php echo trim($sencondary_color); ?>!important;
		}
		.search-properies-form ul.list-property-status li.active::before, #property-filter-status .list-property-status li::after{
			border-top: solid 9px <?php echo trim($sencondary_color); ?>!important;
		}
		article.post .post-sub-content .entry-date, .navbar-mega .navbar-nav li.active > a .caret{
			color:<?php echo trim($sencondary_color); ?>!important;
		}
		<?php endif; ?>

		<?php 
		$page_bg = get_option('page_bg');
		if( !empty($page_bg) && preg_match("#\##", $page_bg) ) :  ?>
		#page{ background-color:<?php echo trim($page_bg); ?>; }
		<?php endif; ?>
		<?php 
		$footer_bg = get_option('footer_bg');
		if( !empty($footer_bg) && preg_match("#\##", $footer_bg) ) :  ?>
		#pbr-footer { background-color:<?php echo trim($footer_bg); ?> ; }
		<?php endif; ?>
		<?php 
		$footer_color = get_option('footer_color');
		if( !empty($footer_color) && preg_match("#\##", $footer_color) ) :  ?>
		#pbr-footer , #pbr-footer a{ color: <?php echo trim($footer_color); ?> }
		<?php endif; ?>
		<?php
		$footer_color = get_option('footer_heading_color');
		if( !empty($footer_color) && preg_match("#\##", $footer_color) ) :  ?>
		#pbr-footer h2, #pbr-footer h3, #pbr-footer h4{ color: <?php echo trim($footer_color); ?> }
		<?php endif; ?>
		<?php $topnav_bg = get_option('topnav_bg'); if( !empty($topnav_bg) && preg_match("#\##", $topnav_bg) ) :  ?>
		#pbr-masthead.header-absolute, #pbr-masthead{ background-color:<?php echo trim($topnav_bg); ?> !important; }
		<?php endif; ?>
		<?php $topnav_color = get_option('topnav_color'); if( !empty($topnav_color) && preg_match("#\##", $topnav_color) ) :  ?>
		.navbar-mega .navbar-nav li > a, .navbar-mega .navbar-nav li.active > a{ color: <?php echo trim($topnav_color); ?> }
		<?php endif; ?>
		<?php 
		$copyright_bg = get_option('copyright_bg');
		if( !empty($copyright_bg) && preg_match("#\##", $copyright_bg) ) :  ?>
		.pbr-copyright { background-color:<?php echo trim($copyright_bg); ?> ;}
		<?php endif; ?>

		<?php 
		$copyright_color = get_option('copyright_color');
		if( !empty($copyright_color) && preg_match("#\##", $copyright_color) ) :  ?>
		.pbr-copyright , .pbr-copyright  a{ color:<?php echo trim($copyright_color); ?> ; }
		<?php endif; ?>

	</style>

	<?php if ( display_header_text() && $text_color === get_theme_support( 'custom-header', 'default-text-color' ) )
		return; ?>
	<?php
}
endif; // fullhouse_fnc_header_style


if ( ! function_exists( 'fullhouse_fnc_admin_header_style' ) ) :
/**
 * Style the header image displayed on the Appearance > Header screen.
 *
 * @see fullhouse_fnc_custom_header_setup()
 *
 * @since fullhouse 1.0
 */
function fullhouse_fnc_admin_header_style() {  
?>
	<style type="text/css" id="fullhouse-admin-header-css">
	.appearance_page_custom-header #headimg {
		background-color: #000;
		border: none;
		max-width: 1260px;
		min-height: 48px;
	}
	#headimg h1 {
		font-family: Lato, sans-serif;
		font-size: 18px;
		line-height: 48px;
		margin: 0 0 0 30px;
	}
	.rtl #headimg h1  {
		margin: 0 30px 0 0;
	}
	#headimg h1 a {
		color: #fff;
		text-decoration: none;
	}
	#headimg img {
		vertical-align: middle;
	}

<?php
}
endif; // fullhouse_fnc_admin_header_style

if ( ! function_exists( 'fullhouse_fnc_admin_header_image' ) ) :
/**
 * Create the custom header image markup displayed on the Appearance > Header screen.
 *
 * @see fullhouse_fnc_custom_header_setup()
 *
 * @since fullhouse 1.0
 */
function fullhouse_fnc_admin_header_image() {
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
		<h1 class="displaying-header-text"><a id="name" style="<?php echo esc_attr( sprintf( 'color: #%s;', get_header_textcolor() ) ); ?>" onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>" tabindex="-1"><?php bloginfo( 'name' ); ?></a></h1>
	</div>
<?php
}
endif; // fullhouse_fnc_admin_header_image