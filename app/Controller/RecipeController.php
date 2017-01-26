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


    $model = new RecipeModel();

    //On recupere et on traite les different themes
    $model -> setTable('theme');
    $allTheme = $model -> findAll();
    $listTheme = $model -> createThemeList($allTheme);

    //On verifie que $_POST['search_bar']) n'est pas vide
    if (!empty($_POST['search_bar'])) {

      $controller = new RecipeController();

      //On recupere les données renvoyer par autoFindIngredient();
      $data = $model -> autoFindIngredient();

      //On revoie les données obtenue
      $controller -> showJson($data);
    }

    //Affichage de la page
    $this->show('recipe/recipe_cree', ['themes' => $listTheme]);

  }

  public function addWritten() {

    $model = new RecipeModel();
    $checkInfo = $model -> checkInfoRec();

    //verification des infos envoyer
    if ($checkInfo) {

      if ($model -> recipeNameExists($_POST['nom'])) {

        $idRecipeAdd = $model -> addRecipeBdd();
        if (!empty($idRecipeAdd['id'])) {

          $model -> addIngRecipeBdd($idRecipeAdd['id']);
          $model -> checkThemeSelectedRecipe($idRecipeAdd['id']);
          $idRecipe = $model -> addRecipe($idRecipeAdd['id']);

          if ($idRecipe) {
            $this->show('recipe/Recipe_addWritten',
            ['recipeName' => $idRecipe['rec_name'],
            'recipeType' => $idRecipe['rec_type'],
            'recipeHtml' => $idRecipe['rec_html']]);
          }
        }
      } else {
          $this->show('recipe/Recipe_addWritten', ['erreur' => 'Le nom de la recette est deja pris']);
      }
  
    } else {
      $this->show('recipe/Recipe_addWritten', ['erreur' => 'Veuillez remplir tous les champs']);
    }


    $this->show('recipe/Recipe_addWritten');
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

  //Controller pour trovuer une recette dans j'ai faim
  public function findRecipe() {

    $controller = new RecipeController();
    $model = new RecipeModel();
    $data = $model -> findRecipe();

    //On revoie les données obtenue
    $controller -> showJson($data);
  }

  public function showRecipe() {

    $model = new RecipeModel();
    $recipeSelected = $model -> showRecipe();


    $this->show('recipe/recipe_show',
      ['recipeName' => $recipeSelected['rec_name'],
      'recipeType' => $recipeSelected['rec_type'],
      'recipeHtml' => $recipeSelected['rec_html']]
    );

  }

}
