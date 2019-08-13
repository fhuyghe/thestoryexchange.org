import initVideoPlayers from '../tools/videoPlayer';
import stickyPosition from '../tools/stickyPosition';
import sideMenu from '../tools/sideMenu';
import collapsibleMenu from '../tools/collapsibleMenu';

export default {
  init() {
    // JavaScript to be fired on all pages
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
