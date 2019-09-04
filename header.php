<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/fancybox.min.css">
<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site clear">
	<a class="skip-link sr" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<?php  
		$social_links = get_social_media(); /* extras.php */
	?>

	<header id="masthead" class="site-header clear" role="banner">
		<div class="inner-wrap">
			<a href="#" id="toggleMenu" class="mobile-menu">
				<span class="sr">Menu</span>
				<i></i>
			</a>
			<div class="mobileNav">
				<a href="<?php echo get_site_url(); ?>" class="favicon"><img src="<?php echo get_bloginfo('template_url'); ?>/images/favicon.png" alt="Logo"></a>
				<a href="<?php echo get_site_url(); ?>" class="sitename"><span><?php echo get_bloginfo('name'); ?></span></a>
			</div>
			<div class="nav">
				<div class="wrapper top">
					<?php if ($social_links) { ?>
						<div class="social-media">
							<?php foreach ($social_links as $s) { ?>
								<a href="<?php echo $s['url']; ?>"><i class="<?php echo $s['icon']; ?>"></i><span class="sr"><?php echo $s['field']; ?></span></a>
							<?php } ?>
						</div>
					<?php } ?>

					<?php if( get_custom_logo() ) { ?>
			            <div class="logo">
			            	<?php the_custom_logo(); ?>
			            </div>
			        <?php } else { ?>
			            <h1 class="logo">
				            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
			            </h1>
			        <?php } ?>

			        <div class="contact">
			        	<a class="hbtn" href="<?php echo get_site_url() ?>/contact/">Contact Kathy</a>
			        </div>
				</div><!-- wrapper -->

			
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<div class="wrapper">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu','container_class'=>'mainmenu' ) ); ?>
					</div>
				</nav>
			</div>
		</div>
	</header><!-- #masthead -->

	<?php get_template_part('template-parts/slides'); ?>

	<div id="content" class="site-content">
