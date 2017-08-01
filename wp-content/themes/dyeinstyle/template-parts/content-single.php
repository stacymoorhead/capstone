<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dye_in_Style
 */

?>
<div class="site-content">	
	<section class="home-archive-content">
		<div class="home-archive-posts">	
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<figure class="secondary-image">
					<?php 
					if (class_exists('MultiPostThumbnails')) : 
					MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
					endif;
					 ?>
				 </figure><!-- .secondary-image -->
				<header class="entry-header">
					<?php  ?>
					<?php
					if (! is_singular() ) :
						/*the_title( '<h1 class="entry-title">', '</h1>' ); DELETE WHEN SURE YOU DON'T NEED
						echo ('<hr>');
					else :*/
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						echo ('<hr>');
					endif;
					
					dyeinstyle_the_category_list();
					if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php dyeinstyle_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php
					endif; ?>
				</header><!-- .entry-header -->
		
				<div class="entry-content">
					<?php
						the_content( sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'dyeinstyle' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						) );
			
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dyeinstyle' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->
			
				<footer class="entry-footer">
					<?php dyeinstyle_entry_footer(); ?>
				</footer><!-- .entry-footer -->
				<?php
					dyeinstyle_post_navigation();
				?>
			</article><!-- #post-<?php the_ID(); ?> -->
		</div><!-- .archive-content -->
		<div class="home-archive-sidebar">
			<?php get_sidebar(); ?>
		</div><!-- .archive-sidebar -->
	</section><!-- .archive-content -->				
</div><!-- .site-content -->

	


