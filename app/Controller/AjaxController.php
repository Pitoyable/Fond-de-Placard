<?php

use \W\Controller\Controller;
use Model\RecipeModel;

class AjaxController
{

  public function findIngredient() {

    // $credentials = array(
    //   "ingredient" => $_POST['search_bar']
    // );
    //
    //
    // //Partie pour trouver l'ingredients en BDD
    // if (!empty($credentials['ingredient'])) {
    //
    //   //Instance du Model RecipeModel
    //   $modelRecipe = new RecipeModel();
    //
    //   //Appel de la method findIngredient et recuperation du resultat
    //   $ingFind = $modelRecipe -> findIngredientBdd();
    //
    //
    //
    //
    // }

    //Je renvois une reponse JSON
    header('Content-Type: application/json');

    //Je formate la reponse en JSON
    echo json_encode(array(
      "success" => true,
      "bisous" => 'bisous'
    ));



  }

}
