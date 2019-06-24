<?php
$grid_link = $grid_layout_mode = $title = $filter= '';
$posts = array();

$layout = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if(empty($loop)) return;
$this->getLoop($loop);
$args = $this->loop_args;

if(is_front_page()){
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
}
else{
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}
$args['paged'] = $paged; 
$post_per_page = $args['posts_per_page']; 
 
$loop = new WP_Query($args);
?>

<section class="widget  widget-style frontpage-3 layout-<?php echo esc_attr($layout); ?>  <?php echo (($el_class!='')?' '.$el_class:''); ?>">
    <?php
        if($title!=''){ ?>
            <h3 class="widget-title visual-title">
                <span><?php echo trim($title); ?></span>
            </h3>
        <?php }
    ?>
    <div class="widget-content"> 
      <?php
        /**
         * $loop
         * $class_column
         *
         */

        $_count =0;

        $colums = $grid_columns;
        $bscol = floor( 12/$colums );

        ?>
        <?php
            $i =0; while($loop->have_posts()){  $loop->the_post(); ?>

             <?php if(  $i++%$colums==0 ) {  ?>
            <div class="post-item"><div class="row">
            <?php } ?>
            <div class="col-sm-<?php echo esc_attr($bscol); ?>">
                <article class="post">
                    <div class="entry-content">

                    	<header class="entry-content-header clearfix">
                    		<div class="entry-date text-primary pull-left">
                    		<span><?php the_time( 'j' ); ?></span>&nbsp;<?php the_time( 'F' ); ?>
                            </div>
                            <div class="entry-category pull-left">
                                <?php esc_html_e('in', 'fullhouse'); ?>
			                    <?php the_category(); ?>
			                </div>
			                <div class="entry-comment pull-left">
                                
                                <ul class="list-inline">
                                    <li class="comment-count">
                                        <?php comments_popup_link(esc_html__(' 0 ', 'fullhouse'), esc_html__(' 1 ', 'fullhouse'), esc_html__(' % ', 'fullhouse')); ?>
                                    </li>
                                    <li><?php esc_html_e('Comments', 'fullhouse'); ?></li>
                                </ul>
                            </div>
                    	</header><!-- /header -->
                       
                        <?php if (get_the_title()) { ?>
                            <h5 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h5>
                        <?php  } ?>
                        <div class="entry-excerpt">
                        	<?php echo fullhouse_fnc_excerpt(28,'...');; ?>
                        </div>
                    </div>
                </article>
            </div>
            <?php if(  ($i%$colums==0) || $i == $loop->post_count) {  ?>
            </div></div>
            <?php } ?>
        <?php   }  ?>
         


    </div>
        <?php if( isset($show_pagination) && $show_pagination ): ?>
        <div class="w-pagination"><?php fullhouse_fnc_pagination_nav( $post_per_page,$loop->found_posts,$loop->max_num_pages ); ?></div>
        <?php endif ; ?>
</section>
<?php wp_reset_postdata(); ?>