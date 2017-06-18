<?php 
	$meta_query  = WC()->query->get_meta_query();
    $tax_query   = WC()->query->get_tax_query();
    $tax_query[] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',
        'operator' => 'IN',
    );

    $args = array(
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'ignore_sticky_posts' => 1,
        'posts_per_page'      => 3,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'meta_query'          => $meta_query,
        'tax_query'           => $tax_query,
    );
    $loop = new WP_Query($args);
    if($loop->have_posts()) :
?>
<section class="feature-products">
	<div class="feature-products-wrapper">
		<div class="section-title-block">
			<h2>Sản phẩm nổi bật</h2>
		</div>
		<div class="product-slider">
			<?php while($loop->have_posts()) : $loop->the_post(); global $product;?>
			<div class="item">
				<div class="feature-product-image">
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'feature_img' );?>
					<img src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute(); ?>">
				</div>
				<div class="block-info">
					<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
					<div class="entry-description">
						<p><?php echo string_limit_words(strip_tags(get_the_content()), 60); ?></p>
					</div>
					<a href="<?php the_permalink(); ?>" class="sango-btn">Xem tiếp</a>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>

<?php endif;wp_reset_query();?>