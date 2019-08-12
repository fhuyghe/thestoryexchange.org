import eventLoader from '../util/eventLoader';

export default function sideMenu() {
  const {body} = document;
  const {parentElement: htmlEl} = body;
  const button = document.querySelector('.side-menu__toggle-button');
  const menuContainer = document.querySelector('.side-menu__container');
  const contentContainer = document.querySelector('.side-menu__body-wrap');

  const getMenuWidth = () => Number(getComputedStyle(menuContainer).width.replace('px', ''));

  const setTransform = (el, value) => el.style.transform = value;
  const setTranslateXinPixels = (el, value) => setTransform(el, `translateX(${value}px)`);
  const setVisibility = (el, value) => el.style.visibility = value ? 'visible' : 'hidden';

  const openMenu = (width = getMenuWidth()) => {
    setVisibility(menuContainer, true)
    setTranslateXinPixels(menuContainer, 0);
    setTranslateXinPixels(contentContainer, width);
    setTranslateXinPixels(button, width);
    body.classList.add('side-menu--open');
    htmlEl.style.overflow = 'hidden';

    return width;
  };
  const closeMenu = (width = getMenuWidth()) => {
    setTranslateXinPixels(menuContainer, -width);
    setTranslateXinPixels(contentContainer, 0);
    setTranslateXinPixels(button, 0);
    body.classList.remove('side-menu--open');
    htmlEl.style.overflow = '';
    setVisibility(menuContainer, false);

    return width;
  };

  const loader = eventLoader(['click'], button);
  const genHandler = () => {
    let isTransitioning = false;
    let menuIsOpen = false;
    let width = 0;

    contentContainer.addEventListener('transitionend', () => {
      isTransitioning = false;
      if (!menuIsOpen) setTransform(contentContainer, 'none');
    })

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
      // setTimeout(() => isTransitioning = false, 500);
    }
  }

  const {[0]: init, [1]: destroy} = loader(genHandler());

  return {init, destroy}
}
