<?php
/**
 * Template Name: Blog
 *
 */

get_header(); ?>

	<div id="primary" class="content-area clear page-fullwidth-image page-blog">
		<main id="main" class="site-main clear" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<header class="entry-header" style="display:none;"><h1 class="entry-title">About Me</h1></header>
				<?php if ( get_the_content() ) { ?>
				<div class="entry-content">
					<div class="wrapper"><?php the_content(); ?></div>
				</div>
				<?php } ?>
			<?php endwhile;  ?>
				<?php  
				$placeholder = get_bloginfo("template_url") . "/images/px2.png";
				$latest_args = array(
					'posts_per_page'=> 1,
					'post_type'		=> 'post',
					'orderby'		=> 'date',
					'order'			=> 'DESC',
					'post_status'	=> 'publish'
				);
				$posts = get_posts($latest_args);
				$lpID = '';
				if($posts) { 
				$latest = $posts[0]; 
				$lpID 	= $latest->ID;
				$lpTitle = $latest->post_title;
				// $thumbId = get_post_thumbnail_id($latest);
				// $mainImg = wp_get_attachment_image_src($thumbId,'medium_large');
				$mainImg = get_field("thumbnail_image",$lpID);
				$mainTxt = $latest->post_content;
				$mainTxt = ($mainTxt) ? shortenText( strip_tags($mainTxt), 300,' ','...' ) : '';
				?>
				<div class="latestblog clear nomb <?php echo ($mainImg) ? 'twocol':'onecol';?>">
					<div class="wrapper">
						<div class="flexrow">
						<?php if ($mainImg) { ?>
							<div class="col imagecol">
								<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" style="visibility:hidden">
								<div class="image" style="background-image:url('<?php echo $mainImg['url']?>');"></div>
							</div>	
							<?php } ?>
							<div class="col textcol">
								<div class="inside">
									<h2 class="posttitle"><?php echo $lpTitle; ?></h2>
									<div class="text"><?php echo $mainTxt; ?></div>
									<div class="btndiv"><a href="<?php echo get_permalink($lpID); ?>" class="button lblue">Read More</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				
				<?php
				$paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
				$args = array(
					'posts_per_page'=> 12,
					'orderby'		=> 'date',
					'order'			=> 'DESC',
					'post_type'		=> 'post',
					'post_status'	=> 'publish',
					'paged'			=> $paged
				);
				if($lpID) {
					$args['post__not_in'] = array($lpID);
				}
				$blogs = new WP_Query($args);
				if ( $blogs->have_posts() ) {  ?>
				<section class="bloglist">
					<div class="wrapper">
						<div class="flexrow">
						<?php while ( $blogs->have_posts() ) : $blogs->the_post();  
							$content = get_the_content();
							$excerpt = ($content) ? shortenText( strip_tags($content), 250,' ','...' ) : '';
							$postID = get_the_ID();
							// $thumbId = get_post_thumbnail_id($postID);
							// $featImg = wp_get_attachment_image_src($thumbId,'medium_large');
							$featImg = get_field("thumbnail_image",$postID);
							?>
							<div class="post-item <?php echo ($featImg) ? 'haspic':'nopic';?>">
								<div class="inside">
									<div class="post-image">
										<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" class="placeholder">
										<?php if ($featImg) { ?>
										<span class="feat-image" style="background-image:url('<?php echo $featImg['url'] ?>');"></span>	
										<?php } ?>
									</div>
									<div class="post-text">
										<h2 class="ptitle"><?php echo get_the_title(); ?></h2>
										<div class="excerpt">
											<?php echo $excerpt ?> 
											<div class="btndiv"><a href="<?php echo get_permalink() ?>" class="more">Read More</a></div>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>
				
					<?php
		         	$total_pages = $blogs->max_num_pages;
		            if ($total_pages > 1){ ?>
		            	<div class="wrapper">
			                <div id="pagination" class="pagination-wrapper clear">
			                    <?php
			                        $pagination = array(
			                            'base' => @add_query_arg('pg','%#%'),
			                            'format' => '?paged=%#%',
			                            'current' => $paged,
			                            'total' => $total_pages,
			                            'prev_text' => __( '&laquo;', 'red_partners' ),
			                            'next_text' => __( '&raquo;', 'red_partners' ),
			                            'type' => 'plain'
			                        );
			                        echo paginate_links($pagination);
			                    ?>
			                </div>
		                </div>
		                <?php
		            }
			        ?>

		        </section>

				<?php } ?>

			</div><!-- .mug-container-->

		</main><!-- #main -->
	</div><!-- #primary -->

	
<?php

get_footer();
