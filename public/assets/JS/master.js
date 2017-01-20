$(document).ready(function () {

    // Home
  $(".card-div").hover(function () {
    $(this).children().last().slideToggle("slow");
  });
})
