$(function () {


  //Preparation des données recuperé du formulaire
  $('.email-signup').on('submit', function (e) {

    //Retrait du comportement par defaul du formulaire
    e.preventDefault();

    //On stock les données du formulaire dans une variable
    var datas = $(this).serializeArray();

    //On appel une function pour formater les datas en JSON
    var formatData = formatDatasJson(datas);

    signUp(formatData);
  });

  var signUp = function(credentials){
    $.ajax({
      method : "POST",
      url : 'http://fond-de-placard.local/utilisateur_inscription',
      data : credentials,
      success : function(response){
        if (response.success){
          console.log('good');
        } else{
          $('#error').append(
            '<p>'+response.error+'</p>');
        }
      }
    });
  };
});