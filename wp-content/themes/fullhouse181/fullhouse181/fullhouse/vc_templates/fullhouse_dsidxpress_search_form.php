<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$params = array();
if (isset($format) && $format) {
    $params[] = 'format="'.$format.'"';
}

$class = "";
if ($css_class) {
    $class .= $css_class;
}

?>
<div class="fullhouse-dsidxpress-search-form">
    <?php if ($title) : ?>
        <div class="title">
            <?php echo $title ?>
        </div>
    <?php endif; ?>

    <?php if ($description) : ?>
        <div class="description">
            <?php echo $description ?>
        </div>
    <?php endif; ?>

    <div class="fullhouse-dsidxpress-search-form-content <?php echo $class ?>">
        <?php echo @do_shortcode('[idx-quick-search '. implode(' ', $params).' ]'); ?>
    </div>
</div>
