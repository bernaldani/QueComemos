// jQuery easing 1.3
jQuery.easing.jswing=jQuery.easing.swing;
jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,a,c,b,d){return jQuery.easing[jQuery.easing.def](e,a,c,b,d)},easeInQuad:function(e,a,c,b,d){return b*(a/=d)*a+c},easeOutQuad:function(e,a,c,b,d){return-b*(a/=d)*(a-2)+c},easeInOutQuad:function(e,a,c,b,d){return 1>(a/=d/2)?b/2*a*a+c:-b/2*(--a*(a-2)-1)+c},easeInCubic:function(e,a,c,b,d){return b*(a/=d)*a*a+c},easeOutCubic:function(e,a,c,b,d){return b*((a=a/d-1)*a*a+1)+c},easeInOutCubic:function(e,a,c,b,d){return 1>(a/=d/2)?b/2*a*a*a+c:
b/2*((a-=2)*a*a+2)+c},easeInQuart:function(e,a,c,b,d){return b*(a/=d)*a*a*a+c},easeOutQuart:function(e,a,c,b,d){return-b*((a=a/d-1)*a*a*a-1)+c},easeInOutQuart:function(e,a,c,b,d){return 1>(a/=d/2)?b/2*a*a*a*a+c:-b/2*((a-=2)*a*a*a-2)+c},easeInQuint:function(e,a,c,b,d){return b*(a/=d)*a*a*a*a+c},easeOutQuint:function(e,a,c,b,d){return b*((a=a/d-1)*a*a*a*a+1)+c},easeInOutQuint:function(e,a,c,b,d){return 1>(a/=d/2)?b/2*a*a*a*a*a+c:b/2*((a-=2)*a*a*a*a+2)+c},easeInSine:function(e,a,c,b,d){return-b*Math.cos(a/
d*(Math.PI/2))+b+c},easeOutSine:function(e,a,c,b,d){return b*Math.sin(a/d*(Math.PI/2))+c},easeInOutSine:function(e,a,c,b,d){return-b/2*(Math.cos(Math.PI*a/d)-1)+c},easeInExpo:function(e,a,c,b,d){return 0==a?c:b*Math.pow(2,10*(a/d-1))+c},easeOutExpo:function(e,a,c,b,d){return a==d?c+b:b*(-Math.pow(2,-10*a/d)+1)+c},easeInOutExpo:function(e,a,c,b,d){return 0==a?c:a==d?c+b:1>(a/=d/2)?b/2*Math.pow(2,10*(a-1))+c:b/2*(-Math.pow(2,-10*--a)+2)+c},easeInCirc:function(e,a,c,b,d){return-b*(Math.sqrt(1-(a/=d)*
a)-1)+c},easeOutCirc:function(e,a,c,b,d){return b*Math.sqrt(1-(a=a/d-1)*a)+c},easeInOutCirc:function(e,a,c,b,d){return 1>(a/=d/2)?-b/2*(Math.sqrt(1-a*a)-1)+c:b/2*(Math.sqrt(1-(a-=2)*a)+1)+c},easeInElastic:function(e,a,c,b,d){var e=1.70158,f=0,g=b;if(0==a)return c;if(1==(a/=d))return c+b;f||(f=0.3*d);g<Math.abs(b)?(g=b,e=f/4):e=f/(2*Math.PI)*Math.asin(b/g);return-(g*Math.pow(2,10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f))+c},easeOutElastic:function(e,a,c,b,d){var e=1.70158,f=0,g=b;if(0==a)return c;if(1==
(a/=d))return c+b;f||(f=0.3*d);g<Math.abs(b)?(g=b,e=f/4):e=f/(2*Math.PI)*Math.asin(b/g);return g*Math.pow(2,-10*a)*Math.sin((a*d-e)*2*Math.PI/f)+b+c},easeInOutElastic:function(e,a,c,b,d){var e=1.70158,f=0,g=b;if(0==a)return c;if(2==(a/=d/2))return c+b;f||(f=d*0.3*1.5);g<Math.abs(b)?(g=b,e=f/4):e=f/(2*Math.PI)*Math.asin(b/g);return 1>a?-0.5*g*Math.pow(2,10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f)+c:0.5*g*Math.pow(2,-10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f)+b+c},easeInBack:function(e,a,c,b,d,f){void 0==
f&&(f=1.70158);return b*(a/=d)*a*((f+1)*a-f)+c},easeOutBack:function(e,a,c,b,d,f){void 0==f&&(f=1.70158);return b*((a=a/d-1)*a*((f+1)*a+f)+1)+c},easeInOutBack:function(e,a,c,b,d,f){void 0==f&&(f=1.70158);return 1>(a/=d/2)?b/2*a*a*(((f*=1.525)+1)*a-f)+c:b/2*((a-=2)*a*(((f*=1.525)+1)*a+f)+2)+c},easeInBounce:function(e,a,c,b,d){return b-jQuery.easing.easeOutBounce(e,d-a,0,b,d)+c},easeOutBounce:function(e,a,c,b,d){return(a/=d)<1/2.75?b*7.5625*a*a+c:a<2/2.75?b*(7.5625*(a-=1.5/2.75)*a+0.75)+c:a<2.5/2.75?
b*(7.5625*(a-=2.25/2.75)*a+0.9375)+c:b*(7.5625*(a-=2.625/2.75)*a+0.984375)+c},easeInOutBounce:function(e,a,c,b,d){return a<d/2?0.5*jQuery.easing.easeInBounce(e,2*a,0,b,d)+c:0.5*jQuery.easing.easeOutBounce(e,2*a-d,0,b,d)+0.5*b+c}});

