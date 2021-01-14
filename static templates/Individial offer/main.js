var toggle = document.querySelector("#theme");
var df = localStorage.getItem("theme");

function toggleTheme() {
  var icon = document.querySelector("#th_ico");
  if (toggle.getAttribute("href").indexOf("dark") != -1) {
    toggle.setAttribute(
      "href",
      "https://unpkg.com/vue-material/dist/theme/default.css"
    );
    icon.innerHTML = "nights_stay";
  } else {
    toggle.setAttribute(
      "href",
      "https://unpkg.com/vue-material/dist/theme/default-dark.css"
    );
    icon.innerHTML = "wb_sunny";
  }
}

Vue.use(VueMaterial.default);

var app = new Vue({
  el: "#app",
  data: {},
});
