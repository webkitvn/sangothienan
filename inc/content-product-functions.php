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
	global $product;
?>
		<img src="<?php echo get_template_directory_uri()?>/img/thienan-icon.svg" alt="<?php the_title() ?>" >
		<span class="buttons-set">
			<a class="sango-btn quickview-btn hide-on-med-and-down" href="#quickview" data-id="<?php echo $product->get_id(); ?>" >Xem Nhanh</a>
			<a class="sango-btn" href="<?php the_permalink() ?>" >Mua Ngay</a>
		</span>
	</div></div></div>
<?php 
}
add_action('woocommerce_before_shop_loop_item_title', 'sango_product_overlay_end', 20);

//PROCESS QUICKVIEW
  function product_quick_view(){
    $id = $_POST['id'];
    woocommerce_get_template_part('content', 'quickview');
    wp_die();
  }
  add_action('wp_ajax_product_quick_view', 'product_quick_view');
  add_action('wp_ajax_nopriv_product_quick_view', 'product_quick_view');
  
  
  //AJAX CART COUNT
  add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
  function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    
    ob_start();
    
    ?>
    <a class="cart-customlocation" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="material-icons">shopping_basket</i> <span class="text"><?php echo _e("Giỏ hàng") ?></span> <span class="qty"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
    <?php
    
    $fragments['a.cart-customlocation'] = ob_get_clean();
    
    return $fragments;
    
  }
  
  // check for empty-cart get param to clear the cart
  add_action( 'init', 'woocommerce_clear_cart_url' );
  function woocommerce_clear_cart_url() {
    global $woocommerce;
    
    if ( isset( $_GET['empty-cart'] ) ) {
      $woocommerce->cart->empty_cart(); 
    }
  }