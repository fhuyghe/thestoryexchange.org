export default function eventLoader(events, target) {
  return fn => [
    function install() {
      events.forEach(eventName => target.addEventListener(eventName, fn))
    },
    function uninstall() {
      events.forEach(eventName => target.removeEventListener(eventName, fn))
    },
  ]
}