$(window).load(function() {
	animateDarkBg();
	refreshMenu($(".dynamic-content"));
	initDatePicker();
	animateBlog('in');
	animateMenu();
	scrollContent();
	slider('on');
	initCarousel();
	initGallery();
	loadScript();
});

$(window).resize($.debounce(250, function() {
	updateScrollbar();
}));

function initDatePicker(){
	$('#frame').on('click', '.select-time.part', function(){
		if($(this).html() == 'pm') {
			$(this).html('am');
			$('#ampm').val('am');
		} else {
			$(this).html('pm');
			$('#ampm').val('pm');
		}
	});

	$('#frame').on('change', '#select-hour', function() {
		$('.select-time.hour span').html($(this).val());
		$('#hour').val($(this).val());
	});

	$('#frame').on('change', '#select-minutes', function() {
		$('.select-time.minutes span').html($(this).val());
		$('#minute').val($(this).val());
	});

	$('#frame').on('change', '#select-year', function() {
		$('.select-time.year span').html($(this).val());
		$('#year').val($(this).val());
	});

	$('#frame').on('change', '#select-day', function() {
		$('.select-time.day span').html($(this).val());
		$('#day').val($(this).val());
	});

	$('#frame').on('change', '#select-month', function() {
		$('.select-time.month span').html($(this).val());
		$('#month').val($(this).val());
	});
}

function shuffleArray(array) {
	var len = array.length;
	for (var i = len - 1; i > 0; i--) {
		var j = Math.floor(Math.random() * (i + 1));
		var temp = array[i];
		array[i] = array[j];
		array[j] = temp;
	}

	return array;
}

function animateBlog(direction) {

	direction = direction == "in" ? direction : "out";

	var sizes = new Array();
	var columns = new Array();
	var items = $('.square').length;

	$('.square').each(function(i, e) {
		columns[i] = $(this);
		sizes[i] = columns[i].length;
	});
	columns = shuffleArray(columns);
	var max = Math.max.apply(null, sizes);

	for (var item = 0; item < max; item++) {

		$(columns).each(function(column) {

			if (columns[column][item] !== undefined) {

				if (direction == "in") {

					var $item = $(columns[column][item]),
					timeout = item * columns.length + column;

					setTimeout(function() {
						$item.addClass('is-loaded');
					}, 200 * timeout);
				} else {

					var $item = $(columns[column][item]),
							timeout = items - (item * columns.length + column);

					setTimeout(function() {
						$item.removeClass('is-loaded');
					}, 200 * timeout);
				}
			}
		});
	}
}

