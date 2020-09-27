(function( $ ) {
	//YouTube videos
	// Find all YouTube videos
	var $allVideos = $("iframe[src^='//www.youtube.com'], iframe[src^='https://www.youtube.com'], iframe[src^='http://www.youtube.com']"),
		// The element that is fluid width
		$fluidEl = $("body .single_post_content, body .video_block2");
	// Figure out and save aspect ratio for each video
	$allVideos.each(function() {
		console.log("allVideos: ", this.width)
		$(this).data('aspectRatio', this.height / this.width).removeAttr('height').removeAttr('width');
	});
	
	// When the window is resized
	$(window).resize(function() {
		var newWidth = $fluidEl.width()-50;
		$allVideos.each(function() {
			var $el = $(this);
			$el.width(newWidth).height(newWidth * $el.data('aspectRatio'));
		});
	}).resize();
	//End of YouTube videos

	function add_view_count(selector, xml){
		$(selector).each(function(index, post){
			$(post).find(".view_count").text(
				$(xml).find("post[post_id="+$(post).attr("post_id")+"]").attr("views_count")
			);
		});
	}
	
	function view_count_operation(selector, mode){
		data = {};
		data['mode'] = mode;
		data['posts'] = {};
		var posts_str = "{";
		$(selector).each(function( index ) {
			data['posts'][index] = $( this ).attr("post_id");
		});
		$.ajax({
			type: "POST", 
			url: "ajax/view_count.php",
			data:  data ,
			dataType: "xml",
			cache: false,
			async: true,
			success: function(xml){
				add_view_count(selector, xml);
			},
			error: function(xhr, ajaxOptions, thrownError){
				console.log("error");
				console.log(xhr.status);
				console.log(thrownError);
				console.log(xhr.responseText);
			}
		})
	}

	function get_view_count(selector){
		var data_str = "set_main_image=1&imageID="+imageID;
		$.ajax({
			type: "POST", 
			url: "ajax/user_files.php",
			data: data_str,
			cache: false,
			async: true,
		})
	}
	
	
	$( document ).ready(function() {
		
		//var posts_selector = ".view_count";
		var posts_selector = ".one_post, .main-post-dot"
		if($(posts_selector).length > 0){
			if($("body.single").length > 0){
				view_count_operation(posts_selector, 'set_view_count');
			}
			else{
				view_count_operation(posts_selector, 'get_view_count');
			}
			
		}

		$(".site-navigation").click (function(){
			$(".site-navigation ul").fadeIn(200);
			$(document).mouseup(function (e){
				var div = $(".site-navigation ul");
				if (!div.is(e.target)
					&& div.has(e.target).length === 0) {
					div.hide();
				}
			});
		});


		camp_path = '/images/';

		/* Image Slider */
		var enable = true;
		var current_slide = 0;
		var next_slide;
		var size = $( '.camp-slide' ).size();
		var intervalID = setInterval(function() { $( '#right' ).click() }, 10000 );
		$( '#right' ).click(function() {
			if ( enable ) {
				enable = false;
				clearInterval( intervalID );
				if ( current_slide < size - 1 ) {
					next_slide = current_slide + 1;
				} else {
					next_slide = 0;
				}
				$( '.camp-slide#slide-' + current_slide ).css( 'z-index', '50' );
				$( '.camp-slide#slide-' + next_slide ).css( 'z-index', '40' );
				$( '.camp-slide' ).not( '#slide-' + current_slide ).hide();
				$( '.camp-slide#slide-' + next_slide ).show();
				$( '.camp-slide#slide-' + current_slide ).css( 'position', 'absolute' );
				$( '.camp-slide#slide-' + next_slide ).css( { 'left': '100%', 'top': '0%' } );
				$( '.camp-slide#slide-' + next_slide ).children( '.camp-slide-line' ).hide();
				$( '.camp-slide#slide-' + next_slide ).find( '.camp-slide-text' ).css( 'opacity', '0' );
				$( '.camp-slide#slide-' + current_slide ).children( 'img' ).animate( { 'opacity': '0' }, 1000 );
				$( '.camp-slide#slide-' + current_slide ).find( '.camp-slide-text' ).animate( { 'opacity': '0' }, 1000 );
				$( '.camp-slide#slide-' + next_slide ).animate( { left: '0' }, 1000 );
				setTimeout(function() {
					if ( current_slide < size - 1 ) {
						current_slide ++;
					} else {
						current_slide = 0;
					}
					$( '.camp-slide#slide-' + current_slide ).children( '.camp-slide-line' ).show();
					$( '.camp-slide#slide-' + current_slide ).find( '.camp-slide-text' ).animate( { 'opacity': '1' }, 500 );
					$( '.camp-slide' ).not( '#slide-' + current_slide ).hide();
					$( '.camp-slide' ).css( 'position', 'relative' );
					$( '.camp-slide' ).children( 'img' ).css( 'opacity', '1' );
					$( '.camp-slide' ).not( '#slide-' + current_slide ).find( '.camp-slide-text' ).css( 'opacity', '1' );

					enable = true;
				}, 1010 );
				intervalID = setInterval(function() { $( '#right' ).click() }, 10000 );
			}
		});
		$( '#left' ).click(function() {
			if ( enable ) {
				enable = false;
				clearInterval( intervalID );
				if ( current_slide > 0 ) {
					next_slide = current_slide - 1;
				} else {
					next_slide = size - 1;
				}
				$( '.camp-slide#slide-' + current_slide ).css( 'z-index', '50' );
				$( '.camp-slide#slide-' + next_slide ).css( 'z-index', '40' );
				$( '.camp-slide' ).not( '#slide-' + current_slide ).hide();
				$( '.camp-slide#slide-' + next_slide ).show();
				$( '.camp-slide#slide-' + current_slide ).css( 'position', 'absolute' );
				$( '.camp-slide#slide-' + next_slide ).css( { 'left': '-100%', 'top': '0%' } );
				$( '.camp-slide#slide-' + next_slide ).children( '.camp-slide-line' ).hide();
				$( '.camp-slide#slide-' + next_slide ).find( '.camp-slide-text' ).css( 'opacity', '0' );
				$( '.camp-slide#slide-' + current_slide ).children( 'img' ).animate( { 'opacity': '0' }, 1000 );
				$( '.camp-slide#slide-' + current_slide ).find( '.camp-slide-text' ).animate( { 'opacity': '0' }, 1000 );
				$( '.camp-slide#slide-' + next_slide ).animate( { left: '0' }, 1000 );
				setTimeout(function() {
					if ( current_slide > 0 ) {
						current_slide --;
					} else {
						current_slide = size - 1;
					}
					$( '.camp-slide#slide-' + current_slide ).children( '.camp-slide-line' ).show();
					$( '.camp-slide#slide-' + current_slide ).find( '.camp-slide-text' ).animate( { 'opacity': '1' }, 500 );
					$( '.camp-slide' ).not( '#slide-' + current_slide ).hide();
					$( '.camp-slide' ).css( 'position', 'relative' );
					$( '.camp-slide' ).children( 'img' ).css( 'opacity', '1' );
					$( '.camp-slide' ).not( '#slide-' + current_slide ).find( '.camp-slide-text' ).css( 'opacity', '1' );

					enable = true;
				}, 1010 );
				intervalID = setInterval(function() { $( '#right' ).click() }, 10000 );
			}
		});

		var btn_enable = true;
		$( '#left' ).on( {
			mouseenter: function() {
				if ( btn_enable ) {
					btn_enable = false;
					$( this ).animate( { opacity: '1' }, 500 );
					setTimeout(function() {
						btn_enable = true;
					}, 500);
				}
			},
			mouseleave: function() { $( this ).animate( { opacity: '0.1' }, 500 ); }
		});
		$( '#right' ).on( {
			mouseenter: function() {
				if ( btn_enable ) {
					btn_enable = false;
					$( this ).animate( { opacity: '1' }, 500 );
					setTimeout(function() {
						btn_enable = true;
					}, 500);
				}
			},
			mouseleave: function() { $( this ).animate( { opacity: '0.1'}, 500 ); }
		});

		/* Form Elements */

		/* Generate new Id for <select> */
		var camp_selectId = 0;
		$( 'select' ).each(function() {
			$( this ).attr( 'id', 'camp-select-' + camp_selectId );
			camp_selectId++;
		});

		/* Select */
		$( 'select' ).each(function() {
			if ( ! $( this ).attr( 'multiple' ) ) {
				$( this ).after( '<div class = "camp-select-main" id = "temp-main" ><ul class = "camp-select" id = "temp"/></div>' )
					.children( 'optgroup' )
						.each(function() {
							$( '#temp' ).append( '<li class = "camp-option-group">' + $( this ).attr( 'label' ) + '</li>' );
							$( this ).children( 'option' )
								.each(function() {
									$( '#temp' ).append( '<li class = "camp-option" >' + $( this ).text() + '</li>' );
								});
						})
					.end()
					.children( 'option' )
					.each(function() {
						$( '#temp' ).append( '<li class = "camp-option">' + $( this ).text() + '</li>' );
					});
				$( '#temp' ).before( '<div class = "camp-select-header" id = "temp-header"></div>' );
				$( '#temp-header' ).prepend( '<img src = ' + camp_path + 'choise.jpg alt = "< >" />' );
				$( '#temp-header' ).prepend( '<p class = "camp-header-text" id = "temp-text">Select element</p>' );
				$( '#temp-header' ).attr( 'id', this.id );
				$( '#temp-img' ).attr( 'id', this.id );
				$( '#temp-text' ).attr( 'id', this.id );
				$( '#temp' ).attr( 'id', this.id );
				$( '#temp-main' ).attr( 'id', this.id );
				$( this ).css( 'display', 'none' );
			}
		});

		$( '.camp-select-header' ).on( {
			click: function() {
				$( '.camp-select#' + this.id ).children( 'li' ).toggle( 'slow' );
				$( '.camp-select#' + this.id ).children( 'li' ).attr( 'id', this.id );
			}
		});

		$( '.camp-option' ).on( {
			click: function() {
				$( '.camp-select#' + this.id ).children( 'li' ).hide( 'slow' );
				$( 'p.camp-header-text#' + this.id ).text( $( this ).text() );
				var index = $( this ).parent().children( 'li.camp-option' ).index( $( this ) );
				var curSelect = $( 'select#' + this.id ).prop( 'selectedIndex', index );
				if ( curSelect.val() ) {
					curSelect.change();
				}
			}
		});

		$( document ).mousedown(function( e ) {
			if ( $( e.target ).closest( '.camp-select-main#' + eID ).length == 0 ) {
				var eID = $( e.target ).attr( 'id' );
				$( '.camp-select' ).not( '#' + eID ).children( 'li' ).hide( 'slow' );
			}
		});

		/* Sub Menu */
		$( '.camp-site-navigation' ).find( '.sub-menu', '.children' ).children( 'li' ).on( {
			mouseenter: function() {
				$( this ).children( 'ul' )
					.each(function() {
						if ( $( 'html' ).attr( 'class' ) == 'ie7' || $( 'html' ).attr( 'class' ) == 'ie8' ) {
							$( this ).show();
						}
						if ( $( this ).offset().left + $( this ).width() > $( window ).width() ) {
							$( this ).css( { 'top': '60%', 'left': '-222px' } );
						}
					});
			},
			mouseleave: function() {
				if ( $( 'html' ).attr( 'class' ) == 'ie7' || $( 'html' ).attr( 'class' ) == 'ie8' ) {
					$( this ).children( 'ul' ).hide();
				}
			}
		});

		if ( $( 'html' ).attr( 'class' ) == 'ie7' ) {
			$( '.camp-site-navigation' ).find( '.children' ).on( {
				mouseleave: function() {
					$( this ).hide();
				}
			});
		}

		/* Radiobutton */
		var camp_radioId = 0;
		$( 'input:radio' ).each(function() {
			$( this ).css( 'display', 'none' );
			$( this ).after( '<img id = "camp-radio-' + camp_radioId + '" class = "camp-radio" src = "' + camp_path + 'radio.jpg" alt = "Radio" />' );
			$( this ).attr( 'id', 'camp-radio-' + camp_radioId );
			if ( $( this ).attr( 'checked' ) ) {
				$( '.radio#' + this.id ).attr( 'src', camp_path + 'radio-checked.jpg' );
			} else {
				$( '.radio#' + this.id ).attr( 'src', camp_path + 'radio.jpg' );
			}
			camp_radioId++;
		});

		$( '.camp-radio' ).on( {
			click: function() {
				if ( $( 'input:radio#' + this.id ).prop( 'checked' ) ) {
					$( 'input:radio#' + this.id ).prop( 'checked', false );
					$( '.camp-radio#' + this.id ).attr( 'src', camp_path + 'radio.jpg' );
				} else {
					var name = $( 'input:radio#' + this.id ).attr( 'name' );
					$( 'input[name = ' + name + ']' ).prop( 'checked', false )
						.each(function() {
							$( '.camp-radio#' + this.id ).attr( 'src', camp_path + 'radio.jpg' );
						});
					$( '.camp-radio#' + this.id ).attr( 'src', camp_path + 'radio-checked.jpg' );
					$( 'input:radio#' + this.id ).prop( 'checked', true );
				}
				$( this ).css( 'opacity', '1' );

			},
			mouseenter: function() {
				if ( ! $( 'input:radio#' + this.id ).prop( 'checked' ) ) {
					$( '.camp-radio#' + this.id ).attr( 'src', camp_path + 'radio-checked.jpg' )
						.css( 'opacity', '0.5' );
				}
			},
			mouseleave: function() {
				if ( ! $( 'input:radio#' + this.id ).prop( 'checked' ) ) {
					$( '.camp-radio#' + this.id ).attr( 'src', camp_path + 'radio.jpg' )
						.css( 'opacity', '1' );
				}
			}
		});

		/* Checkbox */
		var camp_checkboxId = 0;
		$( 'input:checkbox' ).each(function() {
			$( this ).css( 'display', 'none' );
			$( this ).after( '<img id = "camp-checkbox-' + camp_checkboxId + '" class = "camp-checkbox" src = "' + camp_path + 'checkbox.jpg" alt = "Checkbox" />' );
			$( this ).attr( 'id', 'camp-checkbox-' + camp_checkboxId );
			if ( $( this ).attr( 'checked' ) ) {
				$( '.camp-checkbox#' + this.id ).attr( 'src', camp_path + 'checkbox-checked.jpg' );
			} else {
				$( '.camp-checkbox#' + this.id ).attr( 'src', camp_path + 'checkbox.jpg' );
			}
			camp_checkboxId++;
		});

		$( '.camp-checkbox' ).on( {
			click: function() {
				if ( $('input:checkbox#' + this.id ).prop( 'checked' ) ) {
					$( 'input:checkbox#' + this.id ).prop( 'checked', false );
					$( '.camp-checkbox#' + this.id ).attr( 'src', camp_path + 'checkbox.jpg' );
				} else {
					$( '.camp-checkbox#' + this.id ).attr( 'src', camp_path + 'checkbox-checked.jpg' );
					$( 'input:checkbox#' + this.id ).prop( 'checked', true );
				}
				$( this ).css( 'opacity', '1' );

			},
			mouseenter: function() {
				if ( ! $( 'input:checkbox#' + this.id ).prop( 'checked' ) ) {
					$( '.camp-checkbox#' + this.id ).attr( 'src', camp_path + 'checkbox-checked.jpg' )
						.css( 'opacity', '0.5' );
				}
			},
			mouseleave: function() {
				if ( ! $( 'input:checkbox#' + this.id ).prop( 'checked' ) ) {
					$( '.camp-checkbox#' + this.id ).attr( 'src', camp_path + 'checkbox.jpg' )
						.css( 'opacity', '1' );
				}
			}
		});

		/* Upload File */
		var camp_uploadId = 0;
		$( 'input:file' ).wrap( '<div class = "camp-upload-file"></div>' )
			.each(function() {
				$( this ).css( 'display', 'none' );
				$( this ).attr( 'id', 'camp-upload-' + camp_uploadId );
				$( this ).attr( 'name', 'file' );
				$( this ).after( '<label class = "camp-upload-lbl" id = "camp-upload-' + camp_uploadId + '" for = "' + this.id + '">File is not selected</label>' );
				$( this ).after( '<img class = "camp-upload-img" id = "camp-upload-' + camp_uploadId + '"" src = "' + camp_path + 'upload.jpg" alt = "Upload" />' );
				camp_uploadId++;
			});

		$( '.camp-upload-img' ).click(function() {
			$( 'input:file#' + this.id ).click();
		});

		$( 'input:file' ).change(function() {
			$( 'label.camp-upload-lbl#' + this.id ).text( $( this ).val().split( '\\' ).pop() );
		});

		/* Blockquote */
		//$( 'blockquote' ).prepend( '<img class = "camp-quote" src = "' + camp_path + 'quote.jpg" alt = "Quote" />' );

		/* Clear Button */
		$( 'input:reset' ).click(function() {
			var parrentForm = $( this ).parents( 'form' );
			$( parrentForm ).find( '.camp-select' ).each(function() {
				$( 'p.camp-header-text#' + this.id ).text( 'Select element' );
				$( this ).children( 'li' ).hide();
			});
			$( parrentForm ).find( '.camp-radio' ).attr( 'src', camp_path + 'radio.jpg' );
			$( parrentForm ).find( '.camp-checkbox' ).attr( 'src', camp_path + 'checkbox.jpg' );
			$( parrentForm ).find( '.camp-upload-lbl' ).text('File is not selected');
		});
		
		$('#menu-header2 li a').attr('target','_blank');
		$('#menu-header2-1 li a').attr('target','_blank');
		
	})


	var $b=jQuery.noConflict();
	$(function($){
		$('#menu-header2 li a').attr('target','_blank');
		$('#menu-header2-1 li a').attr('target','_blank');
	});

	$('.page_lending .list-item .btnSwitch').click(function(){
		
		if ($(this).hasClass('closed')) {
			$(this).addClass('opened').removeClass('closed');
			$(this).parent().addClass('shadow');
			$(this).parent().parent().find('.program-list').slideToggle("slow");
			
		}
		else {
			$(this).addClass('closed').removeClass('opened');
			$(this).parent().removeClass('shadow');
			$(this).parent().parent().find('.program-list').slideToggle("slow");

		}
	});


})(jQuery);

