// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import templateTimeline from './routes/timeline';
import runningWomen2018Elections from './routes/running-women'

// Import Slick
//import 'slick-carousel/slick/slick.min';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  templateTimeline,
  runningWomen2018Elections
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
