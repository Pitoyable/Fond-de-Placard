$(function () {

  //Preparation des données recuperé du formulaire
  $('.search_bar').on('submit', function (e) {

    //Retrait du comportement par defaul du formulaire
    e.preventDefault();

    //On stock les données du formulaire dans une variable
    var datas = $(this).serializeArray();

    //On prepare le JSON
    var formatDatas = {};

    //On boucle les données pour les stockées dans un tableau
    for (var i = 0; i < datas.length; i++) {
      formatDatas[datas[i]['name']] = datas[i]['value'];
    }

    console.log(formatDatas);

    //On appel la method AJAX
    selectIng(formatDatas);
  })

});

var selectIng = function(credentials) {

  $.ajax({
    method : 'POST',
    url : 'http://localhost/Fond-de-Placard/app/Controller/RecipeController.php',
    data : credentials
  });

}
