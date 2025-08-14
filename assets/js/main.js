// Menu
import Menu from './modules/menu.js';

// Import Font loader
import LightMode from './modules/lightmode.js';

export default {
  init() {
    // JavaScript to be fired on all pages

    // Menu
    if (document.getElementById('main-nav')) {
      Menu();
    }

    LightMode();
  },
  finalize() {
    // JavaScript to be fired after init
  },
  loaded() {
    // Javascript to be fired once fully loaded
  },
};
