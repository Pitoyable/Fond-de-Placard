$(function () {

  //Preparation pour l'auto complementation
  $('.search_bar').keyup(function() {

    //On stock les données du formulaire dans une variable
    var datas = $(this).serializeArray();

    //On prepare le JSON
    var formatDatas = {};

    //On boucle les données pour les stockées dans un tableau
    for (var i = 0; i < datas.length; i++) {
      formatDatas[datas[i]['name']] = datas[i]['value'];
    }

  });

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


    //On appel la method AJAX pour ajouter un ingredient trouver au panier
    selectIng(formatDatas);


    //Recuperation du button pour vider le panier
    $('.delete_panier').on('click', function(e) {

      e.preventDefault();
      //Delete des freres, soit les ingredients ajouter en Ajax dans le panier
      $(this).siblings().remove();

    });
  });


});


//Function Ajax pour l'autocomplementation
var autoComple = function(credentials) {

  $.ajax({
    method : 'POST',
    url : 'http://fond_de_placard.local/recipe_ajaxComplete',
    data : credentials,
    success : function(response) {
      if (response.success) {
        console.log('winw');
      } else {
        console.log('loose');
      }
    }
  })
};
//Function Ajax pour ajouter un ingredient trouver au panier
var selectIng = function(credentials) {

  $.ajax({
    method : 'POST',
    // Faire attention au route
    url : 'http://fond_de_placard.local/recipe_ajaxComplete',
    data : credentials,
    success : function(response) {
        //Si la reponse est true on appel la function
        if (response.success) {

          //Création d'une variable pour simplifier la lisibilité
          var ingredient = response.ingredient;

          //Exec d'une boucle pour séparé les valeurs
          for (var i = 0; i <ingredient.length; i++) {

            if (ingredient[i]['ing_id'] && ingredient[i]['ing_name']) {
              //Ajout de input name et input text ainsi q'un font awesome
              //Un peu tricky sur l'ecriture, revenir dessus plus tard pour faire sa plus proprement !
              $('.panier_add').append(
                '<p>'
                //Input name
                + '<input type= "texte" name="'
                + ingredient[i]['ing_name']
                + '" value= "'
                + ingredient[i]['ing_name']
                + '" >'
                //Input hidden
                + '<input type= "hidden" disabled name="'
                + ingredient[i]['ing_id']
                + '" value= "'
                + ingredient[i]['ing_id']
                + '" >'
                + '</p>');
            }
          }
        }
      }
  });
}
