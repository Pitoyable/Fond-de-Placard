<?php
namespace Model;

use \W\Model\Model;

class RecipeModel extends \W\Model\Model
{


  public function findIngredient() {

    //Initialisation du model RecipdeModel
    $model = new RecipeModel();

    //Creation d'un tableau pour la method search();
    $array = array(
      "ing_name" => $_POST['search_bar'],
    );

    //Utilisation de la method setTable() pour chercher dans la table ingredients
    $model -> setTable('ingredients');

    //Utilisation de la method search()
    $ingFind = $model -> search($array);

    //Vérification que la requete est reussi
    if ($ingFind) {

      //On return les datas obtenue
      return $data = array(
        "success" => true,
        "ingredient" => $ingFind
      );

    }
  }

//Requete a lancer pour 'l'auto complete'
//SELECT *
// FROM ingredients
// WHERE ing_name LIKE 'd%'

  //Method pour l'auto complementation des ingredients (AJAX)
  public function autoFindIngredient() {

    //Initialisation du model RecipdeModel
    $model = new RecipeModel();

    //Utilisation de la method setTable() pour chercher dans la table ingredients
    $model -> setTable('ingredients');

    //Création de la requete SQL
    $sql = "SELECT * FROM ingredients WHERE ing_name LIKE '";
    //Limitation à 3 ingreedients renvoyer
    $sql .=  $_POST['search_bar'] . "%' LIMIT 3";

    $sth = $this->dbh->prepare($sql);
		$sth->execute();

		$ingFind = $sth->fetchAll();

    //Vérification que la requete est reussi
    if ($ingFind) {

      //On return les datas obtenue
      return $data = array(
        "success" => true,
        "ingredient" => $ingFind
      );

    }
    
  }


  //Trouver les recettes avcec les ingredients prensent dans le panier
  public function findRecipe() {

    //Recuperation des ingredients du panier

    //Trouver les recettes en fonction des ingredients

    //Stockage dans un tableau des resultats

      //Si la recette return est une entré, stockage dans un tableau entrée

        //Envoie ensuite dans une requete AJAX pour l'afficher sur la page?

      //Si la recette return est une plat, stockage dans un tableau plat

        //Envoie ensuite dans une requete AJAX pour l'afficher sur la page?

      //Si la recette return est une dessert, stockage dans un tableau dessert

        //Envoie ensuite dans une requete AJAX pour l'afficher sur la page?

    //Envoyer la liste des recettes vers un function de tri?

  }




}
