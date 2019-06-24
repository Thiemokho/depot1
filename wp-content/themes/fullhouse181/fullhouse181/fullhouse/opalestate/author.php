<?php 
	
	global $wp_query;
	$current_author = $wp_query->get_queried_object();
	$email = get_user_meta( $current_author->ID , OPALESTATE_USER_PROFILE_PREFIX . 'email', true ); 
	$email  = $email ? $email : $current_author->data->user_email;
	$args = array( 'post_id' => 0, 'email' =>  $email, 'author_id' => $current_author->ID );
?>
	<div class="agent-box">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6">  
				<?php echo Opalestate_Template_Loader::get_template_part( 'parts/author-box', array('author'=>$current_author->data) ); ?>
			</div>
 
			<div class="col-lg-6 col-md-6 col-sm-6"> <?php echo Opalestate_Template_Loader::get_template_part( 'single-agent/form', $args ); ?> </div>
	 
		</div>
	</div>

	<div class="entry-content">
		<?php echo Opalestate_Template_Loader::get_template_part( 'parts/author-box-content', array('author'=>$current_author->data) ); ?>
	</div>

<?php
$properties = Opalestate_Query::get_properties_by_user( null, $current_author->ID , 9 );
if( $properties->have_posts() ) :
?>
<div class="clearfix clear"></div>
<div class="opalestate-box property-same-author-section">
	<h3><?php _e('My Properties','fullhouse');?></h3>
	<div class="box-content opalestate-rows">
		<div class="row">
			<?php 
			$column = apply_filters('opalestate_properties_column_row', 3 ); 
			$clscol = floor(12/$column);
			$cnt = 0;
			while( $properties->have_posts() ) : $properties->the_post(); 
			$cls = '';
			if( $cnt++%$column==0 ){
				$cls .= ' first-child';
			}
			?>
				<div class="<?php echo $cls; ?> col-lg-<?php echo $clscol; ?> col-md-<?php echo $clscol; ?> col-sm-6">
                	<?php echo Opalestate_Template_Loader::get_template_part( 'content-property-grid' ); ?>
            	</div>
			<?php endwhile; ?>
		</div>
	</div>	
</div>	
<?php endif; ?>
<?php wp_reset_postdata(); ?>