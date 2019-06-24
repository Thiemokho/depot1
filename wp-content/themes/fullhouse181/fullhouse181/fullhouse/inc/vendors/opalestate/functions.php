<?php


if( defined("WPOPAL_CAPTCHA_LOAED") ){
    add_action( 'pbrthemer_quick_register_after', array('OpalEstate_Nocaptcha_Recaptcha','show_captcha') , 99 );
    add_action( 'pbrthemer_quick_register_process_before', array( "OpalEstate_Nocaptcha_Recaptcha" ,'ajax_verify_captcha'), 99 );
}

 

function fullhouse_fnc_get_template_link_by_file( $file ){
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $file
    ));

    if( $pages ){
        $pageLink = get_permalink( $pages[0]->ID);
    }else{
        $pageLink = home_url();
    }
    return $pageLink;
}

/**
 * Hook to account menu which displaying in Top Right.
 */

add_action('opal_account_dropdown_content', 'opalestate_management_user_menu');
/**
 * Hook Layout
 */
function fullhouse_fnc_get_single_property_sidebar_configs( $configs='' ){

	$left  =  fullhouse_fnc_theme_options( 'opalestate-single-left-sidebar' ); 

	$right =  fullhouse_fnc_theme_options( 'opalestate-single-right-sidebar' );

	return fullhouse_fnc_get_layout_configs( $left, $right );
}

add_filter( 'fullhouse_fnc_get_single_property_sidebar_configs', 'fullhouse_fnc_get_single_property_sidebar_configs', 1, 1 );

function fullhouse_fnc_get_archive_property_sidebar_configs( $configs='' ){

	$left  =  fullhouse_fnc_theme_options( 'opalestate-archive-left-sidebar' ); 

	$right =  fullhouse_fnc_theme_options( 'opalestate-archive-right-sidebar' );

	return fullhouse_fnc_get_layout_configs( $left, $right );
}

add_filter( 'fullhouse_fnc_get_archive_property_sidebar_configs', 'fullhouse_fnc_get_archive_property_sidebar_configs', 1, 1 );

function fullhouse_fnc_add_social_share(){
    get_template_part( 'page-templates/parts/sharebox' );
}
add_action( 'opalestate_single_content_bottom',  'fullhouse_fnc_add_social_share', 9999  );
add_action( 'opalestate_single_agent_content_bottom',  'fullhouse_fnc_add_social_share', 9999  );
add_action( 'opalestate_single_office_content_bottom',  'fullhouse_fnc_add_social_share', 9999  );

if( class_exists("WPBakeryShortCode") ){


    add_action( 'init', 'fullhouse_fnc_visualcomposer_opalestate' );

    function fullhouse_fnc_visualcomposer_opalestate(){

        vc_map( array(
            "name" => __("Full Slider Property", 'fullhouse'),
            "base" => "pbr_estate_slider_property",
            'icon' => 'icon-wpb-estates-10',
            "class" => "",
            "description" => 'Get data from post type Team',
            "category" => __('OpalEstate', 'fullhouse'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __("Title", 'fullhouse'),
                    "param_name" => "title",
                    "value" => '',
                    "admin_label" => true
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("description", 'fullhouse'),
                    "param_name" => "description",
                    "value" => '',
                    'description' =>  ''
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Limit", 'fullhouse'),
                    "param_name" => "limit",
                    "value" => 6,
                    'description' =>  __('Limit properties showing', 'fullhouse')
                ),
                array(
                    "type" => "dropdown",
                    'heading' => esc_html__( 'Style', 'fullhouse' ),
                    "param_name" => "style",
                    "value" => array(
                        esc_html__('Default', 'fullhouse') => 'default',
                        esc_html__('Style 2', 'fullhouse') => 'style-2'
                    )
                ),
            )
        ));
    }
    //class WPBakeryShortCode_Pbr_estate_table_property  extends WPBakeryShortCode {}
    class WPBakeryShortCode_Pbr_estate_slider_property  extends WPBakeryShortCode {}
}
