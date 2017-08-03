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
				<nav class="">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
						) );
					?>
				</nav>	
			</div>
			<div class="contact-info">
				<!--<span><i class="fa fa-phone" aria-hidden="true"></i> 215.781.6450</span> <a href="https://clients.mindbodyonline.com/asp/su1.asp?fl=true&tabID=2"><button class="appointment"><i class="fa fa-calendar" aria-hidden="true"></i> BOOK APPOINTMENT</button></a>-->
				<?php get_sidebar( 'header-contact'); ?>
			</div>
		</div>
		<header id="masthead" class="site-header">
			<nav class="navbar navbar-default main-navigation" role="navigation"> 
			<!-- Brand and toggle get grouped for better mobile display --> 
			  <div class="navbar-header"> 
			    <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
			      <span class="sr-only">Toggle navigation</span> 
			      <span class="icon-bar top-bar"></span> 
			      <span class="icon-bar middle-bar"></span> 
			      <span class="icon-bar bottom-bar"></span> 
			    </button> -->
			    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
			  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			  </div> 
			  <!-- Collect the nav links, forms, and other content for toggling --> 
			  <div class="collapse navbar-collapse navbar-ex1-collapse"> 
			    <?php /* Primary navigation */
				wp_nav_menu( array(
				  'menu' => 'top_menu',
				  'depth' => 2,
				  'container' => false,
				  'menu_class' => 'nav',
				  'theme_location' => 'main-nav',
				  'menu_id'        => 'primary-menu',
				  //Process nav menu using our custom nav walker
				  'walker' => new wp_bootstrap_navwalker())
				);
				?>
			  </div>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->
	</div><!-- .fixed -->	
	
	<?php if ( is_front_page() ) { ?>
	<div class="header-image-front">	
		<?php the_header_image_tag(); ?>
		<div class="logo-description">
			<div class="custom-logo-home">
				<?php the_custom_logo();?>
			</div><!-- .custom-logo -->		
				<?php $description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
						<div class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></div>
				<?php
				endif; ?>
			
		</div><!-- .logo-desription -->	
	</div><!-- .header-image -->
	
	<?php } elseif (is_home() ) { ?>
	<div class="header-image">	
		<?php the_header_image_tag(); ?>
		<div class="logo-description">
			<div class="custom-logo">
				<?php the_custom_logo(); ?>
			</div><!-- .custom-logo -->		
			<div class="site-heading">
				<h1>News &amp; Info</h1>
			</div><!-- .site-heading -->
		</div><!-- .logo-desription -->	
	</div><!-- .header-image -->
	
	<?php } elseif (is_archive() ) { ?>
	<div class="header-image">	
		<?php the_header_image_tag(); ?>
		<div class="logo-description">
			<div class="custom-logo">
				<?php the_custom_logo(); ?>
			</div><!-- .custom-logo -->		
			<div class="site-heading">
				<?php the_archive_title( '<h1>', '</h1>' ); 
				the_archive_description( '<div class="archive-description">', '</div>' ); ?>
			</div><!-- .site-heading -->
		</div><!-- .logo-desription -->	
	</div><!-- .header-image -->
	
	<?php } else { ?>
	<div class="header-image">	
		<?php if (has_post_thumbnail() ) {
			the_post_thumbnail(); 
		} else {
			the_header_image_tag();
		} ?>
		<div class="logo-description">
			<div class="custom-logo">
				<?php the_custom_logo(); ?>
			</div><!-- .custom-logo -->		
				<?php $title = the_title( '<div class="site-heading"><h1>', '</h1></div>' );
					echo $title; /* WPCS: xss ok. */
				?>
		</div><!-- .logo-desription -->		
	</div><!-- .header-image -->
	<?php } ?>
		
		

	<div class="divider"></div>
	<div id="content" class="content-container">
