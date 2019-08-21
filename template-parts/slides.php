<?php if ( is_front_page() || is_home() ) { ?>
<?php  
$slides = get_field('slides');
?>
<div class="slides-wrapper">
	<div class="wrapper">
		<?php if ($slides) { ?>
		<div id="hero" class="owl-carousel">
			<?php foreach ($slides as $sd) { ?>
				<div class="item">
	              <img src="<?php echo $sd['url'] ?>" alt="<?php echo $sd['title'] ?>" />
	            </div>
			<?php } ?>
		</div>
		<?php } ?>
		<div class="numwrap"><div class="slidenum"></div></div>
	</div>
</div>
<?php } ?>