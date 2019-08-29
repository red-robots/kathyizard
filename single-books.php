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
				$square = get_bloginfo('template_url') . '/images/px.png';
				$px2 = get_bloginfo('template_url') . '/images/px2.png';
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
					$topimgurl = get_field('topimgurl');
					$topimgLink = get_field('topimgLink');
					$topimgcaption = get_field('topimgcaption');
					$topimgBtnName = get_field('topimgBtn');
					$topimgBtnLink = get_field('topimgBtnLink');
					$imglink_before = '';
					$imglink_after = '';
					if($topimgLink) {
						$imglink_before = '<a href="'.$topimgLink.'" target="_blank">';
						$imglink_after = '<a>';
					}
				?>

				<?php if ($topimgurl && $topimgcaption) { ?>
				<div class="hero wrapper">
					<div class="two-column-box clear">
						<div class="flexrow">
							<div class="col left">
								<?php if ($topimgurl) { ?>
								<div class="media">
									<?php echo $imglink_before; ?>
									<img src="<?php echo $topimgurl['url'] ?>" alt="" aria-hidden="true">
									<span class="thumb" style="display:none;background-image:url(<?php echo $topimgurl['url']; ?>)"></span>
									<?php echo $imglink_after; ?>
								</div>
								<?php } ?>
							</div>
							<div class="col right">
								<div class="text text2">
									<?php if ($topimgcaption) { ?>
										<?php echo $topimgcaption ?>	
									<?php } ?>
									<?php if ($topimgBtnName && $topimgBtnLink) { ?>
									<div class="buttondiv text-center">
										<a href="<?php echo $topimgBtnLink ?>" target="_blank" class="btn1"><?php echo $topimgBtnName ?></a>
									</div>	
									<?php } ?>
								</div>
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

				<div class="pagecontent clear <?php echo ($topimgurl) ? 'imagetextcol':'framed';?>">
					<div class="inner wrapper clear">

						<div class="outerwrap clear <?php echo (has_post_thumbnail()) ? 'texthalf':'textfull';?>">
						
							<div class="textwrap">
								<?php the_content(); ?>
							</div>

					
							<?php $news = get_field('news'); ?>
							<?php if ($news) { ?>
							<section class="news-reviews">
								<?php foreach ($news as $v) {
									$n_image = $v['image'];
									$n_text = $v['text']; 
									?>
									<div class="news-info <?php echo ($n_image && $n_text) ? 'twocol':'full';?>">
										<?php if ($n_image) { ?>
										<div class="imgcol ncol">
											<img src="<?php echo $n_image['url'] ?>" alt="<?php echo $n_image['title'] ?>" />
										</div>
										<?php } ?>
										<?php if ($n_text) { ?>
										<div class="txtcol ncol"><?php echo $n_text ?></div>
										<?php } ?>
									</div>
								<?php  } ?>
							</section>
							<?php } ?>
						</div>

						<?php if ( has_post_thumbnail() ) { ?>
						<div class="postimg"><?php the_post_thumbnail('large'); ?></div>
						<?php } ?>


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
					</div>
				</div>

				<?php 
					$rs_title = get_field('rs_title'); 
					$rs_text = get_field('rs_text'); 
				?>
				<?php if ($rs_text) { ?>
				<section class="page-bottom-text clear">
					<div class="wrapper">
						<div class="textwrap">
							<?php if ($rs_title) { ?>
							<h3><?php echo $rs_title ?></h3>
							<?php } ?>
							<?php echo $rs_text ?>
						</div>
					</div>
				</section>	
				<?php } ?>

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
