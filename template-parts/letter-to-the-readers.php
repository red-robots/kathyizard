<?php
$letter = get_post_by_slug('letter-to-the-readers');
if ($letter) { 
	$letter_postid = $letter->ID;
	$letterImages = get_field('gallery',$letter_postid); 
	$letter_content = $letter->post_content;
	$letter_content = ($letter_content) ? apply_filters('the_content',$letter_content):'';
	?>
	<div id="letterToReaders" class="letterToReaders">
		<div class="lettertop middiv"><div><a href="#" id="closeLetter" class="close"><span>x</span></a></div></div>
		<div class="lettercontent middiv">
			<div class="inside clear">
				<div id="quotetext"></div>
				<div class="lettertext"><?php echo $letter_content ?></div>
				<?php if ($letterImages) { ?>
				<div class="letter-images">
					<?php foreach ($letterImages as $img) { ?>
						<div class="img"><img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>"></div>
					<?php } ?>
				</div>	
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>