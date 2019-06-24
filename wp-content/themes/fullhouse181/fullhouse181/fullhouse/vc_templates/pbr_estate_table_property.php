<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if( class_exists("Opalestate_Query") ):

    if(is_front_page()){
        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    }
    else{
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    }

    $args =  array("posts_per_page"=>$limit, 'paged' => $paged);

    $query = Opalestate_Query::get_property_query( $args );

    ?>
    <div class="widget widget-estate-property">

        <div class="widget-content">
            <?php if( isset($showsortby) && $showsortby ): ?>
                <?php echo Opalestate_Template_Loader::get_template_part( 'collection-navigator', array('mode'=>'list' ) ); ?>
            <?php endif; ?>
            <div class="opalesate-recent-property opalestate-rows">
                <?php if( $query->have_posts() ): ?>
                    <div class="row">
                        <?php $cnt=0; while ( $query->have_posts() ) : $query->the_post();
                            $cls = '';

                            ?>
                            <?php echo Opalestate_Template_Loader::get_template_part( 'content-property-table' ); ?>
                        <?php endwhile; ?>
                    </div>
                    <?php if( isset($pagination) && $pagination ): ?>
                        <div class="w-pagination"><?php opalestate_pagination(  $query->max_num_pages ); ?></div>
                    <?php endif; ?>
                <?php else: ?>
                    <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php wp_reset_query(); ?>