try {
  var original = $("#rt").html();
  original = original.substring(0, original.indexOf("/"));
  original = parseFloat(original);
} catch {}

var url_string = window.location.href; // www.test.com?filename=test
var url = new URL(url_string);
var paramValue = url.searchParams.get("id");

$(".rating").on("change", function (ev, data) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "0" || this.responseText == "1") {
        $("#rt").html(data.to + "/5 User Score");
        $(".rate-select-layer").css("color", "#448aff");
      } else {
        $(".rate-select-layer").css("color", "#448aff");
        var result =
          Math.round(((original + data.to) / this.responseText) * 10) / 10;
        $("#rt").html(result + "/5 User Score");
      }
    }
  };
  xmlhttp.open(
    "GET",
    "./utilities/async/add_rating.php?rating=" + data.to + "&user=" + paramValue,
    true
  );
  xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xmlhttp.send();
});
