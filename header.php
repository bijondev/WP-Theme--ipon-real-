<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
global $IponReal_;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700|Roboto:100,100i,300,300i,400,700" rel="stylesheet">
<!-- 	font-family: 'Roboto', sans-serif;
	font-family: 'Roboto Slab', serif; -->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>
		<header id="masthead" class="site-header" role="banner">
			<div class="site-header-main container">
				<div class="site-branding">
					<?php twentysixteen_the_custom_logo(); ?>
					
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo $IponReal_['logo']['url']; ?>" alt="<?php bloginfo( 'name' ); ?>">
						</a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo $IponReal_['logo']['url']; ?>" alt="<?php bloginfo( 'name' ); ?>">
						</a></p>
					<?php endif;
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<!-- <p class="site-description"><?php echo $description; ?></p> -->
					<?php endif; ?>
				</div><!-- .site-branding -->
				<div class="top-contact">
					<ul class="top-menu-contact">
						<?php if( $IponReal_['email']) : ?>
							<li class="hidden-xs" ><a href="#"><?php echo $IponReal_['email']; ?></a></li>
						<?php endif; ?>
						<?php if( $IponReal_['phonea']) : ?>
							<li ><a href="#"><?php echo $IponReal_['phonea']; ?></a></li>
						<?php endif; ?>
						<?php if( $IponReal_['apartments']) : ?>
							<li class="hidden-xs hidden-sm visible-md" ><a href="#"><?php echo $IponReal_['apartments']; ?></a></li>
						<?php endif; ?>
					</ul>
					<ul class="top-search hidden-xs hidden-sm visible-md">
						<li> <button type="button" class="btn btn-link search-btn">
							 <i class="fa fa-search" aria-hidden="true"></i>
						</button>
							<div class="search-form">
								<form action="<?php echo home_url( '/' ); ?>">
									<input type="text" class="form-control" name="s" value="<?php echo get_search_query(); ?>" placeholder="Type here...">
								</form>
							</div>
						</li>
						
						<li><?php dynamic_sidebar( 'sidebar-ln' ); ?></li>
					
					</ul>
				</div>
			</div><!-- .site-header-main -->
			<div class="site-header-main main-menu">
				<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
					<div class="responsiv-bar">
					<button id="menu-toggle" class="menu-toggle">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</button>
					<ul class="top-search hidden-lg hidden-md hidden-sm">
						<li> <button type="button" class="btn btn-link search-btn">
							 <i class="fa fa-search" aria-hidden="true"></i>
						</button>
							<div class="search-form">
								<form action="<?php echo home_url( '/' ); ?>">
									<input type="text" class="form-control" name="s" value="<?php echo get_search_query(); ?>" placeholder="Type here...">
								</form>
							</div>
						</li>
						
						<li><?php dynamic_sidebar( 'sidebar-ln' ); ?></li>
					
					</ul>

					</div>


					<div id="site-header-menu" class="site-header-menu">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation container" role="navigation" aria-label="
							<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
							<div class="row">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'primary-menu',
									 ) );
								?>
							</div>
								
							</nav><!-- .main-navigation -->
						<?php endif; ?>
						<?php if ( has_nav_menu( 'social' ) ) : ?>
							<nav id="social-navigation" class="social-navigation container" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentysixteen' ); ?>">
							<div class="row">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'social',
										'menu_class'     => 'social-links-menu',
										'depth'          => 1,
										'link_before'    => '<span class="screen-reader-text">',
										'link_after'     => '</span>',
									) );
								?>
							</div>
								
							</nav><!-- .social-navigation -->
						<?php endif; ?>
					</div><!-- .site-header-menu -->
				<?php endif; ?>
			</div>
<!-- .header-image -->
		</header><!-- .site-header -->
		<div id="content" class="site-content">
