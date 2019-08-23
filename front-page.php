<?php get_header(); ?>
<div id="primary" class="content-area wrapper">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<h1 style="display:none;"><?php the_title(); ?></h1>
			<?php  
				$book_image = get_field('book_image');
				$book_title1 = get_field('book_title1');
				$book_title2 = get_field('book_title2');
				$book_description = get_field('book_description');
				$button_label = get_field('button_label');
				$button_link = get_field('button_link');
			?>
			<section class="featured-book clear">
				<div class="flexrow">
					<div class="col left">
						<div class="inside">
						<?php if ($book_image) { ?>
							<img src="<?php echo $book_image['url']; ?>" alt="<?php echo $book_image['title']; ?>" />	
						<?php } ?>
						</div>
					</div>
					<div class="col right">
						<div class="inside">
							<div class="textwrap">
								<?php if ($book_title1) { ?>
									<h5 class="t1"><?php echo $book_title1 ?></h5>
								<?php } ?>
								<?php if ($book_title2) { ?>
									<h3 class="t2"><?php echo $book_title2 ?></h3>
								<?php } ?>
								<?php if ($book_description) { ?>
									<div class="desc"><?php echo $book_description ?></div>
								<?php } ?>

								<?php if ($button_label && $button_link) { ?>
								<div class="button">
									<a href="<?php echo $button_link ?>" target="_blank" class="btn1"><?php echo $button_label ?></a>
								</div>	
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</section>


			<?php  
				$news_logo = get_field('news_logo');
				$news_excerpt = get_field('news_excerpt');
				$news_image = get_field('news_image');
				$news_button_label = get_field('news_button_label');
				$news_button_link = get_field('news_button_link');
				$news_style = '';
				if($news_image) {
					$news_style = ' style="background-image:url('.$news_image['url'].')"';
				}
			?>
			<?php if ($news_excerpt) { ?>
			<section class="featured-news clear">
				<div class="flexrow">
					<?php if ($news_logo) { ?>
					<div class="nlogo imgcol col"><div><img src="<?php echo $news_logo['url'] ?>" alt="<?php echo $news_logo['title'] ?>"></div></div>
					<?php } ?>

					<?php if ($news_excerpt) { ?>
					<div class="ntext col<?php echo ($news_logo) ? ' hasimage':'noimage';?>">
						<div class="mid">
							<?php echo $news_excerpt; ?>
							<?php if ($news_button_label && $news_button_link) { ?>
							<div class="button">
								<a href="<?php echo $news_button_link ?>" target="_blank" class="btn1"><?php echo $news_button_label ?></a>
							</div>	
							<?php } ?>	
						</div>
					</div>
					<?php } ?>

					<?php if ($news_image) { ?>
					<div class="nImage imgcol col">
						<div><img src="<?php echo $news_image['url'] ?>" alt="<?php echo $news_image['title'] ?>"></div>
					</div>
					<?php } ?>
				</div>
			</section>
			<?php } ?>
			
			<?php  
				$quote = get_field('quote');
				$author = get_field('author');
				$quote_image = get_field('quote_image');
				$quote_style = '';
				if($quote_image) {
					$quote_style = ' style="background-image:url('.$quote_image['url'].')"';
				}
			?>
			<?php if ($quote) { ?>
			<section class="section-quote clear">
				<div class="inner">
					<div class="imagecol"<?php echo $quote_style; ?>></div>
					<div class="textcol">
						<?php echo $quote ?>
						<?php if ($author) { ?>
						<h5 class="author"><?php echo $author ?></h5>	
						<?php } ?>
					</div>
				</div>
			</section>
			<?php } ?>
			

		<?php endwhile;  ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
