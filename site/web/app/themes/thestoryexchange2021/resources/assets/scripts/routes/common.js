import initVideoPlayers from '../tools/videoPlayer';
import stickyPosition from '../tools/stickyPosition';
import sideMenu from '../tools/sideMenu';
import collapsibleMenu from '../tools/collapsibleMenu';

export default {
  init() {
    // JavaScript to be fired on all pages

    //Make all outbound links open in a new tab
    // $('a').each(function () {
    //     var a = new RegExp('/' + window.location.host + '/');
    //     if (!a.test(this.href)) {
    //       $(this).click(function(event) {
    //         event.preventDefault();
    //         event.stopPropagation();
    //         window.open(this.href, '_blank');
    //       });
    //     }
    // });
    $('article a:not(.play-pause):not(.accordion-toggle)').click(function(event) {
      event.preventDefault();
      event.stopPropagation();
      window.open(this.href, '_blank');
    });

    //Newsletter Popup
    $('.open-popup').on('click', function () {
      $('#newsletterPopup').addClass('active');
    })

    $('#newsletterPopup').on('click', function (e) {
      if (e.target !== this)
        return;
      
      $('#newsletterPopup').removeClass('active');
    })
    $('.close').on('click', function () {
      $('#newsletterPopup').removeClass('active');
    })

    $('.search-toggle').on('click', function () {
      $('.search').toggleClass('active');
    });

    //
    if($('.scrolling-story')){
      let options = {
        rootMargin: '100px',
        threshold: .8,
      };

      const textWrapper = document.querySelector('.scrolling-story-text')

      let callback = (entries) => {
        entries.forEach((entry) => {
          console.log('Changed!', entry)
          textWrapper.innerHTML = entry.target.dataset.text
        });
      };
      
      let observer = new IntersectionObserver(callback, options);

      let slides = document.querySelectorAll('.scrolling-story-slide')
      if(slides) slides.forEach(slide => {
        observer.observe(slide);
      });
    }

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    initVideoPlayers();
    const position = stickyPosition(['.nav-primary', '.container.brand'], window)('stick-to-top');
    position.init()
    sideMenu().init();
    collapsibleMenu({
      menuSelector: '.side-menu__nav',
      menuItemSelector: '.menu-item-has-children',
      submenuSelector: '.sub-menu',
      triggerSelector: 'a',
    }).init();
  },
};
