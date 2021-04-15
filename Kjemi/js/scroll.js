const links = document.querySelectorAll("a");
 
for (const link of links) {
  link.addEventListener("click", clickHandler);
}
 
function clickHandler(e) {
  e.preventDefault();
  const href = this.getAttribute("href");
  const offsetTop = document.querySelector(href).offsetTop - 90;
 
  scroll({
    top: offsetTop,
    behavior: "smooth"
  });
}