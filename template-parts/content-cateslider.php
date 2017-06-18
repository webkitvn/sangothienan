<?php 
	$args = array(
        'taxonomy'     => 'product_cat',
        'orderby'      => 'id',
        'hide_empty'   => 0,
        'parent' => 0
  	);
  	$product_cats = get_categories( $args );
	if($product_cats) :
?>
<section class="cate-slider">
	<div class="cate-slider-wrapper">
		<?php 
			foreach($product_cats as $cat) :
			$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
			$cat_img = wp_get_attachment_image_src( $thumbnail_id, 'product_cate_size' );
		?>
		<a href="<?php echo get_term_link($cat->slug, 'product_cat') ?>" class="item" style="background-image: url('<?php echo $cat_img[0] ?>');">
			<h3><?php echo $cat->name ?></h3>
			<span class="overlay"></span>
		</a>
		<?php endforeach; ?>
	</div>
</section>
<?php endif; ?>