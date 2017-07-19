<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Dye_in_Style
 */

if ( ! function_exists( 'dyeinstyle_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function dyeinstyle_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		esc_html_x( 'Posted on %s', 'post date', 'dyeinstyle' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'Written by %s', 'post author', 'dyeinstyle' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	
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
		' <button class="edit-link btn-small">',
		'</button>'
	);

}
endif;

if ( ! function_exists( 'dyeinstyle_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function dyeinstyle_entry_footer() {
	// Hide tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'dyeinstyle' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged: %1$s', 'dyeinstyle' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'dyeinstyle' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}

}
endif;

/**
 * Display category list
 */
 
 function dyeinstyle_the_category_list() {
 	/* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( esc_html__( ', ', 'dyeinstyle' ) );
	if ( $categories_list ) {
		/* translators: 1: list of categories. */
		printf( '<span class="cat-links">' . esc_html__( '%1$s', 'dyeinstyle' ) . '</span>', $categories_list ); // WPCS: XSS OK.
	}	
 }
 
 /**
 * Post navigation (previous / next post) for single posts.
 */
function dyeinstyle_post_navigation() {
	the_post_navigation( array(
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'dyeinstyle' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Next post:', 'dyeinstyle' ) . '</span> ' .
			'<span class="post-title">%title</span>',
		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'dyeinstyle' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Previous post:', 'dyeinstyle' ) . '</span> ' .
			'<span class="post-title">%title</span>',
	) );
}

