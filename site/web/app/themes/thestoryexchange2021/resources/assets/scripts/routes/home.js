import 'slick-carousel';

export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS

    $('#latest-posts .post-group').slick({
      arrows: false,
      dots: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: true,
      centerMode: true,
      responsive:
        [
          {
            breakpoint: 9999,
            settings: 'unslick',
          }, {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
            },
          }],
    });
    
    $('#middleColumn .post-group').slick({
      dots: true,
      slidesToShow: 2,
      slidesToScroll: 1,
      infinite: true,
      centerMode: true,
      responsive:
        [
          {
            breakpoint: 9999,
            settings: 'unslick',
          }, {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
            },
          }],
    });
    
  },
};
