<?php
/**
 * Template Name: Moore Place
 *
 */

get_header(); ?>

	<div id="primary" class="content-area clear">
		<main id="main" class="site-main clear" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="wrapper">
					<h1 style="display:none"><?php the_title(); ?></h1>

					<?php  
					$row1 = get_field('row1');
					$row1_text = $row1['row1_text'];
					$video_link = $row1['video_link'];
					$video_caption = $row1['video_caption'];
					$video_thumbnail = $row1['video_thumbnail'];
					$square = get_bloginfo('template_url') . '/images/px.png';
					$px2 = get_bloginfo('template_url') . '/images/px2.png';
					$styleBg = ($video_thumbnail) ? ' style="background-image:url('.$video_thumbnail['url'].')"':'';
					?>

					<div class="two-column-box clear">
						<div class="flexrow">
							<div class="col colbg left"<?php echo $styleBg ?>>
								<?php if ($video_link && $video_thumbnail) { ?>
								<div class="video">
									<a data-fancybox href="<?php echo $video_link; ?>" target="_blank">
										<img src="<?php echo $px2 ?>" alt="" aria-hidden="true">
										<span class="thumb" style="background-image:url(<?php echo $video_thumbnail['url']; ?>);display:none;"></span>
									</a>
									<?php if ($video_caption) { ?>
									<div class="caption">
										<div class="inside"><?php echo $video_caption ?></div>
									</div>
									<?php } ?>
								</div>
								<?php } ?>
							</div>
							<div class="col right">
								<?php if ($row1_text) { ?>
									<div class="text"><?php echo $row1_text ?></div>	
								<?php } ?>
							</div>
						</div>
					</div>

					<?php  
					$row2 = get_field('row2');
					$row2_text = $row2['row2_text'];
					$r2_image = $row2['r2_image'];
					$r2_image_caption = $row2['r2_image_caption'];
					?>

					<div class="two-column-box clear row2">
						<div class="flexrow">
							<div class="col left">
								<?php if ($row2_text) { ?>
								<div class="text2"><?php echo $row2_text ?></div>	
								<?php } ?>
							</div>
							<div class="col right">
								<?php if ($r2_image) { ?>
								<div class="featimage">
									<div class="frame">
										<img src="<?php echo $r2_image['url'] ?>" alt="<?php echo $r2_image['title'] ?>">
										<?php if ($r2_image_caption) { ?>
										<div class="featcaption"><?php echo $r2_image_caption ?></div>	
										<?php } ?>
									</div>
								</div>	
								<?php } ?>
							</div>
						</div>
					</div>

				</div>

				<?php  
				$row3 = get_field('row3');
				$moore_photos = $row3['moore_photos'];
				?>
				<?php if ($moore_photos) { ?>
				<section class="moore-galleries clear">
					<div class="row clear">
						<?php $g=1; foreach ($moore_photos as $p) {
							$picId = $p['ID'];
							$title = $p['title'];
							$caption = $p['caption'];
							$img = $p['url'];
						?>
						<div id="pic<?php echo $picId;?>" class="gallery" style="background-image:url('<?php echo $img; ?>')">
							<img src="<?php echo $square ?>" alt="" aria-hidden="true">
							<div class="caption">
								<div class="wrap clear">
									<?php if ($title) { ?>
									<h3 class="title"><?php echo $title ?></h3>	
									<?php } ?>
									<?php if ($caption) { ?>
									<div class="text"><?php echo $caption ?></div>	
									<?php } ?>
								</div>
							</div>
						</div>	
						<?php $g++; } ?>
					</div>
				</section>	
				<?php } ?>

				<?php  
				$row4 = get_field('row4');
				$r3_video_thumbnail = $row4['r3_video_thumbnail'];
				$r3_video_link = $row4['r3_video_link'];
				$r3_video_caption = $row4['r3_video_caption'];
				?>
	
				<section class="bottom-video">
					<div class="wrapper">
						<div class="two-column-box clear">
							<div class="flexrow">
								<div class="col left">
									<?php if ($r3_video_link && $r3_video_thumbnail) { ?>
									<div class="video">
										<a data-fancybox href="<?php echo $r3_video_link; ?>" target="_blank">
											<img src="<?php echo $square ?>" alt="" aria-hidden="true">
											<span class="thumb" style="background-image:url(<?php echo $r3_video_thumbnail['url']; ?>)"></span>
										</a>
									</div>
									<?php } ?>
								</div>
								<div class="col right">
									<?php if ($r3_video_caption) { ?>
										<div class="text"><?php echo $r3_video_caption ?></div>	
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</section>	

			<?php endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
