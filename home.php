<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sango
 */

get_header(); ?>
	<?php get_template_part('template-parts/content', 'homeslider'); ?>
	<?php get_template_part('template-parts/content', 'cateslider' ); ?>
	<?php get_template_part('template-parts/content', 'featureproducts'); ?>
	<?php get_template_part('template-parts/content', 'sangoproductblock'); ?>
	<?php get_template_part('template-parts/content', 'newblog'); ?>
	<?php get_template_part('template-parts/content', 'testimonio'); ?>
	<?php get_template_part('template-parts/content', 'newsletter'); ?>
	<?php get_template_part('template-parts/content', 'advance'); ?>
<?php
get_footer();
