$(function () {


  //Preparation des données recuperé du formulaire (inscription)
  $('.email-signup').on('submit', function (e) {

    //Retrait du comportement par defaul du formulaire
    e.preventDefault();

    //On stock les données du formulaire dans une variable
    var datas = $(this).serializeArray();
    //On appel une function pour formater les datas en JSON
    var formatData = formatDatasJson(datas);

    signUp(formatData);
  });

  //Preparation des données recuperé du formulaire (connexion)
  $('.email-login').on('submit', function (e) {

    //Retrait du comportement par defaul du formulaire
    e.preventDefault();

    //On stock les données du formulaire dans une variable
    var datas = $(this).serializeArray();

    //On appel une function pour formater les datas en JSON
    var formatData = formatDatasJson(datas);

    login(formatData);
  });

  //Preparation des données recuperé du formulaire (mise à jour)
  $('.form_update_user').on('submit', function (e) {

    //Retrait du comportement par defaul du formulaire
    e.preventDefault();

    //On stock les données du formulaire dans une variable
    var datas = $(this).serializeArray();

    //On appel une function pour formater les datas en JSON
    var formatData = formatDatasJson(datas);

    update(formatData);
  });


});

  var signUp = function(credentials){
    $.ajax({
      method : "POST",
      url : 'http://fond-de-placard.local/utilisateur_inscription',
      data : credentials,
      success : function(response){
        if (response.success){
          //redirection sur la page j'ai faim
           window.location.assign("http://fond-de-placard.local/recette_afficher");
        } else{
          //message d'erreur
          $('#error').append(
            '<p>'+response.error+'</p>');
        }
      }
    });
  };
  var login = function(credentials){
    $.ajax({
      method : "POST",
      //redirection sur la page j'ai faim
      url : 'http://fond-de-placard.local/utilisateur_connexion',
      data : credentials,
      success : function(response){
        if (response.success){
          window.location.assign("http://fond-de-placard.local/recette_afficher");

        } else{
          //message d'erreur
          $('#error').append(
            '<p>'+response.error+'</p>');
          }
        }
    });
  };
  var update = function(credentials){
    $.ajax({
      method : "POST",
      url : 'http://fond-de-placard.local/utilisateur_mise_a_jour',
      data : credentials,
      success : function(response){
        if (response.success){
          //redirection sur la page mon compte
          window.location.assign("http://fond-de-placard.local/utilisateur_afficher");
        } else{
          //message d'erreur
          $('#erreurMonCompte').append(
            '<p>'+response.error+'</p>');
        }
      }
    });
  };
