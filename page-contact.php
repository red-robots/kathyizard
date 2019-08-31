<?php
/**
 * Template Name: Contact
 *
 */

get_header(); ?>

	<div id="primary" class="content-area clear page-contact page-fullwidth-image">
		<main id="main" class="site-main clear" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

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

				<?php 
					$letter_title = get_field('letter_title'); 
					$letter_text = get_field('letter_text'); 
					$sidebar_content = get_field('sidebar_content'); 
				?>
				
				<div class="entry-content clear has-sidebar <?php echo ($featured_image) ? ' has-image':'no-image';?>" style="padding-top:20px;">
					<div class="wrapper">
						<div class="textwrap">
							<header class="entry-header"><h1 class="entry-title"><?php the_title(); ?></h1></header>
							<div class="bio"><?php the_content(); ?></div>

							<?php if ($letter_text) { ?>
							<div class="letter">
								<a id="letterLink" href="#letterToReaders">
									<?php echo $letter_title ?>
									<span class="arrow"><i class="fas fa-chevron-right"></i>		</span>
								</a>
							</div>	
							<?php } ?>

							<?php if ( $letter = get_post_by_slug('letter-to-the-readers') ) { ?>
							<div class="letter">
								<a id="letterLink" href="#letterToReaders">
									Letter to the Readers
									<span class="arrow"><i class="fas fa-chevron-right"></i></span>
								</a>
							</div>	
							<?php } ?>

						</div>

						<?php if ($sidebar_content) { 
							$str = $sidebar_content;
							$sidebar_content = email_obfuscator($str);
						?>
						<div class="sidebardiv">
							<div class="wrap">
								<?php echo $sidebar_content; ?>
							</div>
						</div>
						<?php } ?>
					</div>

				</div>
			<?php endwhile;  ?>


			<?php /* INSTAGRAM FEEDS */ ?>
			<section class="instagram-section instadiv clear">
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
