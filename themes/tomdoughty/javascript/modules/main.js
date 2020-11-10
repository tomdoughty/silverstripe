import mobileNav from './mobile-nav';
import skipLink from './skip-link';

import './polyfills';

document.addEventListener('DOMContentLoaded', () => {
  skipLink();
  mobileNav();
});
