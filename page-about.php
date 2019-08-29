<?php
/**
 * Template Name: About
 *
 */

get_header(); ?>

	<div id="primary" class="content-area clear page-about page-fullwidth-image">
		<main id="main" class="site-main clear" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<header class="entry-header" style="display:none;"><h1 class="entry-title">About Me</h1></header>

				<?php 
					$featured_image = get_field('featured_image'); 
					$subtitle = get_field('subtitle'); 
					$photos = get_field('photos'); 
				?>
				<?php if ($featured_image) { ?>
				<div class="featuredImage wrapper">
					<div class="feat-image">
						<img src="<?php echo $featured_image['url'] ?>" alt="<?php echo $featured_image['title'] ?>">
						<?php if ($subtitle) { ?>
						<div class="caption"><div class="mid"><?php echo $subtitle ?></div></div>	
						<?php } ?>
						<div class="frame"></div>
					</div>
				</div>
				<?php } ?>

	
				<div class="entry-content clear <?php echo ($featured_image) ? ' has-image':'no-image';?>">
					<div class="textwrap wrapper">
						<div class="bio"><?php the_content(); ?></div>

						<?php if ( $letter = get_post_by_slug('letter-to-the-readers') ) { ?>
						<div class="letter">
							<a id="letterLink" href="#letterToReaders">
								Letter to the Readers
								<span class="arrow"><i class="fas fa-chevron-right"></i></span>
							</a>
						</div>	
						<?php } ?>
					</div>

					<?php if ($photos) { ?>
					<div class="polaroids">
						<?php foreach ($photos as $p) { ?>
							<?php if ($p['image']) { ?>
							<div class="photo">
								<img src="<?php echo $p['image']['url'] ?>" alt="$p['image']['title']" />
								<?php if ($p['caption']) { ?>
								<small class="caption"><?php echo $p['caption']; ?></small>	
								<?php } ?>
							</div>
							<?php } ?>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
			<?php endwhile;  ?>

			<?php /* INSTAGRAM FEEDS */ ?>
			<section class="instagram-section clear">
				<div class="wrapper">
					<div id="insta_title" class="section-title"></div>
					<div id="instagram_feeds" class="instagramfeeds"></div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_template_part('template-parts/letter-to-the-readers'); ?>
<?php

get_footer();
