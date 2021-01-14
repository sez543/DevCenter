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

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      $("#clear").html(this.responseText);
    }
  };
  xmlhttp.open(
    "GET",
    "./utilities/async/fetch_users.php?main=" +
    main,
    true
  );
  xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xmlhttp.send();
  setTimeout(removeLoader2, 200);
};