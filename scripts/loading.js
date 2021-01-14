$(window).on("load", function () {
  setTimeout(removeLoader, 200); //wait for page load PLUS two seconds.
});
function removeLoader() {
  $(".loading").fadeOut(500, function () {
    // fadeOut complete. Remove the loading div
    $(".loading").remove(); //makes page more lightweight
  });
}

$(".scroll").ready(function () {
  setTimeout(removeLoader2, 200); //wait for page load PLUS two seconds.
});
function removeLoader2() {
  $(".sub-loading").fadeOut(500, function () {
    // fadeOut complete. Remove the loading div
  });
}