function updateScrollbar() {
//	var newHeight = $(window).height();
//	$('#frame').height(newHeight);
//	$('.scroll-container').height(newHeight);		
	
	
	$('#frame').sly('reload'); 
}

function scrollContent() {
	if ($('html').hasClass('no-touch')) {
//		var newHeight = $(window).height();
//		$('#frame').height(newHeight);
//		$('.scroll-container').height(newHeight);			
		$('#frame').sly({
			speed: 300,
			easing: 'easeOutExpo',
//			activatePageOn: 'click',
			scrollBar: $('.scrollbar'),
			scrollBy: 20,
			dragHandle: 1,
			dynamicHandle: 1,
			clickBar: 1,
//			touchDragging: 1,

		});	
	}
}

function animateMenu() {
	if ($('.menu').length > 0) {
		setTimeout(function() {
			$('.animate-in').removeClass('animate-in-fade');
		}, 600);
	}
}

function animateDarkBg(){
	
	if ($('.menu').length > 0) {
			$('body').addClass('dark-bg');
			$('#menu-bg').transition({opacity: 0},0, function(){
			$('#menu-bg').show().transition({opacity: 1});
			
		})
	} 
}

function hideDarkBg(){
	$('body').removeClass('dark-bg');
	$('#menu-bg').transition({opacity: 0}, function(){
	$('#menu-bg').hide();		
	})
}

jQuery('document').ready(function($) {

	var transition = function($newEl) {
		var $oldEl = this;
		$('#frame').sly('slideTo', 0); 
		$newEl.hide();
		
		$oldEl.transition({opacity: 0}, 500, function() {
			$oldEl.replaceWith($newEl);
			animateDarkBg();

			$newEl.show().css({opacity: 0}, 500);
			$oldEl.transition({opacity: 1}, 500, function() {
			});
			$newEl.transition({opacity: 1}, 500, function() {
			});
			$('html').removeClass('loading');
			animateBlog('in');
			animateMenu();
			slider('on');
			initMap();
			initCarousel();
			refreshMenu($newEl);
			updateScrollbar();
			initGallery();
		});
	}


	$(window).bind('djaxClick', function(e, data) {
		$('html').addClass('loading');
		slider('off');
		hideDarkBg();
	});

	$('body').djax('.dynamic-content', ['#', '.jpg'], transition);
	$(window).bind('djaxLoad', function(e, params) {
		slider('off');
		hideDarkBg();
	});

	$('.logo').click(function() {
		if (!$('body').hasClass('splash')) {
			$('.navbar').transition({y: '-100%'}, function() {
				$(this).css({'bottom': 0, 'top': 'auto'}).transition({y: '100%'}, 0, function() {
				}).transition({y: 0}, function() {
					$('body').addClass('splash');
				});
			});
		}
	})
	
	$('.content-link, .subnav a').click(function() {
		if ($('body').hasClass('splash')) {
			$(".hover-active").removeClass("hover-active");
			$('.navbar').transition({y: '100%'}, function() {
				$(this).css({'bottom': 'auto', 'top': 0}).transition({y: '-100%'}, 0, function() {
				}).transition({y: 0}, function() {
					$('body').removeClass('splash');
				});
			});
		}
	})

	if ($('#maximage').length > 0) {
		$('body').addClass('splash');
	}

	$('.reorder a').click(function(e) {
		e.preventDefault();
		if ($('body').hasClass('mobile-nav-show')) {
			$('body').removeClass('mobile-nav-show');
		} else {
			$('body').addClass('mobile-nav-show');
		}
	});
	$('.flyout-menu a').click(function(e) {
		e.preventDefault();
		if($(this).next('.subnav').length > 0) {
			if($(this).next('.subnav').hasClass('open')) {
				$(this).next('.subnav').height(0).removeClass('open');
			} else {
				$(this).next('.subnav').height($(this).next('.subnav').children('li').height() * $(this).next('.subnav').children('li').length).addClass('open');
			}
		} else {
			$('body').removeClass('mobile-nav-show');
		}
		
	});


	$('.main-nav li a').click(function(){
		$('.main-nav .active').removeClass('active');
		$(this).addClass('active');
	});
});


