<?php
/**
 * The template for display books post type single page.
 *
 */

get_header(); ?>

	<div id="primary" class="content-area clear">
		<main id="main" class="site-main clear" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<h1 style="display: none;"><?php the_title(); ?></h1>

				<?php  
				$imgurl = get_field('imgurl');
				$imgcaption = get_field('imgcaption');
				$framebg = get_field('frame_background');
				$btnLabel = get_field('btnLabel');
				$btnLink = get_field('btnLink');
				$style = '';
				if($framebg) {
					$style = ' style="background-image:url('.$framebg['url'].')"';
				}

				?>

				<?php if ($imgurl) { ?>
				<div class="hero wrapper">
					<div class="featured-stuff"<?php echo $style ?>>
						<div class="flexrow clear">
							<div class="col txtcol">
								<div class="pad">
									<?php if ($imgcaption) { ?>
										<?php echo $imgcaption ?>
									<?php } ?>
									<?php if ($btnLabel && $btnLink) { ?>
									<div class="buttondiv"><a href="<?php echo $btnLink ?>" target="_blank" class="btn1"><?php echo $btnLabel ?></a></div>	
									<?php } ?>
								</div>
							</div>
							<div class="col imgcol">
								<div class="pad"><img src="<?php echo $imgurl['url'] ?>" alt="<?php echo $imgurl['title'] ?>" /></div>
							</div>
						</div>
					</div>	
					</div>
				<?php } ?>

				<?php 
					$reviews = get_field('reviews'); 
					$total_reviews = ($reviews) ? count($reviews) : 0;
					$max = 4;
					$more_reviews = array();
				?>

				<div class="pagecontent clear">
					<div class="inner wrapper">
						<h6><?php the_title(); ?></h6>
						<div class="textwrap">
							<?php the_content(); ?>
						</div>

						<?php if ($reviews) { ?>
						<div class="reviews-wrapper">
							<?php $i=1; foreach ($reviews as $v) {
								$name = $v['name'];
								$message = $v['message']; 
								if($i<=$max) { ?>
									<?php if ($message) { ?>
									<div class="review">
										<div class="message"><?php echo $message; ?></div>
										<div class="from"><?php echo $name ?></div>
									</div>
									<?php } ?>
								<?php } else { 
									$more_reviews[] = $v;
								} ?>

							<?php  $i++; } ?>
						</div>
						<?php } ?>
						
						<?php if ($more_reviews) { ?>
						<div class="buttondiv"><a href="#morequotes" class="button lblue opendiv">Read More Quotes</a></div>	
						<?php } ?>

						<?php 
							$rs_title = get_field('rs_title'); 
							$rs_text = get_field('rs_text'); 
						?>
						<?php if ($rs_text) { ?>
						<section class="page-bottom-text clear">
							<div class="textwrap">
								<?php if ($rs_title) { ?>
								<h3><?php echo $rs_title ?></h3>
								<?php } ?>
								<?php echo $rs_text ?>
							</div>
						</section>	
						<?php } ?>
					</div>
				</div>

				<?php if ($more_reviews) { ?>
					<div id="morequotes" class="popupwrapper morequotes">
						<div class="popup-close"><div><a href="#" id="closepopup"><span>x</span></a></div></div>
						<div class="popup-middle">
							<div class="inside clear">
								<h5 class="popuptitle">MORE QUOTES ABOUT <i><?php echo get_the_title(); ?></i></h5>
								<div class="reviews-wrapper">
									<?php foreach ($more_reviews as $v) {
										$name = $v['name'];
										$message = $v['message']; 
										if ($message) { ?>
										<div class="review">
											<div class="message"><?php echo $message; ?></div>
											<div class="from"><?php echo $name ?></div>
										</div>
										<?php } ?>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>


			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
