<?php
namespace Model;

use \W\Model\Model;

class RecipeModel extends \W\Model\Model
{

  //Trouver l'ingredients rechercher et stockage dans $_SESSION['ingredients']
  public function findIngredient() {

    //Instance du Model RecipeModel Pour avoir accés au method de Model
    $model = new RecipeModel();


    //Creation d'un tableau pour la method search();
    $array = array(
      "ing_name" => $_POST['search_bar'],
    );

    //Utilisation de la method setTable() pour chercher dans la table ingredients
    $model -> setTable('ingredients');

    //Utilisation de la method search()
    $ingFind = $model -> search($array);

    return $ingFind;
  }

  //Method pour ajouter des ingredients au panier (AJAX)
  //Elle prend un argument, qui sera le resultat retourné par la method findIngredient
  public function addIngPanier($ingredient) {

    //Isolé l'ing_name de son id

    //Envoyer cette ingredients au Javascript

    //Le javascript l'insert dans le panier
  }


  //Method pour l'auto complementation des ingredients (AJAX)
  public function autoFindIngredient() {

  }


  //Trouver les recettes avcec les ingredients prensent dans le panier
  public function findRecipe() {


  }




}
