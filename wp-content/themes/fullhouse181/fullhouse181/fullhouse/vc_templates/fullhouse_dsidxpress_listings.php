<?php

$range_data = array(
    'minprice' => '','maxprice' => '',
    'minbeds' => '', 'maxbeds' => '',
    'minbaths' => '', 'maxbaths' => '',
    'mindom' => '', 'maxdom' => '',
    'minyear' => '', 'maxyear' => '',
    'minimpsqft' => '', 'maximpsqft' => '',
    'minlotsqft' => '', 'maxlotsqft' => '',
);

$default = array(
    'title' => '',
    'description' => '',
    'statuses' => '',
    'propertytypes' => '',
    'orderby' => 'DateAdded',
    'orderdir' => 'DESC',
    'count' => 5,
    'showlargerphotos' => ''
);

$default = array_merge($range_data, $default);

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
$atts = array_merge($default, $atts);

extract( $atts );

if ( isset($area_type) && isset($area_name) ) {
    if ($area_type && $area_name) {
        $params[] = $area_type.'="'.$area_name.'"';
    }
}

foreach ($atts as $key => $value) {
    if( array_key_exists($key, $range_data)) {
        if ( $value ) {
            $params[] = $key.'="'.$value.'"';
        }
    }
}

if ( isset($display_order) ) {
    if ($display_order) {
        $display_order_arr = explode('|', $display_order);
        if ( isset($display_order_arr[0]) && $display_order_arr[0]) {
            $params[] = 'orderby="'.$display_order_arr[0].'"';
        }
        if ( isset($display_order_arr[1]) && $display_order_arr[1]) {
            $params[] = 'orderdir="'.$display_order_arr[1].'"';
        }
    }
}

if ($propertytypes) {
    $params[] = 'propertytypes="'.$propertytypes.'"';
}

if ($statuses) {
    $params[] = 'statuses="'.$statuses.'"';
}

if ($count) {
    $params[] = 'count="'.$count.'"';
}

if ( isset($showlargerphotos) ) {
    if ($showlargerphotos == 'true') {
        $params[] = 'showlargerphotos="'.$showlargerphotos.'"';
    }
}

$class = "";
if ($column) {
    $class .= "column-".$column;
}

if ($css_class) {
    $class .= $css_class;
}


?>
<div class="widget widget-idx-property fullhouse-dsidxpress-listings">
    <?php if ($title || $description) : ?>
    <h4 class="widget-title text-center">
        <?php if ( $title ) : ?>
            <span><?php echo $title ?></span>
        <?php endif; ?>
        <?php if ( $description ) : ?>
            <span class="widget-desc"><?php echo $description ?></span>
        <?php endif; ?>
    </h4>
    <?php endif; ?>
    <div class="fullhouse-dsidxpress-listings-content <?php echo $class ?>">
        <?php echo do_shortcode('[idx-listings '.implode(' ', $params).' ]'); ?>
    </div>
</div>

