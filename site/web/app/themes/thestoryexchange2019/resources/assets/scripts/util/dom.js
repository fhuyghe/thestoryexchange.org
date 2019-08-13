export const sel = {
  one: (s, base = document) => base.querySelector(s),
  all: (s, base = document) => Array.from(base.querySelectorAll(s)),
}

export const style = (
  attr,
  transform = a => a
) => (
  el,
  value,
  finalTransform = transform
) => el.style[attr] = finalTransform(value)

export const classSwitch = (className) => el => {
  const {classList} = el;

  return {
    on: () => classList.add(className),
    off: () => classList.remove(className),
    isOn: () => classList.contains(className),
    isOff: () => !classList.contains(className),
  }
}
