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
    $('article a').click(function(event) {
      event.preventDefault();
      event.stopPropagation();
      window.open(this.href, '_blank');
    });
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
