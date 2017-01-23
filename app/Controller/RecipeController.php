<?php

namespace Controller;

use \W\Controller\Controller;
use Model\RecipeModel;


class RecipeController extends Controller
{

  public function display() {

    //Affichage de la page
    $this->show('recipe/recipe_display');

  }

  //Controller pour la recuperation des données AJAX
  public function findIngredient() {

    if (!empty($_POST['search_bar'])) {

      $model = new RecipeModel();
      $model -> findIngredient();

    }

  }

  //Controller pour la recuperation des données AJAX
  public function autoComplete() {

    $model = new RecipeModel();
    $model -> autoFindIngredient();

  }

}