//googleMap
function initMap() {
	if ($('#map').length > 0) {
		initialize();

	}
}

function initialize() {
	var markerPosition = new google.maps.LatLng(-33.890367, 151.19168);

	var mapOptions = {
		zoom: 12,
		center: markerPosition,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false,
		styles: [{stylers: [{saturation: -100}]}]
	};

	var map = new google.maps.Map(document.getElementById('map'), mapOptions);

	var marker = new google.maps.Marker({
		position: markerPosition,
		title: 'Location',
		map: map,
		icon: { url: 'img/icon1.png', origin: new google.maps.Point(0, 0) },
		draggable: false
	});
}

function loadScript() {
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = 'https://maps.googleapis.com/maps/api/js?v=1&sensor=false&callback=initMap';
	document.body.appendChild(script);
}

function slider(mode) {
	if (mode === 'on' && ($('#maximage').length > 0)) {
		jQuery('#maximage').maximage({
			cycleOptions: {
				slideActiveClass: 'activeSlide',
				skipInitializationCallbacks: true,
				after: function(currSlideElement, nextSlideElement) {
					$(currSlideElement).removeClass('current-slide');
				},
				before: function(currSlideElement, nextSlideElement, options, forwardFlag) {
					$(nextSlideElement).addClass('current-slide');
					$($(currSlideElement).data('href')).removeClass('current-slide-content');
					$($(nextSlideElement).data('href')).addClass('current-slide-content');
				},
			},
			onFirstImageLoaded: function() {
				jQuery('#cycle-loader').hide();
				updateScrollbar();

				$('#maximage').transition({opacity: 1}, function() {
				});
			}

		});
	} else if (mode === 'off' && ($('#maximage').length > 0)) {
		jQuery('#maximage').cycle('destroy');
	}
}

function refreshMenu(element) {
	var wrapperClass = element.attr('class').split(" ");
	$(".main-nav a").removeClass("active");
	$(".main-nav ."+wrapperClass[1]).addClass("active");
}

function initGallery() {
	jQuery('a.gallery').colorbox({
		transition: 'fade',
		maxWidth: '80%',
		maxHeight: '80%',
		closeButton:true,
		close: '',
		next: '<i class="fa fa-angle-right"></i>',
		previous: '<i class="fa fa-angle-left"></i>'});
}

function initCarousel() {
	$("#slider-res").owlCarousel({
 		pagination: false,
		slideSpeed : 2000,
		paginationSpeed : 2000,
		singleItem:true,
		transitionStyle: 'fade',
		autoPlay: 4000
  });

	$("#carousel-menu").owlCarousel({
		singleItem:true,
		autoPlay: 4000,
		afterInit : function(){
			var that = this
			that.owlControls.prependTo($(".controls"));
		},
	});
};

