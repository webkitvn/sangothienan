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
				?>
					<div class="col s12 m6 l6">
						<a class="cat-item" href="<?php echo get_term_link($cat->slug, 'product_cat') ?>">
							<?php echo $cat->name ?> <span>+</span>
						</a>
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
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123pabb.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123pacb.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123pagb.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123pbab.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123pbvb.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123pdab.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123phdb.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123pmb.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123pnvb.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123poceb.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123ppgb.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123pseab.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123psgb.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123pvcb.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123pvtb.jpg" alt=""></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/customers/123pagb.jpg" alt=""></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<?php get_template_part('template-parts/content', 'testimonio'); ?>
	<?php get_template_part('template-parts/content', 'newsletter'); ?>
<?php get_footer('shop') ?>