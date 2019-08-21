/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {

	$(document).on('scroll', function(){
		$('.site-header').addClass('fixed');
		if($(window).scrollTop() == 0){
			$('.site-header').removeClass('fixed');
		}
	});


	$('#hero').owlCarousel({
		center: true,
	    items:1,
	    nav:true,
	    autoplay:true,
	    navText:['',''],
	    loop:true,
	    responsive:{
	        768:{
	            items:1.7
	        }
	    },
	    onTranslate:callback,
	    onInitialized:callback
      });

	function callback(event){
		var items = event.item.count;     // Number of items
    	var item  = (event.item.index + 1) - event.relatedTarget._clones.length / 2;  
    	$('.slidenum').html(''+item+'/'+items+'');
	}
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: "slide",
	}); // end register flexslider
	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
	

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();


	$(document).on("click","#toggleMenu",function(e){
		e.preventDefault();
		$(this).toggleClass('open');
		$('.site-header').toggleClass('open');
	});

});// END #####################################    END