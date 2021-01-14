var toggle = document.querySelector("#theme");
var df = localStorage.getItem("theme");

function toggleTheme() {
  var str;
  var icon = document.querySelector("#th_ico");
  if (toggle.getAttribute("href").indexOf("dark") != -1) {
    str = "light";
    toggle.setAttribute("href", "styles/default-theme.css");
    icon.innerHTML = "nights_stay";
    $(".st8").css("fill", "var(--md-theme-default-background, #fff)");
    $(".st9").css("fill", "var(--md-theme-default-background, #fff)");
  } else {
    str = "dark";
    toggle.setAttribute("href", "styles/default-dark-theme.css");
    icon.innerHTML = "wb_sunny";
    $(".st8").css("fill", "var(--md-theme-default-background, #424242)");
    $(".st9").css("fill", "var(--md-theme-default-background, #424242)");
  }

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", "./utilities/async/change_theme.php?theme=" + str, true);
  xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xmlhttp.send();
}

Vue.use(VueMaterial.default);

var app = new Vue({
  el: "#app",
  data: {},
});
