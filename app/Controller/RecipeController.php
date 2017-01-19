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

      //Utilisation de la method findIngredient et recuperation du resultat
      $ingFind = $modelRecipe -> findIngredient();

      //Verification que $ingFind est true avent d'appeler la method addIngPanier();
    }

    //Affichage de la page
    $this->show('recipe/recipe_display');

  }

}
