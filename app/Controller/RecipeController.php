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

  public function written() {

    //Affichage de la page
    $this->show('recipe/recipe_cree');

  }

  //Controller pour la recuperation des données AJAX
  public function findIngredient() {

    //On verifie que $_POST['search_bar']) n'est pas vide
    if (!empty($_POST['search_bar'])) {

      $model = new RecipeModel();
      $controller = new RecipeController();

      //On recupere les données renvoyer par autoFindIngredient();
      $data = $model -> findIngredient();

      //On revoie les données obtenue
      $controller -> showJson($data);
    }

  }

  //Controller pour la recuperation des données AJAX
  public function autoComplete() {

    //On verifie que $_POST['search_bar']) n'est pas vide
    if (!empty($_POST['search_bar'])) {

      $model = new RecipeModel();
      $controller = new RecipeController();

      //On recupere les données renvoyer par autoFindIngredient();
      $data = $model -> autoFindIngredient();

      //On revoie les données obtenue
      $controller -> showJson($data);
    }
  }

}
