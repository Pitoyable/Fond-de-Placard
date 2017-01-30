<?php

namespace Controller;

use \W\Controller\Controller;
use Model\RecipeModel;


class RecipeController extends Controller
{

  public function display() {

    $this->show('recipe/recipe_display');
  }

  public function written() {

    $model = new RecipeModel();

    //On recupere et on traite les different themes
    $listTheme = $model -> createThemeList();

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
      //On verifie que le nom n'est pas deja utilisé
      if ($model -> recipeNameExists($_POST['nom'])) {

        $idRecipeAdd = $model -> addRecipeBdd();
        if (!empty($idRecipeAdd['id'])) {

          $model -> addIngUserRecipeBdd($idRecipeAdd['id']);
          $model -> checkThemeSelectedRecipe($idRecipeAdd['id']);
          $idRecipe = $model -> searchRecipeLastInsert($idRecipeAdd['id']);

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

  //Controller pour trouver une recette dans j'ai faim
  public function findRecipe() {

    $controller = new RecipeController();
    $model = new RecipeModel();
    $data = $model -> findRecipe();
    //On revoie les données obtenue
    $controller -> showJson($data);
  }

  //Controller pour afficher la recette selectionner
  public function showRecipe() {

    $model = new RecipeModel();
    $recipeSelected = $model -> showRecipe();

    $this->show('recipe/recipe_show',
      ['recipeName' => $recipeSelected['rec_name'],
      'recipeType' => $recipeSelected['rec_type'],
      'recipeId' => $recipeSelected['id'],
      'recipeHtml' => $recipeSelected['rec_html']]
    );
  }

  //Controller pour l'ajout des favoris
  public function addFavoris() {

    $model = new RecipeModel();
    $controller = new RecipeController();
    //Verification du favoris
    $checkFav = $model -> checkFavoris();
    $model -> setTable('comment');

    //Verification si le favoris exist
    if (is_null($checkFav)) {
      //Création du favoris
      $addFav = $model -> addFavoris();

    //S'il la valeur est 1, on la passe à 0, se qui correspond au retrait de favoris
    } elseif ($checkFav['com_fav'] == 1) {
      //Création d'un tableau pour insert()
      $array = array(
        "com_fav" => 0
      );

      $model -> update($array, $checkFav['id']);
      $addFav = array(
        "success" => true,
        "favoris" => false
      );

    //S'il la valeur est 0, on la passe à 1, se qui correspond à l'ajout du favoris
    } elseif ($checkFav['com_fav'] == 0) {
      //Création d'un tableau pour insert()
      $array = array(
        "com_fav" => 1
      );

      $model -> update($array, $checkFav['id']);
      $addFav = array(
        "success" => true,
        "favoris" => true
      );
    }


    $controller -> showJson($addFav);
  }

}
