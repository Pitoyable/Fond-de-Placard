$(function () {

  //Preparation pour l'auto complementation
  $('.input_search').on('keyup submit',function() {

    //On stock les données du formulaire dans une variable
    var datas = $(this).serializeArray();

    //On appel une function pour formater les datas en JSON
    var formatData = formatDatasJson(datas);

    //On appel la function AJAX pour recuperé les resultat
    autoComple(formatData);

  });

  //Preparation des données recuperé du formulaire
  $('.search_bar').on('submit', function (e) {

    //Retrait du comportement par defaul du formulaire
    e.preventDefault();

    //On stock les données du formulaire dans une variable
    var datas = $(this).serializeArray();

    //On appel une function pour formater les datas en JSON
    var formatData = formatDatasJson(datas);

    //On appel la method AJAX pour ajouter un ingredient trouver au panier
    selectIng(formatData);

    //Remplacement de la valeur de l'input
    $('.input_search').val("");

    //Suppression de la liste existante ainsi que suppresion de la classe block
    $('.auto_complete').children().remove().removeClass('block');

  });

  //Recuperation du button pour vider le panier
  $('.delete_panier').on('click', function(e) {

    e.preventDefault();
    //Delete des freres, soit les ingredients ajouter en Ajax dans le panier
    $(this).siblings().remove();

  });

  $('.panier').on('submit', function(e) {

    //Retrait du comportement par defaul du formulaire
    e.preventDefault();

    //On stock les données du formulaire dans une variable
    var datas = $(this).serializeArray();

    //On appel une function pour formater les datas en JSON
    var formatData = formatDatasJson(datas);

    //Ajouter la function qui gere l'AJAX
  });
});

//Function Ajax pour l'autocomplementation
var autoComple = function(credentials) {

  $.ajax({
    method : 'POST',
    url : 'http://fond-de-placard.local/recipe_ajaxComplete',
    data : credentials,
    success : function(response) {
      if (response.success) {

        //Création d'une variable pour simplifier la lisibilité
        var ingredient = response.ingredient;

        //Suppression de la liste existante
        $('.auto_complete').children().remove();

        //Exec d'une boucle pour séparé les valeurs
        for (var i = 0; i < ingredient.length; i++) {
          //Verification des données reçu
          if (ingredient[i]['id'] && ingredient[i]['ing_name']) {
            //Ajout de la liste
            $('.auto_complete').append(
              '<li class="auto_ing">'
              + ingredient[i]['ing_name']
              + '</li>');
              //Ajout de la classe Block pour le design
              $('.auto_complete').addClass('block');
          }
        }

        //Ajout d'un click sur la liste pour envoyer la valeur dans le champ de texte
        $('.auto_ing').on('click', function(e) {
          var text = $(this).text();
          $(".input_search").val(text);

          //Suppression de la liste existante
          $('.auto_complete').children().remove();
        })
      //Ajout d'une function si la requete echoue
      } else {
        console.log('false');
      }
    }
  })
};
//Function Ajax pour ajouter un ingredient trouver au panier
var selectIng = function(credentials) {

  $.ajax({
    method : 'POST',
    // Faire attention au route
    url : 'http://fond-de-placard.local/recipe_ajaxComplete',
    data : credentials,
    success : function(response) {
        //Si la reponse est true on appel la function
        if (response.success) {

          //Création d'une variable pour simplifier la lisibilité
          var ingredient = response.ingredient;

          //Exec d'une boucle pour séparé les valeurs
          for (var i = 0; i <ingredient.length; i++) {

            if (ingredient[i]['id'] && ingredient[i]['ing_name']) {

              //Condition pour ne pas dupliquer les ingredients à revoir
              //if ($(".panier_add input[name = '"+ingredient[i]['ing_name']+"']") == true) {

                //Un peu tricky sur l'ecriture, revenir dessus plus tard pour faire sa plus proprement !
                $('.liste_ing_select').append(
                  '<p>'
                  + '<label>'
                  + ingredient[i]['ing_name']
                  + '</label>'
                  + '<input type="hidden" name="mp_ing[]" value= "'
                  + ingredient[i]['id']
                  + '" >'
                  + '</p>');
              //}
            }
          }
        //Ajout d'une function si la requete echoue
        } else {
          console.log('false auto');
        }
      }
  });
}

//Requete pour trouver les recipe
// var recipeFind = function(credentials) {
//
//   $.ajax({
//     method : 'POST',
//     url : '',
//     data : credentials,
//     success : function(response) {
//
//     }
//
//   });
// }

//Création de la function pour formater les data en JSON
var formatDatasJson = function(datas) {

  //On prepare le JSON
  var formatDatas = {};

  //On boucle les données pour les stockées dans un tableau
  for (var i = 0; i < datas.length; i++) {
    formatDatas[datas[i]['name']] = datas[i]['value'];
  }

  //On return le resultat
  return formatDatas;

}
