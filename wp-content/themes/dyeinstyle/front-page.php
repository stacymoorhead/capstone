<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dye_in_Style
 */

get_header(); ?>

	<div id="primary">
		<main id="main" class="site-main">

			<?php/*
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			*/?>
			
			<section class="services-icons content-area">
				<h2>Services</h2>
				<hr>
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
			</section><!-- .services-icons -->

		</main><!-- #main -->
	</div><!-- #primary -->
<?php 
get_template_part( 'template-parts/content', 'instagram' ); ?>
<section class="news">
	<h2>Recent Posts</h2>
	<hr class="purple">
	<div class="news-container">
	
	<?php
	$recent_posts_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 2));
	while ($recent_posts_query->have_posts()) {
		$recent_posts_query->the_post();
	?>
	
	<div class="news-item">
	<?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

	
	<?php the_excerpt(); ?>
		<div class="continue-reading">
			<?php
			$read_more_link = sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;<?span>', 'dyeinstyle' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			);
			?>
							
			<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">
				<?php echo $read_more_link; ?>
			</a>
		</div><!-- .continue-reading -->
	</div><!-- .news-item -->
	
	<?php
	}
	?>

	</div><!-- news-container -->
</section><!-- .news -->
<section class="reviews">
	<div class="reviews-container">
		<?php do_action( 'wprev_pro_plugin_action', 1 ); ?>
	</div>
</section><!-- .reviews -->
<?php get_footer();
