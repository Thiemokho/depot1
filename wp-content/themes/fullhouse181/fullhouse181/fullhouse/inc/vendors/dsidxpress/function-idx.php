<?php

vc_map( array(
    "name"      => __("IDX Listings", "fullhouse"),
    "base"      => "fullhouse_dsidxpress_listings",
    'icon' => 'icon-wpb-estates-5',
    "class"         => "",
    "description" => __("IDX Listings", "fullhouse"),
    "category"  => __('IDX', "fullhouse"),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "fullhouse"),
            "param_name" => "title",
            "value" => '',
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description", "fullhouse"),
            "param_name" => "description",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Area type", 'fullhouse'),
            "param_name" => "area_type",
            'value' 	=> array(
                esc_html__('Default', 'fullhouse') => '',
                esc_html__('City', 'fullhouse') => 'city',
                esc_html__('Community', 'fullhouse') => 'community',
                esc_html__('County', 'fullhouse' )=> 'county',
                esc_html__('Tract', 'fullhouse') => 'tract',
                esc_html__('Zip', 'fullhouse') => 'zip',
            ),
            'std' => ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Area name", "fullhouse"),
            "param_name" => "area_name",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Display order", 'fullhouse'),
            "param_name" => "display_order",
            'value' 	=> array(
                esc_html__('Default', 'fullhouse') => 'DateAdded|DESC',
                esc_html__('Days on market, oldest first', 'fullhouse') => 'DateAdded|ASC',
                esc_html__('Last updated, newest first', 'fullhouse') => 'LastUpdated|DESC',
                esc_html__('Price, lowest first', 'fullhouse' )=> 'Price|ASC',
                esc_html__('Price, highest first', 'fullhouse') => 'Price|DESC',
                esc_html__('Sale Price, lowest first', 'fullhouse') => 'SalePrice|ASC',
                esc_html__('Sale Price, highest first', 'fullhouse') => 'SalePrice|DESC',
                esc_html__('Home size, largest first', 'fullhouse') => 'ImprovedSqFt|DESC',
                esc_html__('Lot size, largest first', 'fullhouse') => 'LotSqFt|DESC',
                esc_html__('Walk Score, highest first', 'fullhouse') => 'WalkScore|DESC',
                esc_html__('Price drop (%), highest first', 'fullhouse') => 'OverallPriceDropPercent|DESC',
            ),
            'std' => ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Number of listings to display", "fullhouse"),
            "param_name" => "count",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Column", "fullhouse"),
            "param_name" => "column",
            "value" => '',
            'description' =>  ''
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Show larger photos', 'fullhouse' ),
            'param_name' => 'showlargerphotos',
            'description' => esc_html__( 'Enable to show larger photo.', 'fullhouse' ),
            'value' => array( esc_html__( 'Yes, please', 'fullhouse' ) => 'true' )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class", "fullhouse"),
            "param_name" => "css_class",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Property types", "fullhouse"),
            "param_name" => "propertytypes",
            "value" => array(
                'Residential / All ' => '1030',
                'Residential / Condo ' => '1031',
                'Residential / Single Family' => '1032'
            ),
            'description' =>  '',
            'std' => 'false'
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Status", "fullhouse"),
            "param_name" => "statuses",
            "value" => array(
                'Active' => '1',
                'Conditional' => '2'
            ),
            'description' =>  '',
            'std' => 'false'
        ),
        array(
            "type" => "textfield",
            "heading" => __("Min Price", "fullhouse"),
            "param_name" => "minprice",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Max Price", "fullhouse"),
            "param_name" => "maxprice",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Min Beds", "fullhouse"),
            "param_name" => "minbeds",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Max Beds", "fullhouse"),
            "param_name" => "maxbeds",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Min Baths", "fullhouse"),
            "param_name" => "minbaths",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Max Baths", "fullhouse"),
            "param_name" => "maxbaths",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Min Days on Market", "fullhouse"),
            "param_name" => "mindom",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Max Days on Market", "fullhouse"),
            "param_name" => "maxdom",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Min Year Built", "fullhouse"),
            "param_name" => "minyear",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Max Year", "fullhouse"),
            "param_name" => "maxyear",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Min Home SqFt Range", "fullhouse"),
            "param_name" => "minimpsqft",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Max Home SqFt Range", "fullhouse"),
            "param_name" => "maximpsqft",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Min Lot SqFt Range", "fullhouse"),
            "param_name" => "minlotsqft",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Max Lot SqFt Range", "fullhouse"),
            "param_name" => "maxlotsqft",
            "value" => '',
            'description' =>  ''
        ),
    )
));

vc_map( array(
    "name"      => __("IDX Single Listing", "fullhouse"),
    "base"      => "fullhouse_dsidxpress_listing",
    'icon' => 'icon-wpb-estates-8',
    "class"         => "",
    "description" => __("IDX Single Listings", "fullhouse"),
    "category"  => __('IDX', "fullhouse"),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "fullhouse"),
            "param_name" => "title",
            "value" => '',
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description", "fullhouse"),
            "param_name" => "description",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("MLS", "fullhouse"),
            "param_name" => "mlsnumber",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class", "fullhouse"),
            "param_name" => "css_class",
            "value" => '',
            'description' =>  ''
        ),
    )
));

vc_map( array(
    "name"      => __("IDX Search Form", "fullhouse"),
    "base"      => "fullhouse_dsidxpress_search_form",
    'icon' => 'icon-wpb-estates-2',
    "class"         => "",
    "description" => __("IDX Search Form", "fullhouse"),
    "category"  => __('IDX', "fullhouse"),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "fullhouse"),
            "param_name" => "title",
            "value" => '',
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description", "fullhouse"),
            "param_name" => "description",
            "value" => '',
            'description' =>  ''
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Format", 'fullhouse'),
            "param_name" => "format",
            'value' 	=> array(
                esc_html__('Horizontal', 'fullhouse') => 'horizontal',
                esc_html__('Vertical', 'fullhouse') => 'vertical',
            ),
            'std' => ''
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class", "fullhouse"),
            "param_name" => "css_class",
            "value" => '',
            'description' =>  ''
        ),
    )
));

class WPBakeryShortCode_fullhouse_dsidxpress_listings extends WPBakeryShortCode {}
class WPBakeryShortCode_fullhouse_dsidxpress_listing extends WPBakeryShortCode {}
class WPBakeryShortCode_fullhouse_dsidxpress_search_form extends WPBakeryShortCode {}


