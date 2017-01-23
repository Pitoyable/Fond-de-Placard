<?php
namespace Model;

use \W\Model\Model;

class RecipeModel extends \W\Model\Model
{


  public function findIngredient() {

    //Initialisation du model RecipdeModel
    $model = new RecipeModel();

    //Creation d'un tableau pour la method search();
    $array = array(
      "ing_name" => $_POST['search_bar'],
    );

    //Utilisation de la method setTable() pour chercher dans la table ingredients
    $model -> setTable('ingredients');

    //Utilisation de la method search()
    $ingFind = $model -> search($array);

    header('Content-Type: application/json');

    //Je formate la reponse en JSON
    echo json_encode(array(
      "success" => true,
      "ingredient" => $ingFind
    ));

  }


  //Method pour l'auto complementation des ingredients (AJAX)
  public function autoFindIngredient() {

    //Initialisation du model RecipdeModel
    $model = new RecipeModel();

    ////Creation d'un tableau pour la method search();
    $array = array(
      "ing_name" => $_POST['search_bar'],
    );

    //Utilisation de la method setTable() pour chercher dans la table ingredients
    $model -> setTable('ingredients');

    //Utilisation de la method search()
    $ingFind = $model -> search($array);

    header('Content-Type: application/json');

    //Je formate la reponse en JSON
    echo json_encode(array(
      "success" => true,
      "ingredient" => $ingFind
    ));
  }


  //Trouver les recettes avcec les ingredients prensent dans le panier
  public function findRecipe() {

    //Recuperation des ingredients du panier

    //Trouver les recettes en fonction des ingredients

    //Stockage dans un tableau des resultats

      //Si la recette return est une entré, stockage dans un tableau entrée

        //Envoie ensuite dans une requete AJAX pour l'afficher sur la page?

      //Si la recette return est une plat, stockage dans un tableau plat

        //Envoie ensuite dans une requete AJAX pour l'afficher sur la page?

      //Si la recette return est une dessert, stockage dans un tableau dessert

        //Envoie ensuite dans une requete AJAX pour l'afficher sur la page?

    //Envoyer la liste des recettes vers un function de tri?

  }




}
