<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$layout=theme_get_option('blog','layout');
$content_width = ($layout === 'full')? 960: 630;
get_header(); ?>
<?php echo theme_generator('introduce');?>
<div id="page">
	<div class="inner <?php if($layout=='right'):?>right_sidebar<?php endif;?><?php if($layout=='left'):?>left_sidebar<?php endif;?>">
		<?php echo theme_generator('breadcrumbs');?>
		<div id="main">
			<div class="content">
			<?php 
				get_template_part('loop','archive');
			?>
				<div class="clearboth"></div>
			</div>
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
		</div>
		<?php if($layout != 'full') get_sidebar(); ?>
		<div class="clearboth"></div>
	</div>
</div>
<?php get_footer(); ?>
