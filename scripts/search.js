var down = false;
const drop = () => {
  if (down) {
    $(".dropdown").css("display", "none");
    down = false;
  } else {
    $(".dropdown").css("display", "block");
    down = true;
  }
};

const tile = $(".tile").first();

var typingTimer;

const AddTimer = () => {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(search, 200);
};

const ClearTimer = () => {
  clearTimeout(typingTimer);
};

const search = () => {
  $(".sub-loading").css("display", "flex");
  // Fetch data
  const main = $("#main").val();
  const min = $("#min").val();
  const max = $("#max").val();
  const user = $("#user").val();
  var e = document.querySelector("#date");
  var date = e.options[e.selectedIndex].value;
  var s = document.querySelector("#sort");
  var sort = s.options[s.selectedIndex].value;
  var o = document.querySelector("#order");
  var order = o.options[o.selectedIndex].value;
  $(".scroll").empty();

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var currency = "лв."
      var posted_on = "Публикуванa на: ";
      if (document.querySelector("#lang").innerHTML=="BG"){
        currency = "$";
        posted_on = "Posted on: ";
      }
      var response = JSON.parse(this.response);
      for (var i in response) {
        tile.find("img").attr("src", response[i].image);
        tile.find(".u").attr("href", "user.php?id=" + response[i].author_id);
        tile.find(".a").html(response[i].author);
        tile.find(".m").html(response[i].mail);
        tile.find(".t").html(response[i].Title);
        tile.find(".r").html(response[i].Reward + currency);
        tile.find(".d").html(posted_on + response[i].Date);
        tile.find(".l").attr("href", "./post.php?id=" + response[i].id);
        $(".scroll").append(
          "<div class='md-card tile border border-light view overlay md-theme-default'>" +
            tile.html() +
            "</div>"
        );
      }
    }
  };
  xmlhttp.open(
    "GET",
    "./utilities/async/fetch_posts.php?main=" +
      main +
      "&date=" +
      date +
      "&min=" +
      min +
      "&max=" +
      max +
      "&sort=" +
      sort +
      "&order=" +
      order +
      "&user=" +
      user,
    true
  );
  xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xmlhttp.send();
  setTimeout(removeLoader2, 200);
};
