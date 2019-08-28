	</div><!-- #content -->
	
	<?php 
		$social_links = get_social_media(); 
	?>
	<footer id="colophon" class="site-footer clear" role="contentinfo">
		<div class="wrapper">
			<div class="flexrow">
				<div class="col left">
					<a href="<?php echo get_site_url(); ?>" class="favicon"><img src="<?php echo get_bloginfo('template_url'); ?>/images/favicon.png" alt="Logo"></a>
				</div>
				<div class="col right">
					<?php if ($social_links) { ?>
					<div class="social-media">
						<?php foreach ($social_links as $s) { ?>
							<a href="<?php echo $s['url']; ?>"><i class="<?php echo $s['icon']; ?>"></i><span class="sr"><?php echo $s['field']; ?></span></a>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php  
if( is_page('about-me') || is_page('contact') ) {
	get_template_part('inc/instagram_script');
}
?>

</body>
</html>
