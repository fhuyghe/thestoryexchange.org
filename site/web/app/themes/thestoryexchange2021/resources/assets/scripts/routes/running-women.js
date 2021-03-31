import Chart from '../tools/chart'
//import ScrollReveal from 'scrollreveal'

export default {
    init() {
      // JavaScript to be fired on the timeline page
	$('.org-menu a:first-child').addClass('active');
	
	$('#full-grey .org-menu a').click(function(event){
		$('.org-menu a.active').removeClass('active');
		$(event.target).addClass('active');
	})
	
	
	//Change active on manual scroll
	$(document).on("scroll", onScroll);

	function onScroll(event){
		
		var scrollPos = $(document).scrollTop();
		var menuPos = $('#full-grey .org-menu').offset().top;
		var height = $(window).height();

		if (scrollPos > menuPos - 100){
			$('.org-menu').addClass('fixed');
		} else {
			$('.org-menu').removeClass('fixed');
		}
		
		$('.org-menu a').each(function () {
			var currLink = $(this);
			var refElement = $(currLink.attr("href"));
			if (refElement.offset().top <= scrollPos + .5 * height && refElement.offset().top + refElement.height() > scrollPos + .5 * height ) {
				$('#menu-center ul li a').removeClass("active");
				currLink.addClass("active");
			}
			else{
				currLink.removeClass("active");
			}
		});
	}

},
finalize() {
  // JavaScript to be fired on the home page, after the init JS
},
};