$(document).ready(function() {
	$('.main-nav li').hover(function() {
		clearTimeout($(this).data('timeout'));
		$(this).addClass('hover-active');
	}, function() {
		var that = this;
		var t = setTimeout(function() {
		$(that).removeClass("hover-active");
		}, 400);
		$(that).data('timeout', t);		
	});

	var checkEmail = function(email) {
		var emailRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return emailRegex.test(email);
	};

	$(document).on("focus", "#reservation-form input, #reservation-form textarea", function(e) {
		$(this).parent().removeClass('error');
	});

	$(document).on("focus", "#contact-form input, #contact-form textarea", function(e) {
		$(this).parent().removeClass('error');
	});

	$(document).on("submit", "#reservation-form", function(e) {
		e.preventDefault();

		var name = $('#form-name'),
			email = $('#form-email'),
			phone = $('#form-phone'),
			amount = $('#form-amount'),
			message = $('#form-message'),
			day = $('#day'),
			month = $('#month'),
			year = $('#year'),
			hour = $('#hour'),
			minute = $('#minute'),
			ampm = $('#ampm');
		$.ajax({
			url: 'reservation-send.php',
			type: 'POST',
			dataType: 'json',
			data: {
				name: name.val(),
				email: email.val(),
				phone: phone.val(),
				amount: amount.val(),
				message: message.val(),
				day: day.val(),
				month: month.val(),
				year: year.val(),
				hour: hour.val(),
				minute: minute.val(),
				ampm: ampm.val()
			},
			beforeSend: function() {
				var errors = false,
				validate = function() {
					errors = false;

					if(name.val().length === 0) {
						name.parent().addClass('error');
						errors = true;
					} else {
						name.parent().removeClass('error');
					}

					if(email.val().length === 0) {
						email.parent().addClass('error');
						errors = true;
					} else if(!checkEmail(email.val())) {
						email.parent().addClass('error');
						errors = true;
					} else {
						email.parent().removeClass('error');
					}

					if(phone.val().length === 0) {
						phone.parent().addClass('error');
						errors = true;
					} else {
						phone.parent().removeClass('error');
					}

					if(amount.val().length === 0) {
						amount.parent().addClass('error');
						errors = true;
					} else {
						amount.parent().removeClass('error');
					}

					if(message.val().length === 0) {
						message.parent().addClass('error');
						errors = true;
					} else {
						message.parent().removeClass('error');
					}
				};

				validate();

				if(errors) {
					return false;
				}
			}
		}).done(function(data) {
			if(data.success === true) {
				$('.alert-success').removeClass('hidden');
				name.val('');
				email.val('');
				phone.val('');
				amount.val('');
				message.val('');
			} else {
				// handle server validation here
			}
		}).fail(function() {
			// handle server fail here
		});
	});

	$(document).on("submit", "#contact-form", function(e) {
			e.preventDefault();

			var name = $('#form-name'),
				email = $('#form-email'),
				subject = $('#form-subject'),
				message = $('#form-message');

			$.ajax({
				url: 'contact-send.php',
				type: 'POST',
				dataType: 'json',
				data: {
					name: name.val(),
					email: email.val(),
					subject: subject.val(),
					message: message.val()
				},
				beforeSend: function() {
					var errors = false,
					validate = function() {
						errors = false;

						if(name.val().length === 0) {
							name.parent().addClass('error');
							errors = true;
						} else {
							name.parent().removeClass('error');
						}

						if(email.val().length === 0) {
							email.parent().addClass('error');
							errors = true;
						} else if(!checkEmail(email.val())) {
							email.parent().addClass('error');
							errors = true;
						} else {
							email.parent().removeClass('error');
						}

						if(subject.val().length === 0) {
							subject.parent().addClass('error');
							errors = true;
						} else {
							subject.parent().removeClass('error');
						}

						if(message.val().length === 0) {
							message.parent().addClass('error');
							errors = true;
						} else {
							message.parent().removeClass('error');
						}
					};

					validate();

					if(errors) {
						return false;
					}
				}
			}).done(function(data) {
				if(data.success === true) {
					$('.alert-success').removeClass('hidden');
					name.val('');
					email.val('');
					subject.val('');
					message.val('');
				} else {
					// handle server validation here
				}
			}).fail(function() {
				// handle server fail here
			});
		});
});