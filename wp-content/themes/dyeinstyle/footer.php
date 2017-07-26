<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dye_in_Style
 */

?>

	</div><!-- #content -->
	<div class="divider-footer"></div>
	<footer id="colophon" class="site-footer">
		<div class="footer-container">
			<div class="footer-logo">
				<?php the_custom_logo(); ?>
				<p>125 Mill Street</p>
				<p>Bristol, Pennsylvania</p>
				<p><i class="fa fa-phone" aria-hidden="true"></i> 215.781.6450</p>
			</div>
			<div class="footer-social">
				<h2>Find us on:</h2>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'social',
					) );
				?>
				<a href="https://clients.mindbodyonline.com/asp/su1.asp?fl=true&tabID=2"><button class="appointment-footer"><i class="fa fa-calendar" aria-hidden="true"></i> BOOK APPOINTMENT</button></a>
			</div>	
			<div class="hours">
				<h2>Hours</h2>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'hours',
					) );
				?>
				<nav class="hours">
					
				</nav>
			</div>
		</div>	
	</footer><!-- #colophon -->
	<div class="site-info">
		<!--<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'dyeinstyle' ) ); ?>"><?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( esc_html__( 'Proudly powered by %s', 'dyeinstyle' ), 'WordPress' );
		?></a>
		<span class="sep"> | </span>-->
		<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'dyeinstyle' ), 'dyeinstyle', '<a href="http://www.stacylauren.com">Stacy Lauren Designs</a> &copy; Copyright' );
			echo date("Y");
		?>
		</div><!-- .site-info -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
