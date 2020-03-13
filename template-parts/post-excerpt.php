<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="inside">

		<?php
		$placeholder = get_bloginfo("template_url") . "/images/px2.png";
		$featImg = get_field("thumbnail_image", get_the_ID());
		$content = get_the_content();
		$excerpt = ($content) ? shortenText( strip_tags($content), 250,' ','...' ) : '';
		?>
		<div class="post-image">
			<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" class="placeholder">
			<?php if ($featImg) { ?>
			<span class="feat-image" style="background-image:url('<?php echo $featImg['url'] ?>');"></span>	
			<?php } ?>
		</div>
		
		<div class="post-text">
			<header class="entry-header">
				<?php
					if ( is_single() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} else {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}

				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php acstarter_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>
			</header><!-- .entry-header -->

			<div class="excerpt">
				<?php echo $excerpt ?>
				<div class="btndiv"><a href="<?php echo get_permalink(); ?>" class="more">Read More</a></div>
			</div>
		</div>

		<!-- <footer class="entry-footer">
			<?php //acstarter_entry_footer(); ?>
		</footer> -->
	</div>
</article><!-- #post-## -->
