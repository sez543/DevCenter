const sendform = () => {
  const form = document.querySelector("#register");
  if (form.checkValidity()) {
    form.addEventListener("click", function (event) {
      event.preventDefault();
    });
    const email = document.querySelector("#defaultRegisterFormEmail");
    const phone = document.querySelector("#defaultRegisterPhonePassword");

    var value_mail = email.value;
    var value_phone = phone.value;
    var mail_istaken = "false";
    var phone_istaken = "false";

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        result = this.responseText.split(" ");
        mail_istaken = result[0];
        phone_istaken = result[1];
        if (mail_istaken == "true") {
          $("#mail_error").fadeIn(1000);
          document
            .querySelector("#defaultRegisterFormEmail")
            .setAttribute("style", "margin-bottom: 10px!important");
        }
        if (phone_istaken == "true") {
          $("#phone_error").fadeIn(1000);
          document
            .querySelector("#defaultRegisterPhonePassword")
            .setAttribute("style", "margin-bottom: 10px!important");
        }
        if (phone_istaken == "false" && mail_istaken == "false") {
          form.submit();
        }
      }
    };
    xmlhttp.open(
      "GET",
      "./utilities/async/check_repetitions.php?mail=" +
        value_mail +
        "&phone=" +
        value_phone,
      true
    );
    xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xmlhttp.send();
  }
};
