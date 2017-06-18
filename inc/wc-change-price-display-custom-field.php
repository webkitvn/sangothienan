<?php
// only copy opening php tag if needed
// Adds "per package" after each product price throughout the shop
function sv_change_product_price_display( $price ) {
	$price .= '/m<sup>2</sup>';
	return $price;
}
add_filter( 'woocommerce_get_price_html', 'sv_change_product_price_display' );
add_filter( 'woocommerce_cart_item_price', 'sv_change_product_price_display' );