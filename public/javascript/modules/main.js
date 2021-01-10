// Modules from NHS.UK frontend
import Header from 'node_modules/nhsuk-frontend/packages/components/header/header';
import SkipLink from 'node_modules/nhsuk-frontend/packages/components/skip-link/skip-link';
import Details from 'node_modules/nhsuk-frontend/packages/components/details/details';
import Radios from 'node_modules/nhsuk-frontend/packages/components/radios/radios';
import Checkboxes from 'node_modules/nhsuk-frontend/packages/components/checkboxes/checkboxes';

// Custom JavaScript modules
import enhanceFormValidation from './enhanceFormValidation';

// Polyfills
import 'node_modules/nhsuk-frontend/packages/polyfills';

// Initialize modules on page load
document.addEventListener('DOMContentLoaded', () => {
  Details();
  Header();
  SkipLink();
  Radios();
  Checkboxes();
  enhanceFormValidation();
});