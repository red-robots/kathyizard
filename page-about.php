<?php
/**
 * Template Name: About
 *
 */

get_header(); ?>

	<div id="primary" class="content-area clear page-about">
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

				<?php 
					$letter_title = get_field('letter_title'); 
					$letter_text = get_field('letter_text'); 
				?>
				
				<div class="entry-content clear <?php echo ($featured_image) ? ' has-image':'no-image';?>">
					<div class="textwrap wrapper">
						<div class="bio"><?php the_content(); ?></div>

						<?php if ($letter_text) { ?>
						<div class="letter">
							<a id="letterLink" href="#letterToReaders">
								<?php echo $letter_title ?>
								<span class="arrow"><i class="fas fa-chevron-right"></i>		</span>
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

	<?php 
		$letterImages = get_field('letter_images'); 
		$letter_quote = get_field('letter_quote'); 
	?>

	<?php if ($letter_text) { ?>
	<div id="letterToReaders" class="letterToReaders">
		<div class="lettertop middiv"><div><a href="#" id="closeLetter" class="close"><span>x</span></a></div></div>
		<div class="lettercontent middiv">
			<div class="inside clear">
				<?php if ($letter_quote) { ?>
					<blockquote class="quote"><?php echo $letter_quote ?></blockquote>	
				<?php } ?>
				<div class="lettertext"><?php echo $letter_text ?></div>
				<?php if ($letterImages) { ?>
				<div class="letter-images">
					<?php foreach ($letterImages as $img) { ?>
						<div class="img"><img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>"></div>
					<?php } ?>
				</div>	
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
<?php

get_footer();
