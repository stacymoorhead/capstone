<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dye_in_Style
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
			echo ('<hr>');
		else :
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
			the_excerpt();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dyeinstyle' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="continue-reading">
		<?php
		$read_more_link = sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;<?span>', 'dyeinstyle' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		);
		?>
					
		<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">
			<button><?php echo $read_more_link; ?></button>
		</a>
	</div><!-- .continue-reading -->

	<footer class="entry-footer">
		<?php dyeinstyle_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
