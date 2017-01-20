<?php

namespace Controller;

use \W\Controller\Controller;
use Model\RecipeModel;


class RecipeController extends Controller
{

  public function display() {


    //Partie pour trouver une recette depuis les ingredients du panier
    if (!empty($_POST['search_recipe'])) {

      //instance du Model RecipeModel
      $modelRecipe = new RecipeModel();

      //Appel de la Method findRecipe()
      $recipeFind = $modelRecipe -> findRecipe();
    }

    //Affichage de la page
    $this->show('recipe/recipe_display');

  }

  public function findIngredient() {

    $model = new RecipeModel();
    $model -> findIngredient();
    
  }
}
