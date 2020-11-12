import { toggleAttribute, toggleClass } from './common';

export default () => {
  const toggleButton = document.querySelector('#toggle-menu');
  const nav = document.querySelector('#header-navigation');

  const addEvents = () => {
    toggleButton.addEventListener('click', (event) => {
      event.preventDefault();
      toggleAttribute(toggleButton, 'aria-expanded');
      toggleClass(toggleButton, 'is-active');
      toggleClass(nav, 'js-show');
    });
  };

  if (toggleButton && nav) addEvents();
};