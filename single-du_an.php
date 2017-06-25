<?php get_header('shop') ?>
	<section class="page-cover">
		<img src="<?php echo get_template_directory_uri(); ?>/img/du-an-cover.jpg" alt="Dự án">
		<div class="page-title">
			<h2 class="title">Dự án</h2>
		</div>
		<div class="overlay"></div>
	</section>
	<section class="page-intro">
		<h2>
			<span>Chúng tôi luôn lấy phương châm</span> "CHẤT LƯỢNG – TỐC ĐỘ – CHUYÊN NGHIỆP"<br>
			<span>làm kim chỉ nam cho mọi hành động</span>
		</h2>
	</section>
	<section class="project-detail">
		<div class="project-detail-wrapper">
			<div class="row">
				<div class="col s12 l4 sticky">
					<div class="project-info">
						<h1><?php the_title() ?></h1>
						<div class="content">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				<div class="col s12 l8">
					<?php
		                $images = get_field('project_images');
		                if( $images ):
		            ?>
		        	<div class="project-images project-images-slider">
		        		<?php 
                        	foreach( $images as $image ):
	                    ?>
	                    <img src="<?php echo $image['sizes']['project_slider']; ?>" alt="<?php echo $image['alt'] ?>">
	                    <?php endforeach; ?>
			        </div>
			   	 	<?php endif; ?>
			   	 	<div id="facebook-comment">
			   	 		<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=1864542897125456";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
			   	 	</div>
				</div>
			</div>
		</div>
	</section>
	<?php 
		$loop = new WP_Query(array(
			'post_type' => 'du_an',
			'posts_per_page' => 3,
			'order_by' => 'rand'
		));
		if($loop->have_posts()) :
	?>
	<section class="related-projects project-list">
		<div class="related-projects-wrapper section-wrapper">
			<div class="row">
				<div class="col s12">
					<h4 class="align-center section-title">Dự án khác</h4>
				</div>
			</div>
			<div class="row">
				<?php while($loop->have_posts()) : $loop->the_post(); ?>
				<div class="col s12 m4 l4">
					<div class="project-item">
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
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>
<?php get_footer('shop'); ?>