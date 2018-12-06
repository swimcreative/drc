/**
 * File main.js.
 *
 * Handles custom events for the theme.

 */
(function() {

	// Smooth Scroll Func

	function scrollTo(destination, duration = 200, easing = 'linear', callback) {

    const easings = {
      linear(t) {
        return t;
      },
      easeInQuad(t) {
        return t * t;
      },
      easeOutQuad(t) {
        return t * (2 - t);
      },
      easeInOutQuad(t) {
        return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
      },
      easeInCubic(t) {
        return t * t * t;
      },
      easeOutCubic(t) {
        return (--t) * t * t + 1;
      },
      easeInOutCubic(t) {
        return t < 0.5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1;
      },
      easeInQuart(t) {
        return t * t * t * t;
      },
      easeOutQuart(t) {
        return 1 - (--t) * t * t * t;
      },
      easeInOutQuart(t) {
        return t < 0.5 ? 8 * t * t * t * t : 1 - 8 * (--t) * t * t * t;
      },
      easeInQuint(t) {
        return t * t * t * t * t;
      },
      easeOutQuint(t) {
        return 1 + (--t) * t * t * t * t;
      },
      easeInOutQuint(t) {
        return t < 0.5 ? 16 * t * t * t * t * t : 1 + 16 * (--t) * t * t * t * t;
      }
    };


    const start = window.pageYOffset;
    const startTime = 'now' in window.performance ? performance.now() : new Date().getTime();

    const documentHeight = Math.max(document.body.scrollHeight, document.body.offsetHeight, document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight);
    const windowHeight = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
    const destinationOffset = typeof destination === 'number' ? destination : destination.offsetTop;

    var header = document.getElementById('masthead');
    var about = document.getElementById('info').offsetTop;

    //console.log(destination);

    if (window.innerWidth < 992) {
    	height = header.clientHeight;
    	} else {
    	height = 0;
		}

    const destinationOffsetToScroll = Math.round(documentHeight - destinationOffset < windowHeight ? documentHeight - windowHeight : destinationOffset - height);

    if ('requestAnimationFrame' in window === false) {
      window.scroll(0, destinationOffsetToScroll);
      if (callback) {
        callback();
      }
      return;
    }

    function scroll() {
      const now = 'now' in window.performance ? performance.now() : new Date().getTime();
      const time = Math.min(1, ((now - startTime) / duration));
      const timeFunction = easings[easing](time);
      window.scroll(0, Math.ceil((timeFunction * (destinationOffsetToScroll - start)) + start));

      if (window.pageYOffset === destinationOffsetToScroll) {
        if (callback) {
          callback();
        }
        return;
      }

      requestAnimationFrame(scroll);
    }

    scroll();
  }


	//Target anchors for smooth scroll

  var elements = document.querySelectorAll("a[href^='#']");

  for (var i = 0; i < elements.length; i++) {

    if (elements[i].getAttribute('href').length > 1) {

      elements[i].addEventListener("click", function(e) {


        e.preventDefault();

        var header = document.getElementById('masthead'),
          height = header.clientHeight,
          href = e.target.getAttribute('href'),
          href = href.substr(1),
          id = document.getElementById(href),
          scroll = id.offsetTop,
          scrollFinal = scroll - height;

        scrollTo(
          id,
          600,
          'easeOutQuint',
        );

      });
    }
  }


	function headerMargin() {
		var hero = document.getElementById('hero'),
	   	header = document.getElementById('masthead'),
		  height = header.clientHeight;


						if(window.innerWidth < 992) {
								hero.style.margin = height+'px 0 0 0';
						} else {
							 hero.style.margin = 'initial';
						}

	}


	// Fix header on scroll

  function headerFix() {

		var hero = document.getElementById('hero');

		if(hero) {


    var header = document.getElementById('masthead'),
      	body = document.querySelector('body'),
				info = document.getElementById('info'),
				button = document.querySelector('.scroll-down'),
				height = hero.clientHeight + header.clientHeight,
				headHeight = header.clientHeight,
				headHeight = headHeight + 150;


    if (window.pageYOffset >= headHeight) {
			header.classList.add('offset');
    } else {
			header.classList.remove('notrans');
			if(!header.classList.contains('bg')) {
      	header.classList.remove('offset');
			}
    }

		if (window.pageYOffset >= height) {
			header.classList.add('bg');
			header.classList.add('reached');
    	} else {
    }

		if (window.pageYOffset <= 0) {
			header.classList.remove('bg');
			header.classList.remove('offset');
			header.classList.remove('notrans');
		} else {

			}
		}
  }



		if(window.location.hash) {

			var header = document.getElementById('masthead');

				header.style.position = 'absolute';


			}



	/* =============================================================================
  aosa Search
  ========================================================================== */


  function searchBox() {
		var button = document.querySelector('.header-search'),
				box = document.getElementById('search-box'),
				form = document.querySelector('#search-box form');

    button.addEventListener("click", function(e) {
      e.preventDefault();
      box.classList.add('show-search');
      box.querySelector('input').focus();
    });

    box.addEventListener("click", function() {
      box.classList.remove('show-search');
    });

  	form.addEventListener("click", function(e) {
      e.stopPropagation();
    });
  }


function carousel() {
	var carousel = document.querySelector('.carousel');
	if(carousel) {
	if(carousel.children.length > 1) {
	var flkty = new Flickity('.carousel', {
		cellAlign: 'center',
		contain: true,
		groupCells: '100%',
		wrapAround:false,
		imagesLoaded: true
	});
	}
}

	var hero = document.getElementById('hero');
	if(hero) {
	if(hero.children.length > 1) {
	var flkty = new Flickity('.hero-carousel', {
		cellAlign: 'left',
		contain: true,
		wrapAround:true,
		imagesLoaded:true,
		autoPlay:7000
		});
		}
	}
}


function parallax() {
	// vertical parallax
	var hero =  document.getElementById('hero');
	if(hero) {
	var header = document.getElementById('masthead').clientHeight;
	var banner = hero.clientHeight;
	var cta_offset = document.getElementById('cta').pageYOffset;
	var bgs = document.querySelectorAll('#hero .slide > img');
	var lower_bg = document.querySelector('#cta > img');
	var total = header + banner;
	var scrolled = window.pageYOffset;
		for (var i = 0; i < bgs.length; i++) {
			if (window.innerWidth >= 940) {
				if(scrolled < banner + header) {
					bgs[i].style.transform = 'translateY(' + (scrolled * .35) + 'px)';
				} else {
						bgs[i].style.transform = 'translateY(0)';
					}
				} else {
					bgs[i].style.transform = 'translateY(0)';
				}
	  }
	}
}

function quotes() {

	var scrolled = window.pageYOffset,
	    quotes = document.querySelectorAll('.quote');

		for (var i = 0; i < quotes.length; i++) {
			var offset = quotes[i].closest('.step').offsetTop;
			var info = document.getElementById('info');
			var infoHeight = info.clientHeight;
			var height = quotes[i].closest('.step').clientHeight / 1.4;
			var offset = offset + height + infoHeight;
			//console.log(offset);
			if (window.innerWidth >= 768) {
				if(scrolled >= offset) {
					quotes[i].classList.add('show');
					}
				}
	  }
}

  // Init

  headerFix();
  parallax();
	searchBox();
	carousel();
	quotes();
	//headerMargin();
	//hash();

	//scroll
  window.addEventListener('scroll', function() {
    headerFix();
		parallax();
		quotes();
  });

	// resize
	window.addEventListener('resize', function() {
		parallax();
		quotes();
	//	headerMargin();
	});

})();
