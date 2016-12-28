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
    // On met dans une variable la valeur de l'input
    var liste = $(this).val();
    // On récupère le nom de l'input
    var text = $(this).attr("name");
    // On vérifie si la checkbox est checkée
    if ($(this).prop('checked')) {
      // Si oui, on regarde s'il existe déjà un li avec le [name] de l'input
      if ($('li').filter('.' + liste).length) {
        // Si oui on fait rien
      } else {
        // Sinon on en crée un
        $('<li>').html(text).appendTo('#basket').addClass(liste);
      }
      // Si l'input n'est pas check:
    } else {
      // On regarde s'il existe un li avec le [name]
      if ($('li').filter('.' + liste).length) {
        // Si oui on le supprime.
        $('.' + liste).remove();
      }
    }
  });

  function isEmpty (el) {
    return !$.trim(el.html())
 }

  if (isEmpty($('#basket'))) {
    $('#basket').addClass('none')
  } else {
    $('#basket').removeClass('.none')
  }
});
