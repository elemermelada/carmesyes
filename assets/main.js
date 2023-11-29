function reactive_ui() {
  const win = window,
    doc = document,
    docElem = doc.documentElement,
    body = doc.getElementsByTagName("body")[0],
    x = win.innerWidth || docElem.clientWidth || body.clientWidth,
    y = win.innerHeight || docElem.clientHeight || body.clientHeight;
  if (x < y) {
    document.querySelector("body").style.fontSize = "3em";
    document.querySelectorAll(".device_container").forEach((el) => {
      el.style.gridTemplateRows = "auto 1fr";
      el.style.gridTemplateColumns = "1fr";
    });
  } else {
    document.querySelector("body").style.fontSize = "1em";
    document.querySelectorAll(".device_container").forEach((el) => {
      el.style.gridTemplateRows = "1fr";
      el.style.gridTemplateColumns = "auto 1fr";
    });
  }
}
