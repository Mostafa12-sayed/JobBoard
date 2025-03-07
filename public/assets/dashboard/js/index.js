var pathname = location.pathname;
var id = pathname.replace("/", "").replace(".html", "");
var element = document.getElementById(id);
if (element) {
  element.classList.add("active");
}
