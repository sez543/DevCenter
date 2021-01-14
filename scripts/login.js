const login = () => {
  const form = document.querySelector("#login");
  if (form.checkValidity()) {
    form.addEventListener("click", function (event) {
      event.preventDefault();
    });
    const email = document.querySelector("#defaultLoginFormEmail").value;
    const password = document.querySelector("#defaultLoginFormPassword").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        result = this.responseText;
        if (result == "false") {
          $("#login_error").fadeIn(1000);
        } else {
          form.submit();
        }
      }
    };
    xmlhttp.open("POST", "./utilities/async/check_login.php", true);
    xmlhttp.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xmlhttp.send("email=" + email + "&password=" + password);
  }
};
