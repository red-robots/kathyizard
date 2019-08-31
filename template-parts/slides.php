<?php if ( is_front_page() || is_home() ) { ?>
<?php  
$slides = get_field('slides');
?>
<div class="slides-wrapper">
	<div class="wrapper">
		<?php if ($slides) { ?>
		<div id="hero" class="owl-carousel">
			<?php foreach ($slides as $sd) { 
				$id = $sd['ID'];
				$link = get_field('attachment_link',$id);
				$before_link = '';
				$after_link = '';
				if($link) {
					$before_link = '<a href="'.$link.'" target="_blank">';
					$after_link = '</a>';
				} ?>
				<div class="item">
	              <?php echo $before_link; ?><img src="<?php echo $sd['url'] ?>" alt="<?php echo $sd['title'] ?>" /><?php echo $after_link; ?>
	            </div>
			<?php } ?>
		</div>
		<div class="numwrap"><div class="slidenum"></div></div>
		<?php } ?>
	</div>
</div>
<?php } ?>