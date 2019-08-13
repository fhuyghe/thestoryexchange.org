import {throttle} from 'lodash';
import eventLoader from '../util/eventLoader';
import * as dom from '../util/dom';
const EVENTS = [
  'scroll',
  'resize',
];
const setHeight = dom.style('height', v => `${v}px`);

export default function stickyPosition(selectors, eventTarget = window) {
  const elements = dom.sel.all(selectors);
  const loader = eventLoader(EVENTS, eventTarget);

  return stickyClassBase => {
    const placeholderClass = dom.classSwitch(`${stickyClassBase}__placeholder`);
    const placeholderElements = elements.map(el => {
      const placeholder = document.createElement('div');

      placeholderClass(placeholder).on()

      return [placeholder, el];
    });

    const stickyClass = dom.classSwitch(stickyClassBase);

    const insertPlaceholder = ([p, el]) => el.insertAdjacentElement('afterEnd', p);
    const removePlaceholder = ([p]) => p.remove()

    const elementHandler = ([placeholder, el]) => {
      const elStickyClass = stickyClass(el);
      const elHasClass = elStickyClass.isOn();
      const elRect = el.getBoundingClientRect();
      const {y, height} = elHasClass ? placeholder.getBoundingClientRect() : elRect;

      if (elHasClass && y >= 0) {
        elStickyClass.off();
        setHeight(placeholder, 0);
      } else if (!elHasClass && y < 0) {
        elStickyClass.on();
        setHeight(placeholder, height);
      } else if (elRect.height !== height) {
        setHeight(placeholder, elRect.height);
      }
    };

    const updater = () => {
      placeholderElements.forEach(elementHandler)
    };

    const [install, uninstall] = loader(throttle(updater, 50));

    return {
      init: () => {
        install();
        placeholderElements.forEach(insertPlaceholder);
      },
      destroy: () => {
        uninstall()
        placeholderElements.forEach(removePlaceholder);
      },
    }
  }
}
