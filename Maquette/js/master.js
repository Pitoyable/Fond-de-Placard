$(function () {

  $(".dropbtn").click(function () {
    $(this).siblings().slideToggle()
  });

  // $('.content-btn').click(function () {
  //
  //     var valeurs = [];
  //
  //     $( "input:checkbox:checked" ).each(function() {
  //       valeurs.push($(this).val());
  //       console.log(valeurs[valeurs.length-1])
  //       var liste = valeurs[valeurs.length-1]
  //       $('<li>').html(valeurs).appendTo('.ingredient-list');
  //     });
  // });

  function checked() {
    if ($( "input:checkbox:checked" )) {
      var liste = $( "input:checkbox:checked" ).val();
      $('<li>').html(liste).appendTo('.ingredient-list');
      console.log(liste);
    }
  }

  $('input').click(function() {
    checked()
  });
});
