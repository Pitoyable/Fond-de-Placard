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


    //On appel la method AJAX pour ajouter un ingredient trouver au panier
    selectIng(formatDatas);
  })

  //Recuperation du fontAwesome et ajout de la function
  $('.delete_panier').click(function() {
    //Delete du parent
    $(this).remove().parent();
  });

});



//Function Ajax pour ajouter un ingredient trouver au panier
var selectIng = function(credentials) {

  $.ajax({
    method : 'POST',
    // Faire attention au route
    url : 'http://fond_de_placard.local/recette_ajax',
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
              $('.panier').append(
                '<p>'
                //Input name
                + '<input type= "texte" name="'
                + ingredient[i]['ing_name']
                + '" value= "'
                + ingredient[i]['ing_name']
                + '" >'
                //Le fontAwesome
                + '<i class="fa fa-times delete_panier" aria-hidden="true"></i>'
                //Input hidden
                + '<input type= "hidden" disabled name="'
                + ingredient[i]['ing_id']
                + '" value= "'
                + ingredient[i]['ing_id']
                + '" >'
                +'</p>').after($('.submitPanier'));
            }
          }
        }
      }
  });
}
