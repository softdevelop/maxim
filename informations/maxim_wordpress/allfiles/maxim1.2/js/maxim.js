jQuery(document).ready(function($) {

	$('#secondary-menu-container').sticky();

	$('.loader').fadeOut('slow');

	$('.mobile-menu').on('click', function() {
		$(this).next().fadeToggle();
	});
	
	$('.fancybox').fancybox();
	
	$('.gallery figure').hover(
		function() {
			$(this).find('figcaption').fadeIn();
		},
		function() {
			$(this).find('figcaption').fadeOut();
		}
	);
	
	function homeImgHover() {
			$('#homepage > div > div:not(.twitter)').hover(
				function() {
					var $this = $(this);
					$this.children('img').stop().removeClass('grayscale').animate({'opacity': 1}, 300);
					$this.children('div.hover-bg').stop().animate({'left': 0, 'opacity': 1}, 300);
				},
				function () {
					var $this = $(this);
					$this.children('img').stop().addClass('grayscale').animate({'opacity': 0.5}, 300)
							.siblings('.hover-bg').stop().animate({'left': 200, 'opacity' : 0}, 300);
				}
			);
		};
		
	homeImgHover();
	
	(function($) {

		$('.gallery-item a').hover(
			function() {
				$(this).siblings('a').children('img').stop().addClass('grayscale').animate({'opacity': 0.5}, 1000);
				$(this).children('img').stop().animate({'opacity': 1});
			},
			function () {
				$(this).siblings('a').children('img').stop().removeClass('grayscale').animate({'opacity': 1}, 1000);
			}
		);

	})(jQuery)
	
	function workImgHover() {
			$('#work ul li').hover(
				function() {
					var $this = $(this).find('div div');
					$this.children('img').stop().removeClass('grayscale').animate({'opacity': 1}, 300);
					$this.children('div.hover-bg').css({'opacity': 0}).stop().animate({'left': 0, 'opacity': 1}, 300);
				},
				function () {
					var $this = $(this).find('div div');
					$this.children('img').stop().addClass('grayscale').animate({'opacity': 0.5}, 300)
							.siblings('.hover-bg').stop().animate({'left': -100, 'opacity' : 0}, 300);
				}
			);
		};
		
	workImgHover();
	
	function blogImgHover() {
			$('#blog ul li article').hover(
				function() {
					var $this = $(this);
					$this.find('img').stop().removeClass('grayscale').animate({'opacity': 1}, 300);
				},
				function () {
					var $this = $(this);
					$this.find('img').stop().addClass('grayscale').animate({'opacity': 0.5}, 300);
				}
			);
		};
		
	blogImgHover();
	
	function teamImgHover() {
			$('#team ul li').hover(
				function() {
					var $this = $(this);
					$this.find('img').stop().removeClass('grayscale').animate({'opacity': 1}, 300);
				},
				function () {
					var $this = $(this);
					$this.find('img').stop().addClass('grayscale').animate({'opacity': 0.5}, 300);
				}
			);
		};
		
	teamImgHover();
	
	/* nicescroll */
	$('.page-nice-scroll, .twitter').niceScroll();

	/* blog pattern */
	$("#blog.special-blog ul li").each(function (i) {
		$(this).addClass("item-list-" + (i%3));
	});
	
	$('#homepage div div img').each(function() {
		var $this = $(this);

		if ($this.width() < $this.parent().width()) {
			$this.css({'width':'100%', 'height': 'auto'});
		} else if ($this.height() < $this.parent().height()) {
			$this.css({'width':'auto', 'height': '100%'});
		}
	});
	
	/* work .load */
	/*function doItAgain() {
		$('#work + #navigation ul li a').on('click', function() {
			var link = $(this).attr('href');
			$( "#work" ).load( link + " #work", function() {
				workImgHover();
			});
			$( "#navigation" ).load( link + " #navigation", function() {
				doItAgain();
			});
			return false;
		});
	};
	doItAgain();*/
	
	/*function clientsLoad() {
		$('.clients-list > ul > li a').on('click', function() {
			var link = $(this).attr('href');
			$( ".clients" ).load( link + " .clients");
			return false;
		});
	};
	clientsLoad();*/
	
	$('.main-menu ul li ul.sub-menu').hide();
	
	function menuDrop() {
		$('.main-menu > ul > li').hover(
			function() {
				$(this).children('ul.sub-menu').stop().fadeIn();
			},
			function() {
				$(this).children('ul.sub-menu').stop().fadeOut();
			}
		);
	};
	menuDrop();
	
	$('.clients-list > ul > li:first-child a').addClass('active');
	$('.clients-list > ul > li a').on('click', function() {
		var $this = $(this),
			index = $this.parent().index() + 1;
		$('.clients-list > ul > li a').removeClass('active');
		$this.addClass('active');
		$('ul.clients li').css({'display':'none'});
		$('ul.clients li:nth-child('+index+')').fadeIn();

		return false;
	});
	
	
	
	
	(function($) {
		$('#superslides .slides-container img:first').addClass('active')
		function slide_sw() {
			var $active = $('#superslides .slides-container img.active');
			if ( $active.length == 0 ) $active = $('#superslides .slides-container img:last');

			var $next =  $active.next().length ? $active.next() : $('#superslides .slides-container img:first');

			$active.addClass('last-active');
			$next.css({opacity: 0.0})
				.addClass('active')
				.animate({opacity: 1.0}, 1000, function() {
					$active.removeClass('active last-active');
				});
		}

		$(function() {
			setInterval( slide_sw, 5000 );
		});

	})(jQuery);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

});