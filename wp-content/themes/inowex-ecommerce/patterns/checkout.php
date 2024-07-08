<?php
/**
 * Title: Checkout
 * Slug: twentytwentyfour/checkout
 * Categories: checkout
 * Viewport width: 1400
 */
$sku = filter_input(INPUT_GET, 'sku', FILTER_SANITIZE_SPECIAL_CHARS);
$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_ENCODED);
$product = get_prices_api($sku);
?>
<script>
    jQuery(function() {
        jQuery('#total').text(<?php echo $product->{$type}; ?>);
        setTimeout(() => jQuery('[name="price"]').val(<?php echo $product->{$type}; ?>).attr('readonly', true), 1000);
    });
</script>