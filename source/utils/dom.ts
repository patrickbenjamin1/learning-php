export const addRootEventListener = (selector: string, type: keyof HTMLElementEventMap, callback: (event: Event, element: Element) => void) => {
    // define event listener callback
    const eventListenerCallback = (
      event: Event
    ) => {
      // get the original target of the event
      const { target } = event
  
      if (target instanceof Element) {
        // get parent that matches the given selector
        const matched = target.closest(selector)
  
        if (matched) {
          // run callback
          callback(event, matched)
        }
      }
    }
  
    // add callback to event listener on the body
    document.defaultView.addEventListener(type, eventListenerCallback, true)
  
    // return the callback so it can be removed
    return eventListenerCallback
}