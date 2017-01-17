<?php

namespace Controller;

use \W\Controller\Controller;
use Model\RecipeModel;



class RecipeController extends Controller
{
  public function display(){

    //Verification qu'un $_POST est envoyer
    if (!empty($_POST['search_bar'])) {
      echo 'bonjour';
      var_dump($_POST);
      var_dump($_SESSION);

      //Instance du model Recipe
      $recipeModel = new RecipeModel();

      //utilisation de la method findRecipe
      $recipeModel -> findRecipe();

    }

    $this->show('recipe/recipe_display');

  }

}
