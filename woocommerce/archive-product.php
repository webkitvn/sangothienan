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
	<?php   if (! is_search() ) : ?>
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
	<?php else : ?>
		<section class="product-list">
			<div class="product-list-wrapper">
				<div class="row">
					<div class="col s12">
						<?php wc_print_notices() ?>
					</div>
				</div>
				<div class="row">
					<div class="col s12 l3 categories hide-on-med-and-down">
						<aside>
							<ul>
								<?php 
									$args = array(
										'taxonomy' => 'product_cat',
										'child_of' => 0,
										'parent' => 0,
										'orderby'    => 'id',
										'hide_empty' => 0
									);
									$categories = get_categories( $args );
									foreach($categories as $cat) :
								?>
								<li><a href="<?php echo get_term_link( $cat->term_id, 'product_cat' ); ?>"><?php echo $cat->name ?></a></li>
								<?php endforeach; ?>
							</ul>
						</aside>
					</div>
					<div class="col s12 l9">
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
				</div>
			</div>
		</section>

		<div id="quickview-modal" class="modal">
		    <div class="valign-wrapper">
			      <div class="center-align">
			        <div class="progress">
			            <div class="indeterminate"></div>
			        </div>
			      </div>
		    </div>
		</div>
	<?php endif; ?>
<?php get_footer( 'shop' ); ?>
