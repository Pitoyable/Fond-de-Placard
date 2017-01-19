<?php

namespace Controller;

use \W\Controller\Controller;
use Model\RecipeModel;



class RecipeController extends \W\Controller\Controller
{

  public function display(){

    // //Partie pour l'autocompletion des ingredients
    // if (condition) {
    //   # code...
    // }
    // $credentials = array(
    //   "ingredient" => $_POST['search_bar']
    // );
    //
    // var_dump($credentials);
    //Partie pour trouver l'ingredients en BDD
    if (!empty($_POST['search_bar'])) {

      //Instance du Model RecipeModel
      $modelRecipe = new RecipeModel();

      //Appel de la method findIngredient et recuperation du resultat
      $ingFind = $modelRecipe -> findIngredient();

      //Verification que $ingFind est true avent d'appeler la method addIngPanier();
      if ($ingFind) {

      }
    }

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

}
