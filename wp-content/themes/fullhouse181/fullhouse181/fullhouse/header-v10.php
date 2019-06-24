<?php
/**
 * The Header for our theme: Top has Logo left + search right . Below is horizal main menu
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Prestabrain
 * @subpackage Presta_Base
 * @since PrestaBase 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
 
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site"><div class="pbr-page-inner row-offcanvas row-offcanvas-left">
	<?php if ( get_header_image() ) : ?>
	<div id="site-header" class="hidden-xs hidden-sm">
		<a href="<?php echo esc_url( get_option('header_image_link','#') ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
		</a>
	</div>
	<?php endif; ?>
	<?php do_action( 'fullhouse_template_header_before' ); ?>
	<header id="pbr-masthead" class="site-header header-v10 <?php  if( fullhouse_fnc_theme_options('keepheader') ) : ?> keep-header<?php endif; ?>" role="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="header-inner">
						
						<div class="logo-wrapper">
							<?php get_template_part( 'page-templates/parts/logo' ); ?>
						</div>

						<div class="header-main">
							<div class="header-top clearfix">
								<div class="pull-right clearfix">
									<div class="header-sidebar-right hidden-xs pull-left">
										<?php dynamic_sidebar( 'header-sidebar-right' ); ?>
									</div>
									<div class="submit-link-wrapper pull-left">
										<?php
											global $opalestate_options;
											$page_id = $opalestate_options['submission_page'];
													$page_link = ($page_id == "#") ? $page_id : get_page_link($page_id); ?>
										<a class="submit-link" href="<?php echo esc_url($page_link); ?>"><i class="fa fa-upload"></i><span><?php esc_html_e('Submit a property','fullhouse'); ?></span></a>
									</div>
								</div>
							</div>
							<div class="header-bottom clearfix">
								<section id="pbr-mainmenu" class="pbr-mainmenu clearfix">

									<div class="inner navbar-mega-simple pull-left"><?php get_template_part( 'page-templates/parts/nav' ); ?></div>

								</section>
								<!-- #pbr-mainmenu -->
							</div>
						</div>

					</div>

				</div>
				<!-- .col-md-12 -->
			</div>
		</div>
	</header><!-- #masthead -->

	<?php do_action( 'fullhouse_template_header_after' ); ?>
	
	<section id="main" class="site-main">
