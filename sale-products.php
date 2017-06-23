<?php /*Template Name: Sale Products*/ ?>
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

$image = get_field('page_cover');

?>
	<section class="page-cover">
		<?php if(!empty($image)) : ?>
		<img src="<?php echo $image['sizes']['page_cover'] ?>" alt="<?php single_cat_title(); ?>">
		<div class="page-title">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="overlay"></div>
		<?php else: ?>
		<div class="page-title no-cover">
			<h1><?php the_title(); ?></h1>
		</div>
		<?php endif; ?>
	</section>
	<?php get_template_part('template-parts/content', 'newsletter'); ?>
	<?php 
		$loop = new WP_Query(array(
			'post_type' => 'km_block',
			'posts_per_page' => 4
		));
		if($loop->have_posts()):
	?>
	<section class="sale-blocks">
		<div class="sale-blocks-wrapper">
			<div class="row">
				<?php 
					while($loop->have_posts()) : $loop->the_post();
					$image = get_field('km_block_img');
				?>
					<div class="col s12 l6">
						<a class="block" href="<?php the_field('km_block_url') ?>">
							<img src="<?php echo $image['sizes']['sale_image'] ?>" alt="<?php the_title_attribute(); ?>">
							<span class="block-content-wrapper">
								<h3><?php the_title(); ?></h3>
								<div class="content"><?php echo get_the_excerpt(); ?></div>
							</span>
							<?php if(get_field('km_block_badge')) : ?>
								<span class="sale-bagde"><?php the_field('km_block_badge') ?></span>
							<?php endif; ?>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<?php endif; wp_reset_query(); ?>
	<section class="product-list">
		<div class="product-list-wrapper">
			<div class="row">
				<div class="col s12">
					<h2 class="section-title">Sản phẩm khuyến mãi</h2>
				</div>
			</div>
			<div class="products row">
			<?php 
				$query_args = array(
				    'posts_per_page'    => 8,
				    'no_found_rows'     => 1,
				    'post_status'       => 'publish',
				    'post_type'         => 'product',
				    'meta_query'        => WC()->query->get_meta_query(),
				    'post__in'          => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
				);
				$products = new WP_Query( $query_args );
			?>
			<?php if ( $products->have_posts() ) : ?>

			<?php while($products->have_posts()) : $products->the_post(); ?>
				<div id="product_<?php echo $product->id ?>" <?php post_class('col s12 m6 l4'); ?>>
					<div class="product-item">
						<div class="image-wrapper">
							<?php woocommerce_template_loop_product_thumbnail() ?>
							<?php $percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 ); ?>
							<span class="sale-badge">Sale of <?php echo $percentage ?>%</span>
							<div class="overlay">
								<div>
									<img src="<?php echo get_template_directory_uri();?>/img/thiena-icon.png" alt="<?php the_title_attribute(); ?>">
									<div class="buttons-set">
										<a class="sango-btn" href="#quickview">Xem Nhanh</a>
										<a class="sango-btn" href="<?php the_permalink();?>">Mua Ngay</a>
									</div>
								</div>
							</div>
						</div>
						<div class="title-wrapper">
							<a href="<?php the_permalink();?>"><h3><?php the_title() ?></h3></a>
						</div>
						<div class="product-description">
							<?php echo get_the_excerpt(); ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
			<?php woocommerce_pagination() ?>
			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
		
				<div class="row"><?php wc_get_template( 'loop/no-products-found.php' ); ?></div>
		
			<?php endif; ?>
			</div>
		</div>
	</section>

<?php get_footer( 'shop' ); ?>
