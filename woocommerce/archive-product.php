<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<section class="page-cover">
		<img src="<?php echo get_template_directory_uri();?>/img/product-archive-cover.jpg" alt="Sản phẩm">
		<div class="page-title">
			<h1>Sản phẩm</h1>
		</div>
		<div class="overlay"></div>
	</section>
	<section class="page-intro">
		<h2>THIẾT KẾ NỘI THẤT - THIẾT KẾ KIẾN TRÚC - THI CÔNG XÂY DỰNG<br>
		SX ĐỒ GỖ NỘI THẤT</h2>
	</section>
	<section class="product-category-list">
		<div class="category-list-wrapper">
			<div class="row">
				<?php 
					$args = array(
				        'taxonomy'     => 'product_cat',
				        'orderby'      => 'id',
				        'hide_empty'   => 0,
				        'parent' => 0
				  	);
				  	$product_cats = get_categories( $args );
					foreach($product_cats as $cat) :
						$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
						$cat_img = wp_get_attachment_image_src( $thumbnail_id, 'product_cate_size' );
				?>
				<div class="col s12 m6">
					<a class="item" href="<?php echo get_term_link($cat->slug, 'product_cat') ?>">
						<img src="<?php echo $cat_img[0] ?>" alt="<?php echo $cat->name ?>">
						<div class="overlay">
							<div>
								<img src="<?php echo get_template_directory_uri();?>/img/thienan-icon.svg" alt="thiena">
								<h3><?php echo $cat->name ?></h3>
							</div>
						</div>
					</a>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

<?php get_footer( 'shop' ); ?>
