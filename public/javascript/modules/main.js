// Modules from NHS.UK frontend
import SkipLink from 'node_modules/nhsuk-frontend/packages/components/skip-link/skip-link';
import MenuToggle from 'node_modules/nhsuk-frontend/packages/components/header/menuToggle';
import SearchToggle from 'node_modules/nhsuk-frontend/packages/components/header/searchToggle';
import Card from 'node_modules/nhsuk-frontend/packages/components/card/card';
import Details from 'node_modules/nhsuk-frontend/packages/components/details/details';

// Custom JavaScript modules
import enhanceFormValidation from './enhanceFormValidation';

// Polyfills
import 'node_modules/nhsuk-frontend/packages/polyfills';

// Initialize modules on page load
document.addEventListener('DOMContentLoaded', () => {
  SkipLink();
  MenuToggle();
  SearchToggle();
  Card();
  Details();
  enhanceFormValidation();
});