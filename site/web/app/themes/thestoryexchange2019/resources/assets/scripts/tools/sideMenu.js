import eventLoader from '../util/eventLoader';

export default function sideMenu() {
  const {body} = document;
  const button = document.querySelector('.side-menu__toggle-button');
  const menuContainer = document.querySelector('.side-menu__container');
  const contentContainer = document.querySelector('.side-menu__body-wrap');

  const getMenuWidth = () => Number(getComputedStyle(menuContainer).width.replace('px', ''));

  const setTranslateX = (el, value) => el.style.transform = `translateX(${value}px)`;
  const setVisibility = (el, value) => el.style.visibility = value ? 'visible' : 'hidden';

  const openMenu = (width = getMenuWidth()) => {
    setVisibility(menuContainer, true)
    setTranslateX(menuContainer, 0);
    setTranslateX(contentContainer, width);
    setTranslateX(button, width);
    body.classList.add('side-menu--open');

    return width;
  };
  const closeMenu = (width = getMenuWidth()) => {
    setTranslateX(menuContainer, -width);
    setTranslateX(contentContainer, 0);
    setTranslateX(button, 0);
    body.classList.remove('side-menu--open');
    setVisibility(menuContainer, false)

    return width;
  };

  const loader = eventLoader(['click'], button);
  const genHandler = () => {
    let isTransitioning = false;
    let menuIsOpen = false;
    let width = 0;

    return () => {
      if (isTransitioning) return;
      if (menuIsOpen) {
        menuIsOpen = false;
        closeMenu(width)
      } else {
        menuIsOpen = true;
        width = openMenu()
      }
      isTransitioning = true;
      setTimeout(() => isTransitioning = false, 500);
    }
  }

  const {[0]: init, [1]: destroy} = loader(genHandler());

  return {init, destroy}
}
