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
get_header( 'shop' );

$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;  
$image = get_field('cover_image', $taxonomy . '_' . $term_id);

?>
	<section class="page-cover">
		<?php if(!empty($image)) : ?>
		<img src="<?php echo $image['sizes']['page_cover'] ?>" alt="<?php single_cat_title(); ?>">
		<div class="page-title">
			<h1>Sản phẩm</h1>
			<h2><?php single_cat_title(); ?></h2>
		</div>
		<div class="overlay"></div>
		<?php else: ?>
		<div class="page-title no-cover">
			<h1>Sản phẩm</h1>
			<h2><?php single_cat_title(); ?></h2>
		</div>
		<?php endif; ?>
	</section>
	<section class="product-list">
		<div class="product-list-wrapper">
			<?php if ( have_posts() ) : ?>

				<?php woocommerce_product_loop_start(); ?>
		
					<?php woocommerce_product_subcategories(); ?>
		
					<?php while ( have_posts() ) : the_post(); ?>
		
						<?php wc_get_template_part( 'content', 'product' ); ?>
		
					<?php endwhile; // end of the loop. ?>
		
				<?php woocommerce_product_loop_end(); ?>

				<?php
					/**
					 * woocommerce_after_shop_loop hook.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				?>
		
			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
		
				<div class="row"><?php wc_get_template( 'loop/no-products-found.php' ); ?></div>
		
			<?php endif; ?>
		</div>
	</section>

<?php get_footer( 'shop' ); ?>
