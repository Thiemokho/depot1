<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$items = (array) vc_param_group_parse_atts( $items );

if ( !empty($items) ):

	$_total = count($items);
	$columns_count = 1;
?>
	<div class="widget widget-carvideo style-lighten text-center <?php echo ($el_class!='')?' '.esc_attr( $el_class ):''; ?>">
		
			<?php if($title!=''):?>
				<div class="tabs-container tab-heading text-center clearfix">
					<h3 class="widget-title">
		        		<span><span><?php echo esc_attr( $title ); ?></span></span>
		        		<?php if ($subtitle != '') {?>
		        			<span class="subtitle"><?php echo esc_attr( $subtitle ); ?></span>
		        		<?php } ?>
					</h3>
				</div>
			<?php endif; ?>
		
			<div class="owl-carousel-play" data-ride="owlcarousel">         
    
	        	<?php if ($_total > $columns_count) { ?>
	            <div class="carousel-controls carousel-controls-v3 hidden">
	                <a class="left carousel-control carousel-md" href="#" data-slide="prev"><span class="fa fa-angle-left"></span></a>
	                <a class="right carousel-control carousel-md" href="#" data-slide="next"><span class="fa fa-angle-right"></span></a>
	            </div> 
	        	<?php } ?>
		      <div class="owl-carousel" data-slide="<?php echo esc_attr($columns_count); ?>" data-pagination="true" data-navigation="true">
					<?php foreach ($items as $item): ?>
						<div class="item">
							<?php if ( isset($item['image']) && !empty($item['image']) ): ?>
								<?php $img = wp_get_attachment_image_src($item['image'],'full'); ?>
								<?php if ( !empty($img) && isset($img[0]) ): ?>
									<?php if ( isset($item['video_link']) && !empty($item['video_link']) ):?>
										<div class="image-video-wrapper" data-video="<?php echo esc_url($item['video_link']);?>">
										<div class="video-content">
											<span class="icon"><i class="fa fa-play"></i></span>
											<?php if ( isset($item['title']) && !empty($item['title']) ): ?>
						                    	<h3 class="title-video"><?php echo trim($item['title']); ?></h3>
						                    <?php endif; ?>
										</div>										
									<?php endif; ?>
				                    	<img src="<?php echo esc_url_raw($img[0]); ?>" alt="">
			                    	<?php if ( isset($item['video_link']) && !empty($item['video_link']) ):?>
				                    	</div>
				                    	<div class="video-wrapper">
				                    	</div>
				                    <?php endif; ?>
				                <?php endif; ?>
		                    <?php endif; ?>

						</div>
					<?php endforeach; ?>
				</div>
			</div>
	</div>
<?php endif; ?>