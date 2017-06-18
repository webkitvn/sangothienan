<?php 
	$query_args = array(
	    'posts_per_page'    => 2,
	    'no_found_rows'     => 1,
	    'post_status'       => 'publish',
	    'post_type'         => 'product',
	    'meta_query'        => WC()->query->get_meta_query(),
	    'post__in'          => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
	);
	$products = new WP_Query( $query_args );
?>
<?php if ( $products->have_posts() ) : global $product; ?>
<section class="sango-product-block">
	<div class="product-blocks-wrapper">
		<div class="row no-padding">
			<?php while($products->have_posts()) : $products->the_post(); ?>
			<div class="col s12 l6">
				<div class="block">
					<a href="<?php the_permalink(); ?>" class="block-img">
						<?php woocommerce_template_loop_product_thumbnail() ?>
					</a>
					<div class="block-info">
						<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
						<?php woocommerce_template_loop_price() ?>
						<p><?php echo string_limit_words(strip_tags(get_the_content()), 60); ?></p>
						<a href="<?php the_permalink(); ?>" class="sango-btn">Mua ngay</a>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php endif;wp_reset_query(); ?>