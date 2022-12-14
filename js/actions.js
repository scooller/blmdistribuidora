$(function() {
	// 
	$(window).scroll(numScroll);
});

function loadOk(){
	$('#load').remove();
    var mySVGsToInject = document.querySelectorAll('img.svg');
    SVGInjector(mySVGsToInject);
	
	wow = new WOW({
		boxClass:     'wow',      // default
		animateClass: 'animate__animated', // default
		offset:       0,          // default
		mobile:       true,       // default
		live:         true        // default
	})
	wow.init();
	const firstScrollSpyEl = document.querySelector('[data-bs-spy="scroll"]')
	firstScrollSpyEl.addEventListener('activate.bs.scrollspy', () => {
		console.log('Scroll');
		$('#menu .navbar-collapse.show').removeClass('show');
		$('#menu .navbar-toggler').addClass('collapsed');
	})
}
$( window ).on( "load",function() {           
    loadOk();
});
function alerta($msj){
    console.log($msj);
    $.fancybox.open($msj);
}
var viewed = false;
function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}
function currencyFormat(num, fix) {
	return (
	    parseFloat(num)
	      .toFixed(fix) // always two decimal digits
	      .replace('.', ',') // replace decimal point character with ,
	      .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
	)
}
function numScroll() {
	if($(".counter").length){
	  if (isScrolledIntoView($(".counter")) && !viewed) {
		  viewed = true;
		  $('.counter').each(function () {
			  $(this).prop('Counter',0).animate({
				  Counter: $(this).text()
			  }, {
				  duration: 4000,
				  easing: 'swing',
				  step: function (now) {
					  $(this).text(currencyFormat(Math.ceil(now),0));
				  }
			  });
		  });
	  }
	}
}