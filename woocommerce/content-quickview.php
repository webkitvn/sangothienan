<?php 
    $arg = array(
        'post_type' => 'product',
    	'posts_per_page' => 1,
    	'p' => $_POST['id']
    );
    $loop = new WP_Query($arg);
    while($loop->have_posts()) : $loop->the_post();
    global $product, $post;
    $product = wc_get_product($_POST['id']);
    $price_html = $product->get_price_html();
    if ( ! $product->is_in_stock() ) return;
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col s12 m6 l7">
			<?php
				woocommerce_show_product_images();
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
			</div><!-- .summary -->
		</div>
	</div>
</div><!-- #product-<?php the_ID(); ?> -->
<?php endwhile; ?>