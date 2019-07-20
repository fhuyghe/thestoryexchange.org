export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired

    // #######################################
    // VIDEO PLAYERS #########################
    // #######################################

    if ( $('.video-player').length){

      $('.video-post iframe, .playlist iframe').each(function() {
          $(this).attr('og-src', $(this).attr('src'));
          $(this).attr('src', '');
      });

      $('.video-post .thumbnail, .playlist .thumbnail').click(function(){
          $('.video-player', $(this).parent()).css('display', 'flex');
          var iframe = $('iframe', $(this).parent());
          var source = iframe.attr('src');
          if (iframe.attr('og-src')) {
              source = iframe.attr('og-src');
          }
          iframe.attr('src', source);
      });

      $('.video-player').click(function(){
          var iframe = $('iframe', this);
          iframe.attr('og-src', iframe.attr('src'));
          iframe.attr('src', '');
          $(this).hide();
      });
    }
    // END OF VIDEO PLAYERS
    
  },
};
