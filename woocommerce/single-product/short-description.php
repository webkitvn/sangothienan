<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

if ( ! $post->post_excerpt ) {
	return;
}

?>
<div class="woocommerce-product-details__short-description">
	<?php 
		$product_sku = $product->get_sku();
		$product_qty = $product->get_stock_quantity();
		$product_wei = $product->get_weight();
		$product_len = $product->get_length();
		$product_wid = $product->get_width();
		$product_hei = $product->get_height();
		$terms = get_the_terms( get_the_ID(), 'thuong_hieu');
	?>
    <p>
    	<?php if(!empty($terms)) : ?>
	    <strong>Nhà sản xuất:</strong> 
		<?php foreach($terms as $term) : ?>
			<?php echo $term->name ?>
		<?php endforeach; ?>
	    <br>
		<?php endif; ?>
		<strong>Mã sản phẩm:</strong> <?php echo $product_sku; ?><br>
		<strong>Hàng trong kho:</strong> 
			<?php 
				if($product->is_in_stock()){
					if($product_qty)
						echo $product_qty;
					else
						echo "Còn hàng";
				}
				else
					echo "Hết hàng";
			?>
			<br>
		<strong>Trọng lượng:</strong> 
			<?php echo $product_wei != 0 ? $product_wei.get_option( 'woocommerce_weight_unit' ) : ""; ?><br>
		<strong>Kích thước (L x W x H):</strong> 
			<?php echo $product_len != 0 ? $product_len.get_option( 'woocommerce_dimension_unit' ) : ""; ?> x 
			<?php echo $product_wid != 0 ? $product_wid.get_option( 'woocommerce_dimension_unit' ) : ""; ?> x 
			<?php echo $product_hei != 0 ? $product_hei.get_option( 'woocommerce_dimension_unit' ) : ""; ?>
	</p>
</div>
