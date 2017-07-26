<?php
/**
 * Template part for displaying instagram feed in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dye_in_Style
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dyeinstyle' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
