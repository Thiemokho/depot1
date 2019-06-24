<?php
	$link = get_post_meta( get_the_ID(), 'testimonial_link', true);
	$job = get_post_meta( get_the_ID(), 'testimonials_job', true);
?>
<div class="testimonials-v4">
	<div class="testimonials-body text-center">
		
		<div class="testimonials-quote">
			<i class="fa fa-quote-left"></i>
			<?php the_content() ?>
		</div>

		<div class="testimonials-profile">
			<div class="testimonials-avatar radius-x">
				  <?php the_post_thumbnail('widget', '', 'class="radius-x"');?>
			</div> 
			<h4 class="name"> <?php the_title(); ?></h4>
			<?php if(!empty($job) ): ?>
				<div class="job"><?php echo trim($job); ?></div>
			 <?php endif; ?>
		</div>

	</div>
</div>