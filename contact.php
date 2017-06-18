<?php /* Template Name: Liên hệ */ ?>
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
	<section class="contact-info">
		<div class="contact-info-wrapper section-wrapper">
			<div class="row">
				<div class="col s12 l6">
					<div class="contact-form">
						<h3>Chúng tôi luôn lắng nghe bạn</h3>
						<div class="form">
							<?php echo do_shortcode('[contact-form-7 id="4" title="Contact form"]'); ?>
						</div>
					</div>
				</div>
				<div class="col s12 l6">
					<div class="career">
						<h3>Bạn muốn làm việc với chúng tôi ?</h3>
						<img src="https://unsplash.it/600/300?image=601" alt="Bạn muốn làm việc với chúng tôi">
						<p>Nếu bạn là một nhân viên nhiệt tình và nghĩ rằng bạn có những gì nó cần, hãy gửi sơ yếu lí lịch và chi tiết của bạn đến <a href="mailto:careers@sangothienan.vn">careers@sangothienan.vn</a> để có mọi cơ hội. Nhấp vào đây để xem các vị trí cần tuyển.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="map">
		<div class="map-wrapper section-wrapper">
			<div class="address-block">
				<div class="block">
					<h3>CTY TNHH DSGN THIÊN ÂN</h3>
					<address>
						<p>1. THE PRINCE RESIDENCE: Tầng 2 P.2.23 / 17-19-21 Nguyễn Văn Trỗi, P.15, Q.Phú Nhuận.</p>
						<p>2. TRỤ SỞ CHÍNH: 152/6 Bình Long, P. Phú Thạnh, Q. Tân Phú.</p>
						<p>Website: www.dsgn.vn - www.noithatxinh.us</p>
						<p><span>Phone: 0909 050 418</span> <span>Tel: 08 3990 2516</span></p>
						<p>Email: <a href="mailto:contact@dsgn.vn">contact@dsgn.vn</a> &amp; <a href="mailto:dsgn.thienan@gmail.com">dsgn.thienan@gmail.com</a></p>
					</address>
				</div>
			</div>
			<div class="map-block" id="map">
				
			</div>
		</div>
	</section>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzizjwrIbYkwePQKOYjCmt9XCB6mpNiJQ&callback=mymap"
  type="text/javascript"></script>

  	<script>
  		//GOOGLE MAP
		var domain = document.domain;
		function mymap() {
		    var e = new google.maps.LatLng(10.792348, 106.680939);
		    var t = {
		        zoom: 16,
		        disableDefaultUI: true,
		        mapTypeControl: true,
		        mapTypeControlOptions: {
		            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
		        },
		        zoomControl: true,
		        zoomControlOptions: {
		            style: google.maps.ZoomControlStyle.SMALL,
		            position: google.maps.ControlPosition.LEFT_TOP
		        },
		        center: e,
		        mapTypeId: google.maps.MapTypeId.ROADMAP
		    };
		    var n = new google.maps.Map(document.getElementById("map"), t);
		    var s = new google.maps.Marker({
		        draggable: false,
		        animation: google.maps.Animation.DROP,
		        map: n,
		        position: e
		    })
		}
  	</script>
<?php get_footer('shop') ?>