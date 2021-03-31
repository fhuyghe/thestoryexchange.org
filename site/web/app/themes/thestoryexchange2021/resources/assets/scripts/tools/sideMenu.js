import eventLoader from '../util/eventLoader';
import * as dom from '../util/dom';

const setTransform = dom.style('transform');
const setTranslateXPixels = dom.style('transform', v => `translateX(${v}px)`);
const setVisibility = dom.style('visibility', v => v ? 'visible' : 'hidden');
const setOverflow = dom.style('overflow');

export default function sideMenu() {
  const {body} = document;
  const {parentElement: htmlEl} = body;
  const button = dom.sel.one('.side-menu__toggle-button');
  const menuContainer = dom.sel.one('.side-menu__container');
  const contentContainer = dom.sel.one('.side-menu__body-wrap');

  const getMenuWidth = () => Number(getComputedStyle(menuContainer).width.replace('px', ''));

  const bodyClass = dom.classSwitch('side-menu--open')(body);

  const openMenu = (width = getMenuWidth()) => {
    setVisibility(menuContainer, true)
    setTranslateXPixels(menuContainer, 0);
    setTranslateXPixels(contentContainer, width);
    setTranslateXPixels(button, width);
    bodyClass.on();
    setOverflow(htmlEl, 'hidden')

    return width;
  };
  const closeMenu = (width = getMenuWidth()) => {
    setTranslateXPixels(menuContainer, -width);
    setTranslateXPixels(contentContainer, 0);
    setTranslateXPixels(button, 0);
    bodyClass.off();
    setOverflow(htmlEl, '');
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
    }
  }

  const {[0]: init, [1]: destroy} = loader(genHandler());

  return {init, destroy}
}
