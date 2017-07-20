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
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
	
		<section class="post-content">
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
	
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
					comments_template();
			endif;		
		?>
		</section><!-- .post-content -->
		<?php
			get_sidebar();
		?>
	</article><!-- #post-<?php the_ID(); ?> -->
</div><!-- .site-content -->	
