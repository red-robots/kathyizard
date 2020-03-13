<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

$placeholder = get_bloginfo("template_url") . "/images/px2.png";
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( $featImage = get_field("fullwidth_image") ) { ?>
	<div class="wrapper featuredImgWrap">
		<div class="featured-image">
			<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" class="placeholder"/>
			<div class="image" style="background-image:url('<?php echo $featImage['url'] ?>');">
				<img src="<?php echo $featImage['url'] ?>" alt="<?php echo $featImage['title'] ?>" style="display:none;" />
			</div>
		</div>	
	</div>
	<?php } ?>

	<div class="post-wrapper mug-container">
		<div class="wrapper">
			<?php  
			$terms = get_the_terms( get_the_ID(), 'category');
			$categories = '';
			if($terms) {
				foreach($terms as $k=>$t) {
					$comma = ($k>0) ? ', ':'';
					$catlink = get_term_link($t);
					$categories .= $comma.'<a href="'.$catlink.'" class="catlink">'.$t->name.'</a>';
				}
			}
			?>
			<?php if ($categories) { ?>
			<div class="categories"><?php echo $categories ?></div>		
			<?php } ?>

			<div class="textwrap">
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
			</div>

			<?php  
			$archives = array(
			    'post_type'    => 'post',
			    'type'         => 'monthly',
			    'echo'         => 1
			);
			?>

			<aside class="sidebar">
				<h3 class="widgettitle">Blog Archives</h3>
				<ul class="archives"><?php wp_get_archives($archives); ?></ul>
			</aside>
		</div>
	</div>

</article><!-- #post-## -->
