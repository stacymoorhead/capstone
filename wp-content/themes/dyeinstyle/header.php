<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dye_in_Style
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="fixed">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dyeinstyle' ); ?></a>
		<div class="info">
			<div class="social-top">
				<a href="https://www.facebook.com/pg/mariasdyeinstyle"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<a href="https://www.instagram.com/explore/locations/330212585/marias-dye-in-style/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
			</div>
			<div class="contact-info">
				<span><i class="fa fa-phone" aria-hidden="true"></i> 215.781.6450</span> <a href="get.mndbdy.ly/s1ud/7ZaMvFfNBr"><button class="appointment"><i class="fa fa-calendar" aria-hidden="true"></i> BOOK APPOINTMENT</button></a>
			</div>
		</div>
		<header id="masthead" class="site-header">
			<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</div><!-- .site-branding -->
	
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i> <?php esc_html_e( 'Menu', 'dyeinstyle' ); ?></button>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'main-nav',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->
	</div><!-- .fixed -->	
	<div class="header-image">
		<?php if ( is_front_page() || is_home() ) {
			the_header_image_tag();
		
		/*} elseif ( is_front_page()){
			the_header_image_tag();
		
		} elseif ( is_home()){
			the_header_image_tag();*/
		
		} else {
			the_post_thumbnail();
		} ?>
		
		<div class="logo-description">
			<div class="custom-logo"><?php the_custom_logo(); ?></div>
			<?php $description = get_bloginfo( 'description', 'display' );
				$title = the_title( '<div class="site-heading"><h1>', '</h1></div>' );
				if ( is_front_page() && is_home() ) {
					if ( $description || is_customize_preview() ) : ?>
						<div class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></div>
					<?php
					endif; 
					
				} elseif ( is_front_page()){
					if ( $description || is_customize_preview() ) : ?>
						<div class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></div>
					<?php
					endif; 
				
				} elseif ( is_home()){ ?>
					<div class="site-heading"><h1>News &amp; Updates</h1></div>
				<?php
				} else { ?>
					<?php echo $title; /* WPCS: xss ok. */ ?>
				
				<?php
				} ?>
		</div>		
	</div><!-- .header-image -->
	<div class="divider"></div>
	<div id="content" class="content-container">
