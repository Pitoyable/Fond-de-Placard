<?php

namespace Controller;

use \W\Controller\Controller;
use Model\RecipeModel;



class RecipeController extends \W\Controller\Controller
{

  public function display(){

    if (!empty($_POST['search_bar'])) {

      //Instance du Model RecipeModel
      $modelRecipe = new RecipeModel();

      //Utilisation de la method findIngredient
      $modelRecipe -> findIngredient();

    }

    //Affichage de la page
    $this->show('recipe/recipe_display');

  }

}
