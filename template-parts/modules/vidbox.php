<?php


function vidbox($url) { ?>

  <?php


  preg_match('/src="(.+?)"/', $url, $matches);
  $src = $matches[1]; ?>

  <script>

  	var $ = jQuery;

    var id = '<?php echo $src; ?>';


  	$(window).resize(function() {

  	 $(".video-box").fitVids();

   });

  	 $(".video-box").fitVids();

  	$('.video').on('click', function(e) {

  		e.preventDefault();
  		$('.lightbox').slideDown(250);
  		$('.video-box').html('<iframe width="560" height="315" src="'+id+'&autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>').fitVids();
  	});

  	$('.close').on('click', function(e) {
  		e.preventDefault();
  		$('.lightbox').fadeOut(150);
  		$('.video-box').html('');

  	});


  </script>

<?php }
