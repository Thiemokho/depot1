<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WpOpal
 * @subpackage fullhouse
 * @since fullhouse 1.0
 */
global $fullhouse_page_layouts; 

if( isset($fullhouse_page_layouts['sidebars']) ): $sidebars = $fullhouse_page_layouts['sidebars']; 
?> 
	<?php if ( $sidebars['left']['active'] ) : ?>
	<div class="<?php echo esc_attr($sidebars['left']['class']) ;?> pull-left <?php  if( fullhouse_fnc_theme_options('stickysidebar') ) : ?> sidebar-wrapper<?php endif; ?>">
	  <aside class="sidebar sidebar-left" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	   	<?php dynamic_sidebar( $sidebars['left']['sidebar'] ); ?>
	  </aside>
	</div>
	<?php endif; ?>
 	
 	<?php if ( $sidebars['right']['active'] ) : ?>
	<div class="<?php echo esc_attr($sidebars['right']['class']) ;?> pull-right <?php  if( fullhouse_fnc_theme_options('stickysidebar') ) : ?> sidebar-wrapper<?php endif; ?>">
	  <aside class="sidebar sidebar-right" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	   	<?php dynamic_sidebar( $sidebars['right']['sidebar'] ); ?>
	  </aside>
	</div>
	<?php endif; ?>
<?php endif; ?> 

