<?php
/*
Template Name: Staff
 *
 * @package Dye_in_Style
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container">
			<section class="staff">
					<?php
					$args = array(
					  'post_type'   => 'staff',
					  'post_status' => 'publish',
					  
					 );
					  
					$staff = new WP_Query( $args );
					if( $staff->have_posts() ) :
					      while( $staff->have_posts() ) :
					        $staff->the_post();
					        ?>
					          <article><?php printf( '<figure>%1$s</figure> <h3>%2$s</h3> <hr> <h4>%3$s</h4> <p>%4$s</p>', get_the_post_thumbnail(), get_the_title(), get_field('job_title'), get_the_content() ); 
					        
						        edit_post_link(
									sprintf(
										wp_kses(
											/* translators: %s: Name of current post. Only visible to screen readers */
											__( 'Edit <button class="screen-reader-text">%s</button>', 'dyeinstyle' ),
											array(
												'button' => array(
													'class' => array(),
												),
											)
										),
										get_the_title()
									),
									' <div class="button"><button class="staff-edit-link btn-small">',
									'</button></div>'
								); ?>
								</article>
					        
					        <?php
					      endwhile;
					      wp_reset_postdata();
					else :
					  esc_html_e( 'No staff to display!', 'text-domain' );
					endif;
					?>
			</section><!-- .staff -->			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
