$(function () {


  //Preparation pour l'autocompletion
  $('.input_search').on('keyup submit',function(e) {

    e.preventDefault();
    //On stock les données du formulaire dans une variable
    var datas = $(this).serializeArray();
    //On appel une function pour formater les datas en JSON
    var formatData = formatDatasJson(datas);
    //On appel la function AJAX pour recuperé les resultat
    autoComple(formatData);

    //Vider la liste du panier si aucun element n'est present dans l'input
    if ($('.input_search').val() === "") {
      $('.auto_complete').children().remove();
      $('.auto_complete').removeClass('block');
    }
  });

  $('.search_bar').on('submit', function (e) {

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
    $('.auto_complete').children().remove();
    $('.auto_complete').removeClass('block');
  });

  //Function AJAX pour chercher les recette par ingredient
  $('.panier').on('submit', function(e) {

    e.preventDefault();
    //On stock les données du formulaire dans une variable
    var datas = $(this).serializeArray();
    //Ajouter la function qui gere l'AJAX
    recipeFind(datas);
  });

  //Recuperation du button pour vider le panier
  $('.delete_panier').on('click', function(e) {
    e.preventDefault();
    //Delete des freres, soit les ingredients ajouter en Ajax dans le panier
    $('.liste_ing_select').children().remove();
  });

  //Partie pour l'ajout au favoris
  $('.add_favoris').on('submit', function(e) {
    e.preventDefault();
    //On stock les données du formulaire dans une variable
    var datas = $(this).serializeArray();
    //Appel de la function AJAX
    addFavori(datas);
  });
});

//Function Ajax pour l'autocompletion
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
          $('.auto_complete').removeClass('block');
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
    url : 'http://fond-de-placard.local/recipe_ajaxFind',
    data : credentials,
    success : function(response) {
        //Si la reponse est true on appel la function
        if (response.success) {
          //Création d'une variable pour simplifier la lisibilité
          var ingredient = response.ingredient;
          //Exec d'une boucle pour séparé les valeurs
          for (var i = 0; i <ingredient.length; i++) {
            //Verification que le panier ne contient pas deja l'ingredients
            if (!$('input[value="'+ingredient[i]['id']+'"]').length) {
              //Verification que le panier ne contient pas plus de 6 ingredients
              if ( $('.liste_ing_select').children('p').length <= 5 ) {
                $('.liste_ing_select').append(
                  '<p>'
                  + '<label>'
                  + ingredient[i]['ing_name']
                  + '</label>'
                  + '<input type="hidden" name="mp_ing[]" value= "'
                  + ingredient[i]['id']
                  + '" >'
                  + '<i class="fa fa-times" aria-hidden="true"></i>'
                  + '</p>');
                // Suppression des ingrédients
                $(".fa-times").click(function() {
                  $(this).parent().remove();
                });
              }
            }
          }
        }
      }
    });
  }

//Requete pour trouver les recipe
var recipeFind = function(credentials) {

  $.ajax({
    method : 'POST',
    url : 'http://fond-de-placard.local/recipe_ajaxFindRecipe',
    data : credentials,
    success : function(response) {

      if (response.success) {

        var list = response.list;

        for (var i = 0; i < list.length; i++) {

          if (list[i]['rec_type'] === "entree") {

            $('.form_starter').children().remove();
            $('.form_starter').append(
              "<p class='card_recipe'>"
              + "<label for='"
              + list[i]['rec_name']
              + "'>"
              + list[i]['rec_name']
              + "</label>"
              + "<input type='hidden' name='RecipeId' value='"
              + list[i]['id']
              + "'>"
              + "<p>" + list[i]['rec_caption'] + "</p>"
              + "<button type='submit' name='"
              + list[i]['rec_name']
              + "'><i class='fa fa-eye' aria-hidden='true'></i></button>"
              + "</p>"
            );
          } else if (list[i]['rec_type'] === "plat") {

            $('.form_main_dish').children().remove();
            $('.form_main_dish').append(
              "<p class='card_recipe'>"
              + "<label for='"
              + list[i]['rec_name']
              + "'>"
              + list[i]['rec_name']
              + "</label>"
              + "<input type='hidden' name='RecipeId' value='"
              + list[i]['id']
              + "'>"
              + "<p>" + list[i]['rec_caption'] + "</p>"
              + "<button type='submit' name='"
              + list[i]['rec_name']
              + "'><i class='fa fa-eye' aria-hidden='true'></i></button>"
              + "</p>"
            );
          } else if (list[i]['rec_type'] === "dessert") {

            $('.form_dessert').children().remove();
            $('.form_dessert').append(
              "<p class='card_recipe'>"
              + "<label for='"
              + list[i]['rec_name']
              + "'>"
              + list[i]['rec_name']
              + "</label>"
              + "<input type='hidden' name='RecipeId' value='"
              + list[i]['id']
              + "'>"
              + "<p>" + list[i]['rec_caption'] + "</p>"
              + "<button type='submit' name='"
              + list[i]['rec_name']
              + "'><i class='fa fa-eye' aria-hidden='true'></i></button>"
              + "</p>"
            );
          }
        }
      }
    }
  });
}

//Requete AJAX pour l'ajout des favoris
var addFavori = function(credentials) {

  $.ajax({
    method : 'POST',
    url : 'http://fond-de-placard.local/recipe_ajaxAddFavoris',
    data : credentials,
    success : function(response) {
      if (response.favoris) {
        console.log('bisous Mon Nounours !');
      } else {
        console.log('fail');
      }
    }
  });
}


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