!function(e,n,A){function t(e,n){return typeof e===n}function o(){var e,n,A,o,a,i,l;for(var f in r)if(r.hasOwnProperty(f)){if(e=[],n=r[f],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(A=0;A<n.options.aliases.length;A++)e.push(n.options.aliases[A].toLowerCase());for(o=t(n.fn,"function")?n.fn():n.fn,a=0;a<e.length;a++)i=e[a],l=i.split("."),1===l.length?Modernizr[l[0]]=o:(!Modernizr[l[0]]||Modernizr[l[0]]instanceof Boolean||(Modernizr[l[0]]=new Boolean(Modernizr[l[0]])),Modernizr[l[0]][l[1]]=o),s.push((o?"":"no-")+l.join("-"))}}function a(e){var n=u.className,A=Modernizr._config.classPrefix||"";if(c&&(n=n.baseVal),Modernizr._config.enableJSClass){var t=new RegExp("(^|\\s)"+A+"no-js(\\s|$)");n=n.replace(t,"$1"+A+"js$2")}Modernizr._config.enableClasses&&(n+=" "+A+e.join(" "+A),c?u.className.baseVal=n:u.className=n)}function i(e,n){if("object"==typeof e)for(var A in e)f(e,A)&&i(A,e[A]);else{e=e.toLowerCase();var t=e.split("."),o=Modernizr[t[0]];if(2==t.length&&(o=o[t[1]]),"undefined"!=typeof o)return Modernizr;n="function"==typeof n?n():n,1==t.length?Modernizr[t[0]]=n:(!Modernizr[t[0]]||Modernizr[t[0]]instanceof Boolean||(Modernizr[t[0]]=new Boolean(Modernizr[t[0]])),Modernizr[t[0]][t[1]]=n),a([(n&&0!=n?"":"no-")+t.join("-")]),Modernizr._trigger(e,n)}return Modernizr}var s=[],r=[],l={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var A=this;setTimeout(function(){n(A[e])},0)},addTest:function(e,n,A){r.push({name:e,fn:n,options:A})},addAsyncTest:function(e){r.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=l,Modernizr=new Modernizr,Modernizr.addTest("svg",!!n.createElementNS&&!!n.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect);var f,u=n.documentElement,c="svg"===u.nodeName.toLowerCase();!function(){var e={}.hasOwnProperty;f=t(e,"undefined")||t(e.call,"undefined")?function(e,n){return n in e&&t(e.constructor.prototype[n],"undefined")}:function(n,A){return e.call(n,A)}}(),l._l={},l.on=function(e,n){this._l[e]||(this._l[e]=[]),this._l[e].push(n),Modernizr.hasOwnProperty(e)&&setTimeout(function(){Modernizr._trigger(e,Modernizr[e])},0)},l._trigger=function(e,n){if(this._l[e]){var A=this._l[e];setTimeout(function(){var e,t;for(e=0;e<A.length;e++)(t=A[e])(n)},0),delete this._l[e]}},Modernizr._q.push(function(){l.addTest=i}),Modernizr.addAsyncTest(function(){function e(e,n,A){function t(n){var t=n&&"load"===n.type?1==o.width:!1,a="webp"===e;i(e,a&&t?new Boolean(t):t),A&&A(n)}var o=new Image;o.onerror=t,o.onload=t,o.src=n}var n=[{uri:"data:image/webp;base64,UklGRiQAAABXRUJQVlA4IBgAAAAwAQCdASoBAAEAAwA0JaQAA3AA/vuUAAA=",name:"webp"},{uri:"data:image/webp;base64,UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAABBxAR/Q9ERP8DAABWUDggGAAAADABAJ0BKgEAAQADADQlpAADcAD++/1QAA==",name:"webp.alpha"},{uri:"data:image/webp;base64,UklGRlIAAABXRUJQVlA4WAoAAAASAAAAAAAAAAAAQU5JTQYAAAD/////AABBTk1GJgAAAAAAAAAAAAAAAAAAAGQAAABWUDhMDQAAAC8AAAAQBxAREYiI/gcA",name:"webp.animation"},{uri:"data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA=",name:"webp.lossless"}],A=n.shift();e(A.name,A.uri,function(A){if(A&&"load"===A.type)for(var t=0;t<n.length;t++)e(n[t].name,n[t].uri)})}),o(),a(s),delete l.addTest,delete l.addAsyncTest;for(var p=0;p<Modernizr._q.length;p++)Modernizr._q[p]();e.Modernizr=Modernizr}(window,document);


(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=1429009427341658";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

{!function(d,s,id){
	var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
	if(!d.getElementById(id)){
		js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
		fjs.parentNode.insertBefore(js,fjs);}}
(document, 'script', 'twitter-wjs');}


