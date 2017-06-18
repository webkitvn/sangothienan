<?php get_header('shop') ?>
	<section class="page-cover">
		<img src="<?php echo get_template_directory_uri(); ?>/img/du-an-cover.jpg" alt="Dự án">
		<div class="page-title">
			<h1>Dự án</h1>
		</div>
		<div class="overlay"></div>
	</section>
	<section class="page-intro">
		<h2>
			<span>Chúng tôi luôn lấy phương châm</span> "CHẤT LƯỢNG – TỐC ĐỘ – CHUYÊN NGHIỆP"<br>
			<span>làm kim chỉ nam cho mọi hành động</span>
		</h2>
	</section>
	<section class="project-list">
		<div class="project-list-wrapper">
			<?php
				if(have_posts()) :
			?>
			<div class="row">
				<?php while(have_posts()) : the_post(); ?>
				<div class="col s6 l4">
					<a class="project-item" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
						<span class="overlay">
							<div>
								<img src="<?php echo get_template_directory_uri(); ?>/img/thiena-icon.png" alt="<?php the_title_attribute(); ?>">
								<h3><?php the_title() ?></h3>
							</div>
						</span>
					</a>
				</div>
				<?php endwhile; ?>
			</div>
			<div class="row">
				<div class="col s12">
					<?php wp_pagenavi();wp_reset_query(); ?>
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