<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Sango
 */

get_header('shop'); ?>
	<section class="post-detail">
		<div class="post-detail-wrapper section-wrapper">
			<div class="row">
				<div class="col s12 l8">
					<div <?php post_class() ?>>
						<h1 class="entry-title"><?php the_title() ?></h1>
						<div class="post-time">
							<span><?php the_time('d'); ?></span>
							<span><?php the_time('m-Y'); ?></span>
						</div>
						<span class="vcard author hide"><span class="fn"><?php the_author(); ?></span></span>
						<span class="date updated published hide"><?php the_time(); ?></span>
						<div class="content">
							<?php the_content(); ?>
						</div>
						<div class="post-link">
	                        <?php previous_post_link( '%link', '<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>' ); ?>
	                        <?php next_post_link( '%link', '<i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>' ); ?>
		                </div>
					</div>
				</div>
				<div class="col s12 l4">
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
					</aside>
				</div>
			</div>
		</div>
	</section>
	
<?php get_footer('shop'); ?>
