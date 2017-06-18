<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sango
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class('browser-default'); ?>>
	<a class="skip-link screen-reader-text hide" href="#content"><?php esc_html_e( 'Skip to content', 'sango' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrapper">
			<div class="col">
				<ul class="left left-menu">
					<li class="account"><a href="#">Đăng nhập</a></li>
					<li class="cart"><a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Giỏ hàng <span class="qty"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a></li>
					<li class="search"><a href="#" id="search"><i class="fa fa-search" aria-hidden="true"></i></a></li>
				</ul>
			</div>
			<div class="col logo">
				<a href="<?php bloginfo('home'); ?>">
					<img src="<?php echo get_template_directory_uri();?>/img/logo-thienan.png" alt="Sàn gỗ Thiên An">
				</a>
			</div>
			<div class="col">
				<a href="#" id="menu-toogle" data-activates="main-menu" class="button-collapse right"></a>
			</div>
		</div>
	</header><!-- #masthead -->
	
	<div class="side-nav" id="main-menu">
		<div class="sidenav-wrapper">
			<a href="#" class="close-btn close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
			<?php wp_nav_menu( array('menu' => 'Primary Menu', 'theme_location' => 'primary-menu' )); ?>
		</div>
	</div>