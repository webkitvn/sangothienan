<?php /*Template Name: Giới Thiệu*/ ?>

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
	<section class="about-intro">
		<div class="about-intro-wrapper section-wrapper">
			<div class="row">
				<div class="col s12">
					<h2>THIẾT KẾ NỘI THẤT - THIẾT KẾ KIẾN TRÚC - THI CÔNG XÂY DỰNG<br>SX ĐỒ GỖ NỘI THẤT</h2>
					<h3>Một vài chuyện nhỏ trên cho thấy chủ nghĩa cá nhân có cả hai mặt hay và dở, tất nhiên có những xu hướng muốn kết hợp, như xã hội Hàn Quốc hay Nhật Bản, tức là con người cá nhân được đảm bảo trong cộng đồng gia đình. Nếp sống tập thể từ thời bao cấp cũng có những mặt tích cực, đặc biệt trong thời chiến ai nấy đều cần sự tương trợ cộng đồng, nhưng sau đó là sự thụ động, ít chịu trách nhiệm về việc làm cá nhân, cuối cùng là không có tư cách cá nhân. Ở ngoài quán nước, người ta thoải mái nêu ý kiến, và nào là chỉ trích phê bình</h3>
					<ul class="number">
						<li>
							<span>125</span>
							<span>Dự án đã thực hiện</span>
						</li>
						<li>
							<span>60</span>
							<span>Nhân sự</span>
						</li>
						<li>
							<span>03</span>
							<span>Nhà xưởng</span>
						</li>
						<li>
							<span>60</span>
							<span>Đối tác - Khách hàng thân thiết</span>
						</li>
						<li>
							<span>99%</span>
							<span>Khách hàng hài lòng</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
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
	<section class="about-product-cats">
		<div class="about-product-cats-wrapper section-wrapper">
			<div class="row">
				<div class="col s12">
					<div class="section-title">
						Sản phẩm
					</div>
				</div>
			</div>
			<div class="row">
				<?php 
					foreach($product_cats as $cat) :
						$args = array(
					        'taxonomy'     => 'product_cat',
					        'orderby'      => 'id',
					        'hide_empty'   => 0,
					        'parent' => $cat->term_id
					  	);
						$sub_cats = get_categories($args); 
				?>
					<div class="col s12 m6 l6">
						<div class="main-cat">
							<a class="cat-item" href="<?php echo get_term_link($cat->slug, 'product_cat') ?>">
								<?php echo $cat->name ?>
							</a>
							<?php if($sub_cats) : ?>
								<div class="toggle-btn">
									<span></span><span></span>
								</div>
							<?php endif; ?>
						</div>
						<div class="sub-cats">
							<ul>
								<?php foreach($sub_cats as $cat) : ?>
									<li><a href="<?php get_term_link($cat->slug, 'product_cat'); ?>"><?php echo $cat->name ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<section class="customers">
		<div class="customer-wrapper section-wrapper">
			<div class="row">
				<div class="col s12">
					<div class="section-title">Khách hàng tiêu biểu</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<ul>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123PABB.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123PACB.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123PAGB.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123PBAB.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123PBVB.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123PDAB.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123PHDB.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123PMB.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123PNVB.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123POCEB.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123PPGB.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123PSEAB.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123PSGB.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123PVCB.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123PVTB.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123PAGB.jpg" alt=""></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<?php get_template_part('template-parts/content', 'testimonio'); ?>
	<?php get_template_part('template-parts/content', 'newsletter'); ?>
<?php get_footer('shop') ?>