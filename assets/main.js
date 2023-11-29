function reactive_ui() {
  const win = window,
    doc = document,
    docElem = doc.documentElement,
    body = doc.getElementsByTagName("body")[0],
    x = win.innerWidth || docElem.clientWidth || body.clientWidth,
    y = win.innerHeight || docElem.clientHeight || body.clientHeight;
  if (x < y) {
    document.querySelector("body").style.fontSize = "2em";
  } else {
    document.querySelector("body").style.fontSize = "1em";
  }
}
