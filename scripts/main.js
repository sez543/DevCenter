var toggle = document.querySelector("#theme");
var df = localStorage.getItem("theme");

function toggleTheme() {
  var str;
  var icon = document.querySelector("#th_ico");
  if (toggle.getAttribute("href").indexOf("dark") != -1) {
    str = "light";
    toggle.setAttribute("href", "styles/default-theme.css");
    icon.innerHTML = "nights_stay";
  } else {
    str = "dark";
    toggle.setAttribute("href", "styles/default-dark-theme.css");
    icon.innerHTML = "wb_sunny";
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

const changeLanguage = () => {
  var str = document.querySelector("#lang").innerHTML;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      location.reload();
    }
  };
  xmlhttp.open("GET", "./utilities/async/change_language.php?lang=" + str, true);
  xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xmlhttp.send();
};
