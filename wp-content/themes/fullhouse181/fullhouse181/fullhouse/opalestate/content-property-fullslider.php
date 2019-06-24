<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $property, $post; 
$property = opalesetate_property( get_the_ID() );
?>
<article itemscope itemtype="http://schema.org/Property" <?php post_class(); ?>>

	<header>
		<?php opalestate_get_loop_thumbnail( opalestate_get_option('featured_image_size','full') ); ?>
	</header>

	<div class="entry-content-wrapper">
		<div class="property-group-label">
			<?php do_action( 'opalestate_before_property_loop_item' ); ?>
		</div>
		<div class="entry-content">
			<?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
				
			<div class="entry-summary">
				<?php echo $property->get_address(); ?>
			</div>
		</div><!-- .entry-content -->

		<?php opalestate_property_loop_price(); ?>

	</div>

	<?php  do_action( 'opalestate_after_property_loop_item' ); ?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</article><!-- #post-## -->
