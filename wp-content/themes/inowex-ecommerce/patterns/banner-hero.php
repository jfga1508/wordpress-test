<?php
/**
 * Title: Hero
 * Slug: twentytwentyfour/banner-hero
 * Categories: banner, call-to-action, featured
 * Viewport width: 1400
 */
$products = get_products_api();
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}}} -->
<div class="wp-block-group alignfull products" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">

    <?php
    foreach ($products as &$product) {
        ?>
	<!-- wp:group {"style":{"spacing":{"blockGap":"0px"}}} -->
	<div class="wp-block-group products-item">

		<!-- wp:heading {"textAlign":"center","fontSize":"x-large","level":1} -->
		<h1 class="wp-block-heading has-text-align-center has-x-large-font-size"><?php echo esc_html_x( $product->title, 'Heading of the hero section', 'twentytwentyfour' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:spacer {"height":"1.25rem"} -->
		<div style="height:1.25rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php echo esc_html_x( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Content of the hero section', 'twentytwentyfour' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:spacer {"height":"1.25rem"} -->
		<div style="height:1.25rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button -->
			<div class="wp-block-button">
                            <a class="wp-block-button__link wp-element-button" href="<?php echo get_permalink('29') ?>?sku=<?php echo $product->sku; ?>&type=trial">Trial <br/><?php echo esc_html_x( $product->trial, 'Trial button', 'twentytwentyfour' ); ?></a>
                            <a class="wp-block-button__link wp-element-button" href="<?php echo get_permalink('29') ?>?sku=<?php echo $product->sku; ?>&type=month">Monthly <br/><?php echo esc_html_x( $product->month, 'Monthly button', 'twentytwentyfour' ); ?></a>
                            <a class="wp-block-button__link wp-element-button" href="<?php echo get_permalink('29') ?>?sku=<?php echo $product->sku; ?>&type=year">Yearly <br/><?php echo esc_html_x( $product->year, 'Yearly button', 'twentytwentyfour' ); ?></a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
        <?php
    }
    ?>
</div>
<!-- /wp:group -->
