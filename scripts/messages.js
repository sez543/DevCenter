const update_messages = (from, to, post) => {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      $(".chat").html(this.responseText);
    }
  };
  xmlhttp.open("POST", "./utilities/async/fetch_messages.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xmlhttp.send("from=" + from + "&to=" + to + "&post=" + post);
};

$(".chat").ready(() => {
  document
    .querySelector(".chat")
    .scrollTo(0, document.querySelector(".chat").scrollHeight);
});

var input = document.getElementById("message");
input.addEventListener("keydown", function (e) {
  e = e || window.event;
  var keyCode = e.keyCode || e.which;
  if (keyCode == 13) {
    $("#btn").click();
  }
});

var arr = $("#btn")
  .attr("onclick")
  .replace("send_message", "")
  .replace("(", "")
  .replace(")", "")
  .split(",");

setInterval(function () {
  update_messages(eval(arr[0]), eval(arr[1]), eval(arr[2]));
}, 15000);

const send_message = (from, to, post) => {
  var message = $("#message").val();
  $("#message").val("");
  var opp = $(".chat li:last-of-type");
  var opp1 = opp;
  if (opp.length == 0) {
    opp = "other";
  } else {
    if (opp.attr("class").indexOf("me") != -1) {
      opp = "me";
    } else {
      opp = "other";
    }
  }
  if (message.length <= 0) {
    $("#error").fadeIn(500);
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        if (opp1.length == 0){
          $(".chat").html(this.responseText);
        }else{
        if (opp == "me") {
          $(".chat-body").append(this.responseText);
        } else {
          $(".chat").append(this.responseText);
        }
      }
        document
          .querySelector(".chat")
          .scrollTo(0, document.querySelector(".chat").scrollHeight);
      }
    };
    xmlhttp.open("POST", "./utilities/async/send_message.php", true);
    xmlhttp.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xmlhttp.send(
      "message=" +
        message +
        "&from=" +
        from +
        "&to=" +
        to +
        "&post=" +
        post +
        "&opp=" +
        opp
    );
  }
};
