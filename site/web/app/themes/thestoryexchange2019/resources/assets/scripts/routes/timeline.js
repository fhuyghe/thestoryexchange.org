import Chart from '../tools/chart'
//import ScrollReveal from 'scrollreveal'

export default {
    init() {
      // JavaScript to be fired on the timeline page
        
        console.log('Timeline init')

    //Declare variables
    var timelineBanner = $('#timeline-charts'),
        timelineContent = $('#timeline-content'),
        timelineTop = $('#timeline-top'),
        timelineBannerOffset = timelineTop.offset().top + timelineBannerHeight,
        timelineBannerHeight = timelineBanner.outerHeight(),
        scrollY = $(window).scrollTop(),
        scrollForYears = scrollY + timelineBannerHeight,
        //Data
        houseTotal = 435,
        senateTotal = 100,
        congressTotal = houseTotal + senateTotal,
        totalPercent = 0,
        houseDem = 10,
        houseRep = 3,
        senateDem = 1,
        senateRep = 1,
        totalRep = 0,
        totalDem = 0,
        ctx = $('#congressChart');
    
    

    $(window).resize(function () {
        if ($('.timeline').length) {
            timelineResize();
        }
    });

    var updateNumbers = function (event) {
        $('.current').removeClass('current');
        
        if (event){
            
            event.addClass('current');
            
            houseDem = event.data('housedem');
            houseRep = event.data('houserep');
            senateDem = event.data('senatedem');
            senateRep = event.data('senaterep');   
        }

        totalRep = houseRep + senateRep;
        totalDem = houseDem + senateDem;
        totalPercent = Math.round((totalRep + totalDem) / congressTotal * 100);

        $('.house .written .dem').html(houseDem);
        $('.house .written .rep').html(houseRep);
        $('.senate .written .dem').html(senateDem);
        $('.senate .written .rep').html(senateRep);
        $('.congress .percents').html(totalPercent + '%');
        
        var houseDemRatio = 100 * houseDem / houseTotal;
        var houseRepRatio = 100 * houseRep / houseTotal;
        var senateDemRatio = 100 * senateDem / senateTotal;
        var senateRepRatio = 100 * senateRep / senateTotal;

        $('.house .barGraph .dem').css('width', houseDemRatio + '%');
        $('.house .barGraph .rep').css('width', houseRepRatio + '%');
        $('.senate .barGraph .dem').css('width', senateDemRatio + '%');
        $('.senate .barGraph .rep').css('width', senateRepRatio + '%');

        myChart.data.datasets[0].data = [totalDem, totalRep, congressTotal - totalDem - totalRep];
        myChart.update();
    }

    var timelineScroll = function () {
        //Define scroll
        scrollY = $(window).scrollTop();
        timelineBannerHeight = timelineBanner.outerHeight();
        scrollForYears = scrollY + timelineBannerHeight + 38;

        //Lock the top info
        console.log(timelineBannerOffset);
        if (scrollY >= timelineBannerOffset) {
            console.log('Fixed');
            timelineBanner.addClass('fixed');
            timelineContent.css('margin-top', timelineBanner.outerHeight())
        } else {
            timelineBanner.removeClass('fixed');
            timelineContent.css('margin-top', 0)
        }

        //Deal with each date
        $('.event').each(function () {
            var scrollYear = $(this).offset().top;
            if (scrollForYears >= scrollYear) {
                if (!$(this).hasClass('past')) {
                    //This is the current one
                    updateNumbers($(this));
                }
                $(this).addClass('past');
                $('.year', this).css('top', timelineBannerHeight);
            } else {
                if ($(this).hasClass('past')) {
                    //This is the current one
                    updateNumbers($(this));
                }
                $(this).removeClass('past');
                $('.year', this).css('top', 0);
            }
        })
    }
    
    // TOP ANIMATED CHART
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [0, 0, 100],
                backgroundColor: [
                    '#00adef',
                    '#e54624',
                    '#EEE',
                ],
                labels: [
                    'Women Democrat',
                    'Women Republican',
                    'Men',
                ],
                borderWidth: [0, 0, 0],
            },
            ],
        },
        options: {
            cutoutPercentage: 80,
        },
    });

    var timelineResize = function () {
        var width = $(window).width();
        timelineBannerHeight = timelineBanner.outerHeight();
        timelineBannerOffset = timelineTop.offset().top + timelineBannerHeight;
        
        if (width > 600){ //DESKTOP
            //Resize the photos
            $('.content-wrap').each(function () {
                if ($('.image', this).height() < $('.content', this).height()) {
                    $('.image', this).height($('.content', this).height());
                }
            });
        } else { //MOBILE
            $('.image').height('auto');
        }
    }

    timelineScroll();
    timelineResize();
    updateNumbers();

    // REVEAL ELEMENTS ON SCROLL
    // window.sr = new ScrollReveal();
    // window.sr.reveal('.image img');
    // window.sr.reveal('.content');

    $(window).scroll(function () {
        timelineScroll();
    })
        
    $(window).load(function(){
        timelineResize();
      });
},
finalize() {
  // JavaScript to be fired on the home page, after the init JS
},
};
