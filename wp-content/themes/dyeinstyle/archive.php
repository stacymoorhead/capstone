<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dye_in_Style
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="home-archive-content">
				<div class="home-archive-posts">
					<?php
					if ( have_posts() ) : ?>
			
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();
			
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );
			
						endwhile;
			
						the_posts_pagination( array(
							'prev_text' => __( 'Newer', 'humescores' ),
							'next_text' => __( 'Older', 'humescores' ),
							'before_page_number' => '<span class="screen-reader-text">' . __( 'Page ', 'humescores' ) . '</span>',
						));
			
					else :
			
						get_template_part( 'template-parts/content', 'none' );
			
					endif; ?>
				
				</div><!-- .archive-content -->
				<div class="home-archive-sidebar">
					<?php get_sidebar(); ?>
				</div><!-- .archive-sidebar -->
			</section><!-- .archive-content -->	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
