<?php
/*
Template Name: About
 *
 * @package Dye_in_Style
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="home-archive-content">
				<div class="home-archive-posts">

					<?php
					while ( have_posts() ) : the_post();
		
						get_template_part( 'template-parts/content', 'about' );
		
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
		
					endwhile; // End of the loop.
					?>
				</div><!-- .home-archive-posts -->
				<div class="home-archive-sidebar">
					<?php get_sidebar( 'about'); ?>
				</div><!-- .archive-sidebar -->
			</section><!-- .archive-content -->	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
