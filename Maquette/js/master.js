$(function (){

  // On affiche la liste des ingrédients au click
  $('#vegetables').on('click', function () {
    $('.vegetables').toggle("slide");
  });

  $('#fruits').on('click', function () {
    $('.fruits').toggle("slide");
  });

  $('#meat').on('click', function () {
    $('.meat').toggle("slide");
  });

  $('input[type="checkbox"]').on("click", function () {
    var liste = $(this).val();
    var text = $(this).parents().Text();
    if ($(this).prop('checked')) {
      if ($('li').filter('.' + liste).length) {
      } else {
        $('<li>').html(text).appendTo('#basket').addClass(liste);
      }
    } else {
      if ($('li').filter('.' + liste).length) {
        $('.' + liste).remove();
      }
    }
  });
});
