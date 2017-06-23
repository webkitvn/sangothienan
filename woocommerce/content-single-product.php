<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col s12 m6 l7">
			<?php
				/**
				 * woocommerce_before_single_product_summary hook.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
			?>
		</div>
	<div class="col s12 m6 l5">
	<div class="summary entry-summary">

		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
	
	<div class="more-info">
		<p><small>Mua hàng qua điện thoại</small></p>
		<div class="phones">
			<img src="<?php echo get_template_directory_uri();?>/img/24h-icon.svg" alt="24h">
			<span class="first">0912 345 678</span> | <span>0901 123 456</span>
		</div>
		<p><b>Tại sao nên mua hàng tại Thiên Ân</b></p>
		<ul>
			<li>
				<img src="<?php echo get_template_directory_uri();?>/img/icon-1.svg" alt="Nhập khẩu chính hãng tại Đức">
				Nhập khẩu chính hãng tại Đức
			</li>
			<li>
				<img src="<?php echo get_template_directory_uri();?>/img/icon-2.svg" alt="Miễn Phí Giao Hàng Trong Nội Thành">
				Miễn Phí Giao Hàng Trong Nội Thành
			</li>
			<li>
				<img src="<?php echo get_template_directory_uri();?>/img/icon-3.svg" alt="Bảo Hành Trọn Đời Sản Phẩm">
				Bảo Hành Trọn Đời Sản Phẩm
			</li>
			<li>
				<img src="<?php echo get_template_directory_uri();?>/img/icon-4.svg" alt="Chứng Nhận Quốc Tế">
				Chứng Nhận Quốc Tế
			</li>
		</ul>
	</div>
	</div><!-- .summary -->
	</div>
	<div class="col s12">
	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>
	</div>
</div>
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
<div id="quickview-modal" class="modal">
    <div class="valign-wrapper">
	      <div class="center-align">
	        <div class="progress">
	            <div class="indeterminate"></div>
	        </div>
	      </div>
    </div>
</div>