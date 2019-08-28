<?php
/**
 * Template Name: Speaking
 *
 */

get_header(); ?>

	<div id="primary" class="content-area clear page-fullwidth-image page-speaking">
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
					$intro = get_field('intro');
					$upcoming_events = get_field('events');
					$has_sidebar = ($intro || $upcoming_events) ? 'has-sidebar':'no-sidebar';
					$has_top_image = ($featured_image) ? 'has-image':'no-image';
					$photos = get_field('photos');
					$past_events = get_field('past_events');
				?>
			
				<div class="mug-container">
					<div class="entry-content clear <?php echo $has_top_image;?> <?php echo $has_sidebar;?>">
						<div class="wrapper">
							<div class="textwrap">
								<div class="maintext"><?php the_content(); ?></div>
								<?php if ($photos) { ?>
								<div class="eventphotos">
									<?php foreach ($photos as $pp) { 
										$eetitle = $pp['title'];
										$eeimage = $pp['image'];
										$eelink = $pp['link'];
										$e_beforelink = '';
										$e_afterlink = '';
										if($eelink) {
											$e_beforelink = '<a href="'.$eelink.'" target="_blank">';
											$e_afterlink = '</a>';
										}
										if ($eetitle && $eeimage) { ?>
										<div class="picinfo">
											<h6 class="pictitle"><?php echo $eetitle ?></h6>
											<span class="image">
												<?php echo $e_beforelink; ?><img src="<?php echo $eeimage['url'] ?>" alt="<?php echo $eeimage['title'] ?>" /><?php echo $e_afterlink; ?>
											</span>
										</div>	
										<?php } ?>
									<?php } ?>
								</div>	
								<?php } ?>
							</div>

							<?php if ($intro || $upcoming_events) { ?>
							<div class="sidebar-events">
								<div class="wrap">
									<?php if ($intro) { ?>
									<div class="intro"><?php echo $intro ?></div>	
									<?php } ?>
									
									<?php if ($upcoming_events) { ?>
										<h6>Upcoming Events</h6>
										<ul class="events">
										<?php foreach ($upcoming_events as $e) { 
											$e_title = $e['title'];
											$e_description = $e['description'];
											?>
											<li>
												<?php if ($e_title) { ?>
												<h3 class="title"><?php echo $e_title ?></h3>
												<?php } ?>
												<?php if ($e_description) { ?>
												<div class="details"><?php echo $e_description ?></div>
												<?php } ?>
											</li>
										<?php } ?>
										</ul>
									<?php } ?>

									<?php if ($past_events) { ?>
									<div class="buttondiv"><a href="#speakingExperience" class="button lblue opendiv">Past Events</a></div>
									<?php } ?>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>

					<?php if ($past_events) { ?>
						<div id="speakingExperience" class="popupwrapper past-events">
							<div class="popup-close"><div><a href="#" id="closepopup"><span>x</span></a></div></div>
							<div class="popup-middle">
								<div class="inside clear">
									<h6 class="toptitle">KATHY IZARD SPEAKING EXPERIENCE</h6>
								<?php foreach ($past_events as $pe) { 
									$p_title = $pe['past_title'];
									$p_info = $pe['past_info'];
									if ($p_title) { ?>
									<div class="event-info">
										<h6 class="eventname"><?php echo $p_title ?></h6>
										<div class="info"><?php echo $p_info ?></div>
									</div>	
									<?php } ?>
								<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
				<?php endwhile;  ?>

				<?php /* Speaking Posts */ ?>
				<?php  
				$args = array(
					'posts_per_page'=> -1,
					'post_type'		=> 'speaks',
					'post_status'	=> 'publish'
				);
				$theposts = new WP_Query($args);
				if ( $theposts->have_posts() ) {  ?>
				<section class="speakings-section clear">
					<div class="wrapper">
						<?php while ( $theposts->have_posts() ) : $theposts->the_post();  ?>
							<div class="speaks">
								<div class="spdesc"><?php the_content(); ?></div>
								<div class="titlediv"><h6 class="sptitle"><?php the_title(); ?></h6></div>
							</div>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</section>
				<?php } ?>
			</div><!-- .mug-container-->

		</main><!-- #main -->
	</div><!-- #primary -->

	
<?php

get_footer();
