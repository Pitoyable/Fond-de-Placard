$(document).ready(function () {

    // Home
  $(".card-div").hover(function () {
    $(this).children().last().slideToggle("slow");
  });

  // overlay
  $("#connect_button").click(function () {
    $("#overlay").addClass("flex");
  })
  $("#close").click(function () {
    $("#overlay").removeClass("flex");
  })

  // Formulaire de connexion/inscription
  $(".email-signup").hide();

  $("#signup-box-link").click(function(){
    $(".email-login").fadeOut(100);
    $(".email-signup").delay(100).fadeIn(100);
    $("#login-box-link").removeClass("active");
    $("#signup-box-link").addClass("active");
  });
  $("#login-box-link").click(function(){
    $(".email-login").delay(100).fadeIn(100);;
    $(".email-signup").fadeOut(100);
    $("#login-box-link").addClass("active");
    $("#signup-box-link").removeClass("active");
  });

  // Nav-tab
  $(".nav-a").click(function() {
    hide();
    $(this).addClass("active");
    var getId = $(this).attr("href");
    var blockId = $(getId);

    blockId.addClass("block");
  })

  function hide() {
    $(".nav-a").removeClass("active");
    $('.tabs').removeClass("block");
  }
})
