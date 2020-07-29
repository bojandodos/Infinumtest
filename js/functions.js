/*ovdje se nalaze funcije za javascript/jquery*/

$(document).ready(function() {

	document.getElementById("post_title").onsubmit = function(){
		location.reload(true);
	}

	//TOGGLE NAV

	$('#toggle').click(function(){
	    $(this).toggleClass('open');
		$('.main-menu').slideToggle(300);
	});

	//HOME SLIDER

	$('.header-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		infinite: true,
		speed: 1000,
		arrows: false,
		dots: false
	});

	//RANDOM SLIDER HOMEPAGE

	$('.randnom-products .products').slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [
		  {
			breakpoint: 1024,
			settings: {
			  slidesToShow: 3,
			  slidesToScroll: 3,
			  infinite: true,
			  dots: false
			}
		  },
		  {
			breakpoint: 600,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 2
			}
		  },
		  {
			breakpoint: 480,
			settings: {
			  slidesToShow: 1,
			  slidesToScroll: 1
			}
		  }
		  // You can unslick at a given breakpoint now by adding:
		  // settings: "unslick"
		  // instead of a settings object
		]
	  });

	  //RANDOM SLIDER HOMEPAGE

	$('.single.single-product .related.products .products').slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [
		  {
			breakpoint: 1024,
			settings: {
			  slidesToShow: 3,
			  slidesToScroll: 3,
			  infinite: true,
			  dots: false
			}
		  },
		  {
			breakpoint: 600,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 2
			}
		  },
		  {
			breakpoint: 480,
			settings: {
			  slidesToShow: 1,
			  slidesToScroll: 1
			}
		  }
		  // You can unslick at a given breakpoint now by adding:
		  // settings: "unslick"
		  // instead of a settings object
		]
	  });


});




$.fn.setAllToMaxHeight = function(){
	return this.height( Math.max.apply(this, $.map( this , function(e){ return $(e).height() }) ) );
  };
  
  if($(window).width() > 360 ) {
	$(window).load(function() {
	  $('.woocommerce-page ul.products li.product').setAllToMaxHeight();
	});
  };
  

  function openNav() {
    document.getElementById("navigation").style.width = "100%";
}

function closeNav() {
    document.getElementById("navigation").style.width = "0";
}



