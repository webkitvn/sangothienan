<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sango
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col s12 l4 widget-area">
	<aside class="sidebar">
		<div class="sidebar-item">
			<h3>Tin xem nhiều</h3>
			<dl>
				<?php 
					query_posts('post_type=post&posts_per_page=6');
					while(have_posts()) : the_post();
				?>
				<dt>
					<a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
				</dt>
				<dd><?php the_excerpt(); ?></dd>
				<?php endwhile;wp_reset_query(); ?>
			</dl>
		</div>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside>
</div>