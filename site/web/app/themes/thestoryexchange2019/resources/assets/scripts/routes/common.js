import initVideoPlayers from '../tools/videoPlayer';
import stickyPosition from '../tools/stickyPosition';

export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    initVideoPlayers();
    const position = stickyPosition(['.nav-primary'], window)('stick-to-top');
    position.init()
  },
};
