<?php if (!defined('FLUX_ROOT')) exit; ?>
<html>
<head>
		<script type="text/javascript">
		function slideSwitch() {
		var $active = $('#slideshow IMG.active');

		if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

		// use this to pull the images in the order they appear in the markup
		var $next =  $active.next().length ? $active.next()
			: $('#slideshow IMG:first');
		// uncomment the 3 lines below to pull the images in random order
		
		// var $sibs  = $active.siblings();
		// var rndNum = Math.floor(Math.random() * $sibs.length );
		// var $next  = $( $sibs[ rndNum ] );

		$active.addClass('last-active');

		$next.css({opacity: 0.0})
			.addClass('active')
			.animate({opacity: 1.0}, 1000, function() {
				$active.removeClass('active last-active');
			});
			}
		$(function() {
			setInterval( "slideSwitch()", 4000 );
		});
		</script>
		<style type="text/css">
		#slideshow {position:relative;}
		#slideshow IMG {position:absolute;top:0;left:0;z-index:8;opacity:0.0;}
		#slideshow IMG.active {z-index:10;opacity:1.0;}
		#slideshow IMG.last-active {z-index:9;}
		</style>
</head>
<body>
    <img src="<?php echo $this->themePath('img/slider.png') ?>" alt="image 1" class="active" title="Friendly Comunity" />
    <img src="<?php echo $this->themePath('img/image1.jpg') ?>"  alt="image 2" title="Affordable Donate Item" />
	<img src="<?php echo $this->themePath('img/image2.jpg') ?>"  alt="image 3" title="Friendly GM" />
	<img src="<?php echo $this->themePath('img/image3.jpg') ?>"  alt="image 4" title="Enjoy Playing" />
</body>
</html>