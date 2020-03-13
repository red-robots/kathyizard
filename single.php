<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */
$post_type = get_post_type();
get_header(); ?>

<?php if($post_type=='post') { ?>

	<div id="primary" class="content-area single-blog">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content','blog-post'); ?>
		<?php endwhile;  ?>
	</div>

<?php } else { ?>
	<div id="primary" class="content-area wrapper">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', get_post_format() );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php } ?>
<?php
get_footer();
