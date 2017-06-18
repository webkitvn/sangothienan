<?php 
	$loop = new WP_Query(array(
		'post_type' => 'post',
		'posts_per_page' => 5
	));
	if($loop->have_posts()) :
?>
<section class="new-blog">
	<div class="new-blog-wrapper">
		<div class="section-title-block">
			<h2>Tin tức</h2>
		</div>
		<div class="blog-slider">
			<?php while($loop->have_posts()) : $loop->the_post(); ?>
			<div class="item">
				<div class="feature-blog-image">
					<?php the_post_thumbnail('feature_img'); ?>
				</div>
				<div class="block-info">
					<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
					<div class="entry-description">
						<p><?php echo get_the_excerpt(); ?></p>
					</div>
					<a href="<?php the_permalink(); ?>" class="sango-btn">Xem tiếp</a>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php endif; ?>