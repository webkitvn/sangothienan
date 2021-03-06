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
						<img src="<?php echo get_template_directory_uri();?>/img/thienan-logo.svg" alt="Sàn gỗ Thiên Ân">
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
							Đang Online: <b><?php echo do_shortcode('[wpstatistics stat=usersonline]'); ?></b> | Trong Ngày: <b><?php echo do_shortcode('[wpstatistics stat=visits time=today]'); ?></b> | Truy Cập Tháng: <b><?php echo do_shortcode('[wpstatistics stat=visits time=month]'); ?></b> | Tổng Truy Cập: <b><?php echo do_shortcode('[wpstatistics stat=visits time=total]'); ?></b>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<div id="search-modal" class="modal">
	    <div class="modal-content">
	    	<?php get_template_part('woocommerce/product', 'searchform'); ?>
	    </div>
    </div>
<?php wp_footer(); ?>

</body>
</html>
