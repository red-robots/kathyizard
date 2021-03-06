<?php
/**
 * Template Name: Stories
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
					$row1_image = $row1['row1_image'];
					$row1_image_link = $row1['row1_image_link'];
					$row1_content = $row1['row1_content'];
					$row1_before_link = '';
					$row1_after_link = '';
					if($row1_image_link) {
						$row1_before_link = '<a href="'.$row1_image_link.'">';
						$row1_after_link = '</a>';
					}

					$square = get_bloginfo('template_url') . '/images/px.png';
					$px2 = get_bloginfo('template_url') . '/images/px2.png';
					?>

					<div class="two-column-box clear">
						<div class="flexrow">
							<div class="col left">
								<?php if ($row1_image) { ?>
								<div class="media">
									<?php echo $row1_before_link; ?>
									<img src="<?php echo $px2 ?>" alt="" aria-hidden="true">
									<span class="thumb" style="background-image:url(<?php echo $row1_image['url']; ?>)"></span>
									<?php echo $row1_after_link; ?>
								</div>
								<?php } ?>
							</div>
							<div class="col right">
								<?php if ($row1_content) { ?>
									<div class="text text2"><?php echo $row1_content ?></div>	
								<?php } ?>
							</div>
						</div>
					</div>

					<?php  
					$row2 = get_field('row2');
					$row2_text = $row2['row2_text_content'];
					$main_content =	email_obfuscator($row2_text);
					?>

					<div class="two-column-box clear row2">
						<div class="flexrow">
							<div class="col left full">
								<?php if ($row2_text) { ?>
								<div class="text2"><?php echo $main_content ?></div>	
								<?php } ?>
							</div>
						</div>
					</div>

				</div>

				<?php  
				$galleries = get_field('galleries');
				?>
				<?php if ($galleries) { ?>
				<section class="galleries-section clear">
					<div class="row clear">
						<?php $g=1; foreach ($galleries as $p) {
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

			<?php endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
