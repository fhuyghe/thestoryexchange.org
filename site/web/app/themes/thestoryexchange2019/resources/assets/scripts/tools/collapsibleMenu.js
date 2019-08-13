import eventLoader from '../util/eventLoader';
import * as dom from '../util/dom';

const EVENTS = [
  'click',
];
const CLASS_BASE = 'collapsible_menu';
const openClass = dom.classSwitch(`${CLASS_BASE}--open`);
const menuClass = dom.classSwitch(CLASS_BASE);
const submenuClass = dom.classSwitch(`${CLASS_BASE}__sub-menu`);
const triggerClass = dom.classSwitch(`${CLASS_BASE}__trigger`);

export default function collapsibleMenu({
  menuSelector,
  menuItemSelector,
  submenuSelector,
  triggerEvents = EVENTS,
  triggerSelector,
}) {
  const menus = dom.sel.all(menuSelector);
  const menuItems = menus.map(m => dom.sel.all(menuItemSelector, m)).reduce((a, b) => a.concat(b));

  const loaders = menuItems
    .map(mI => [dom.sel.one(submenuSelector, mI), dom.sel.one(triggerSelector, mI), mI])
    .filter(sM => !!sM[0] && !!sM[1]) // must have menu and trigger element
    .map(([submenu, trigger, parent]) => {
      menuClass(parent).on();
      submenuClass(submenu).on();
      triggerClass(trigger).on();
      const menuOpenClass = openClass(parent);

      trigger.href = trigger.href || '#!';

      const loader = eventLoader(triggerEvents, trigger)((e) => {
        e.preventDefault();
        if (menuOpenClass.isOn()) {
          menuOpenClass.off();
        } else {
          menuOpenClass.on();
        }
      })

      return loader;
    })

    return {
      init: () => loaders.map(l => l[0]()),
      destroy: () => loaders.map(l => l[1]()),
    }
}
