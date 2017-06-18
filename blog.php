<?php /* Template Name: Tin tức */ ?>

<?php 
	get_header('shop'); 
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
	<section class="post-list">
		<div class="post-list-wrapper section-wrapper">
			<?php
				$loop = new WP_Query(array(
					'post_type' => 'post',
					'posts_per_page' => 8,
					'paged' => get_query_var('paged')
				));
				if($loop->have_posts()) :
			?>
			<div class="row">
				<?php while($loop->have_posts()) : $loop->the_post(); ?>
				<div class="col s12 l6">
					<div <?php post_class('post-item') ?>>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post_thumb'); ?></a>
						<div class="content">
							<a href="<?php the_permalink(); ?>"><h3 class="entry-title"><?php the_title() ?></h3></a>
							 <span class="vcard author hide"><span class="fn"><?php the_author(); ?></span></span>
							 <span class="date updated published hide"><?php the_time(); ?></span>
							<p class="entry-summary"><?php echo get_the_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>" class="sango-btn">Xem thêm</a>
						</div>
						<div class="post-time">
							<span class="month"><?php the_time('m') ?></span>
							<span class="year"><?php the_time('Y') ?></span>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
			<div class="row">
				<div class="col s12">
					<?php wp_pagenavi(array( 'query' => $loop ));wp_reset_postdata(); ?>
				</div>
			</div>
			<?php else: ?>
			<div class="row">
				<div class="col s12">
					<h3 class="center-align">Đang cập nhật</h3>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</section>
<?php get_footer('shop') ?>