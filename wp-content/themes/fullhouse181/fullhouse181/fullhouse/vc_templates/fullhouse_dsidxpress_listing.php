<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$params = array();
if (isset($mlsnumber) && $mlsnumber) {
    $params[] = 'mlsnumber="'.$mlsnumber.'"';
}

$class = "";
if ($css_class) {
    $class .= $css_class;
}

?>
<div class="widget widget-idx-property fullhouse-dsidxpress-single-listing">
    <?php if ($title || $description) : ?>
    <h4 class="widget-title text-center">
        <?php if ($title) : ?>
        <span><?php echo $title ?></span>
        <?php endif; ?>
        <?php if ($description) : ?>
        <span class="widget-desc"><?php echo $description ?></span>
        <?php endif; ?>
    </h4>
    <?php endif; ?>
    <div class="fullhouse-dsidxpress-single-listing-content <?php echo $class ?>">
        <?php echo do_shortcode('[idx-listing ' . implode(' ', $params) . ' ]'); ?>
    </div>
</div>
