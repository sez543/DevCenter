const send_comment = (post) => {
  var comment = $("#message").val();
  if (comment.length == 0) {
    $("#error").fadeIn(1000);
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var comment = "коментара";
        if (document.querySelector("#lang").innerHTML=="BG"){
          comment = "comments";
        }
        var count = $(".body_com #cmt").length;
        if (count == 0) {
          $(".body_com").html(
            "<div id='count' class='card-header border-0 font-weight-bold'>1 " + comment + "</div>"
          );
        } else {
          count++;
          $("#count").html(count + " " + comment);
        }
        $(".body_com").append(this.responseText);
      }
    };
    xmlhttp.open("POST", "./utilities/async/post_comment.php", true);
    xmlhttp.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xmlhttp.send("post=" + post + "&comment=" + comment);
    $("#message").val("");
  }
};

var input = document.getElementById("message");
if (input != undefined) {
  input.addEventListener("keydown", function (e) {
    e = e || window.event;
    var keyCode = e.keyCode || e.which;
    if (keyCode == 13) {
      $("#btn").click();
    }
  });
}

const send_rating = (rating, comment) => {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var response = JSON.parse(this.response);
      $(".comment-" + comment + " .count:first-of-type").html(response.Likes);
      $(".comment-" + comment + " .count:last-of-type").html(response.Dislikes);
      $(".comment-" + comment + " .ib")
        .removeClass("sel_r")
        .removeClass("sel_g");
      if (rating == "like") {
        $(".comment-" + comment + " .ib:first-of-type")
          .addClass("sel_g")
          .removeAttr("onclick")
          .attr("onclick", "unsend_rating(" + comment + ")");
        $(".comment-" + comment + " .ib:last-of-type")
          .removeAttr("onclick")
          .attr("onclick", "send_rating('dislike'," + comment + ")");
      } else {
        $(".comment-" + comment + " .ib:last-of-type")
          .addClass("sel_r")
          .removeAttr("onclick")
          .attr("onclick", "unsend_rating(" + comment + ")");
        $(".comment-" + comment + " .ib:first-of-type")
          .removeAttr("onclick")
          .attr("onclick", "send_rating('like'," + comment + ")");
      }
    }
  };
  xmlhttp.open("POST", "./utilities/async/rate_comment.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xmlhttp.send("rating=" + rating + "&comment=" + comment);
};

const unsend_rating = (comment) => {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var response = JSON.parse(this.response);
      $(".comment-" + comment + " .count:first-of-type").html(response.Likes);
      $(".comment-" + comment + " .count:last-of-type").html(response.Dislikes);
      $(".comment-" + comment + " .ib")
        .removeClass("sel_r")
        .removeClass("sel_g")
        .removeAttr("onclick");
      $(".comment-" + comment + " .ib:first-of-type").attr(
        "onclick",
        "send_rating('like'," + comment + ")"
      );
      $(".comment-" + comment + " .ib:last-of-type").attr(
        "onclick",
        "send_rating('dislike'," + comment + ")"
      );
    }
  };
  xmlhttp.open("POST", "./utilities/async/remove_rating.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xmlhttp.send("comment=" + comment);
};

const delete_comment = (comment) => {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      var be_the_first = "Бъдете първият, публикувал коментар";
      var comment_ui = "коментара";
      if (document.querySelector("#lang").innerHTML=="BG"){
        be_the_first = "Be the first to leave a comment";
        comment_ui = "comments";
      }
      if (this.responseText != "error") {
        $(".comment-" + comment)
          .parent()
          .parent()
          .remove();
      }
      var count = $(".body_com #cmt").length;
      if (count == 0) {
        $(".body_com").html(
          "<div id='count' class='card-header border-0 font-weight-bold'>" + be_the_first + "</div>"
        );
      } else {
        $("#count").html(count + " " + comment_ui);
      }
    }
  };
  xmlhttp.open("POST", "./utilities/async/delete_comment.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xmlhttp.send("comment=" + comment);
};
