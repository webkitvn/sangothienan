<?php get_header('shop');$image = get_field('page_cover'); ?>
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

	<section id="primary" class="page-content">
		<div id="main" class="page-content-wrapper" role="main">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
		</div><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer('shop');
