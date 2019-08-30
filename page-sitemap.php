<?php
/**
 * Template Name: Sitemap
 */

get_header(); ?>

	<div id="primary" class="content-area wrapper sitemap">
		<main id="main" class="site-main pagedefault" role="main">

			<?php 
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );
				get_template_part( 'template-parts/content', 'sitemap' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
