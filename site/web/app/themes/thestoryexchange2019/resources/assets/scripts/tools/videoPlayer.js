// #######################################
// VIDEO PLAYERS #########################
// #######################################

export default function initVideoPlayers() {
  if ( $('.video-player').length){

    $('.video-post iframe, .playlist iframe').each(function() {
        $(this).attr('og-src', $(this).attr('src'));
        $(this).attr('src', 'javascript:void(0);');
    });

    $('.video-post .thumbnail, .playlist .playlist-link').click(function(){
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
}
