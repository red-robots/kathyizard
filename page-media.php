<?php
/**
 * Template Name: Media
 *
 */

get_header(); ?>

	<div id="primary" class="content-area clear page-media">
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

					<div class="two-column-box clear nomb">
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
					?>
					
					<?php if ($row2_text) { ?>
					<div class="two-column-box clear row2">
						<div class="flexrow">
							<div class="col left full">
								<?php if ($row2_text) { ?>
								<div class="text2"><?php echo $row2_text ?></div>	
								<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>

				</div>

				<?php if ( $galleries = get_field('appearances') ) { ?>
				<section class="imageboxes clear">
					<div class="wrapper">
						<h3 class="sectionTitle">Appearances <span style="font-size: 14px;">(click to view)</span></h3>
						<div class="flexrow clear">
							<?php $g=1; foreach ($galleries as $p) {
								$picId = $p['ID'];
								$title = $p['title'];
								$caption = $p['caption'];
								$imgSrc = $p['url'];
								$imageURL = get_field('attachment_link',$picId);
								$beforeLink = '';
								$afterLink = '';
								if($imageURL) {
									$beforeLink = '<a href="'.$imageURL.'" target="_blank" class="imglink">';
									$afterLink = '</a>';
								}
							?>
							<div id="pic<?php echo $picId;?>" class="imgbox">
								<?php echo $beforeLink; ?><img src="<?php echo $imgSrc; ?>" alt="<?php echo $picId; ?>" /><?php echo $afterLink; ?>
							</div>	
							<?php $g++; } ?>
						</div>
					</div>
				</section>	
				<?php } ?>
				
				<?php
					$media_title = get_field('media_title');  
					$media_text = get_field('media_text');  
				?>
				<?php if ( $videos = get_field('videos') ) { ?>
				<section class="videoboxes clear">
					<div class="wrapper">
						<h3 class="sectionTitle">Videos</h3>
						<div class="flexrow clear">
							<?php $g=1; foreach ($videos as $p) {
								$picId = $p['ID'];
								$title = $p['title'];
								$caption = $p['caption'];
								$imgSrc = $p['url'];
								$imageURL = get_field('attachment_link',$picId);
								$beforeLink = '';
								$afterLink = '';
								if($imageURL) {
									$beforeLink = '<a href="'.$imageURL.'" data-fancybox data-type="iframe" target="_blank" class="imglink">';
									$afterLink = '</a>';
								}
							?>
							<div id="vid<?php echo $picId;?>" class="imgbox">
								<?php echo $beforeLink; ?>
								<span class="imgwrap" style="background-image:url('<?php echo $imgSrc; ?>')">
									<?php if ($imageURL) { ?>
									<span class="play"><span></span></span>
									<?php } ?>
									<img src="<?php echo $px2 ?>" alt="" aria-hidden="true">
								</span>
								<?php echo $afterLink; ?>
								<?php if ($caption) { ?>
								<div class="caption"><?php echo $caption ?></div>	
								<?php } ?>
							</div>	
							<?php $g++; } ?>

							<?php if ($media_text) { ?>
								<div id="mediatext" class="imgbox">
									<span class="imgwrap justtxt">
										<span class="txtwrap">
											<span class="wrap">
												<?php if ($media_title) { ?>
												<h6 class="mtitle"><?php echo $media_title ?></h6>
												<?php } ?>
												<span class="mtext"><?php echo $media_text ?></span>
											</span>
										</span>
										<img src="<?php echo $px2 ?>" alt="" aria-hidden="true">
									</span>
								</div>
							<?php } ?>
						</div>
					</div>
				</section>	
				<?php } ?>

			<?php endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
