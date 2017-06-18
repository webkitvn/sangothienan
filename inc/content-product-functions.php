<?php
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
function sango_product_wrapper_start(){
	echo '<div class="product-item"><div class="image-wrapper">';
}
add_action('woocommerce_before_shop_loop_item', 'sango_product_wrapper_start', 5);
function sango_product_wrapper_end(){
	echo '</div>';
}
add_action('woocommerce_after_shop_loop_item', 'sango_product_wrapper_end', 15);

function sango_product_overlay_start(){
	global $product;
	echo '<div class="overlay"><div>';
}
add_action('woocommerce_before_shop_loop_item_title', 'sango_product_overlay_start', 15);
function sango_product_overlay_end(){
?>
		<img src="<?php echo get_template_directory_uri()?>/img/thiena-icon.png" alt="<?php the_title() ?>" >
		<div class="buttons-set">
			<a class="sango-btn" href="#quickview" >Xem Nhanh</a>
			<a class="sango-btn" href="<?php the_permalink() ?>" >Mua Ngay</a>
		</div>
	</div></div></div>
<?php 
}
add_action('woocommerce_before_shop_loop_item_title', 'sango_product_overlay_end', 20);
