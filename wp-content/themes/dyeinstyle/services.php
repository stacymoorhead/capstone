<?php
/*
Template Name: Services
 *
 * @package Dye_in_Style
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<article class="services-icons">
				<div class="icon-boxes">
					<?php
					$args = array(
					  'post_type'   => 'services',
					  'post_status' => 'publish',
					  
					 );
					  
					$services = new WP_Query( $args );
					if( $services->have_posts() ) :
					      while( $services->have_posts() ) :
					        $services->the_post();
					        ?>
					          <a href="<?php the_field('service_page_url') ?>"><div class="service"><?php printf( '<figure>%1$s</figure> <h3>%2$s</h3>', get_the_post_thumbnail(), get_the_title() );  ?></div></a>
					        <?php
					      endwhile;
					      wp_reset_postdata();
					else :
					  esc_html_e( 'No services to display!', 'text-domain' );
					endif;
					?>
				</div><!-- .icon-boxes -->
			</article><!-- .services-icons -->			
			<hr>
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
