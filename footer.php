<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sango
 */

?>
	<?php get_template_part('template-parts/content', 'totop'); ?>
	<footer>
		<div class="footer-wrapper">
			<div class="row">
				<div class="col s12 l2">
					<a href="<?php bloginfo('home');?>">
						<img src="<?php echo get_template_directory_uri();?>/img/logo-thienan.png" alt="Sàn gỗ Thiên An">
					</a>
				</div>
				<div class="col s12 l8">
					<?php wp_nav_menu( array('menu' => 'Footer Menu', 'theme_location' => 'footer-menu' )); ?>
				</div>
				<div class="col s12 l2">
					<ul class="social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="copyright">
			<div class="copyright-wrapper">
				<div class="row">
					<div class="col s12">
						<div class="align-left left">
						All rights reserved 2017 © DSGN. Website by Amwind, the Branding Agency
						</div>
						<div class="align-right right">
							Đang Online: <b>2</b> | Trong Ngày: <b>37</b> | Truy Cập Tháng: <b>354</b> | Tổng Truy Cập: <b>1063</b>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
