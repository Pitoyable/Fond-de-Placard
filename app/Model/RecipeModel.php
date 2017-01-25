<?php
namespace Model;

use \W\Model\Model;

class RecipeModel extends \W\Model\Model
{

  //Variante de la function insert() du framework
  public function insertBDD(array $data, $stripTags = true) {

    $colNames = array_keys($data);
		//$colNamesEscapes = $this->escapeKeys($colNames);
		$colNamesString = implode(', ', $colNames);

		$sql = 'INSERT INTO ' . $this->table . ' (' . $colNamesString . ') VALUES (';
		foreach($data as $key => $value){
			$sql .= ":$key, ";
		}
		// Supprime les caractères superflus en fin de requète
		$sql = substr($sql, 0, -2);
		$sql .= ')';

		$sth = $this->dbh->prepare($sql);
		foreach($data as $key => $value){
			$value = ($stripTags) ? strip_tags($value) : $value;
			$sth->bindValue(':'.$key, $value);
		}

		if (!$sth->execute()){
			return false;
		} else {
		  return true;
		}
  }

  //Function pour traiter les données retourner par findAll() pour les themes
  public function createThemeList($argument) {

    //Creation d'une variable theme
    $theme = "";

    //On boucle pour parcourir les themes
    for ($i=0; $i < count($argument) ; $i++) {

      //On concatene les different themes
      $theme .= "<label for='" . $argument[$i]['the_name'] . "'>" . $argument[$i]['the_name'] . "<input type='checkbox' name='mp_checked[]' value='" . $argument[$i]['id'] . "'></label>";

    }

    //On return le resultat
    return $theme;
  }


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
    } else {
      return $data = array(
        "success" => false
      );
    }

  }

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
    } else {
      return $data = array(
        "success" => false
      );
    }

  }

  //Ajouter une recette
  public function addRecipe() {

    $model = new RecipeModel();

    //Verification des different champs et si l'utilisateur est connecter
    if (!empty($_POST['mp_ing']) && !empty($_POST['nom']) && !empty($_POST['type']) && !empty($_POST['recipe_content']) && !empty($_SESSION['user'])) {

      $array = array(
        "rec_name" => $_POST['nom'],
        "rec_html" => $_POST['recipe_content'],
        "rec_type" => $_POST['type']
      );

      //On definie la table à utiliser
      $model -> setTable('recipe');

      //On insert la recipe in BDD, on recupe son ID
      $idRecipe = $model -> insert($array, $stripTags = false);

      //Si l'insertion est reussi
      if ($idRecipe) {

        //On definie la table a utiliser
        $model -> setTable('link_rec_use');

        //On crée un tableau pour remplir la table 'link_rec_use'
        $array = array(
          "recipe_id" => $idRecipe['id'],
          "user_id" => $_SESSION['user']['id']
        );

        $model -> insertBDD($array);

        //On crée une boucle pour remplir la table 'link_ing_rec'
        for ($i=0; $i < count($_POST['mp_ing']) ; $i++) {

          //On definie la table a utiliser
          $model -> setTable('link_ing_rec');

          //On crée le tableau pour insert
          $array = array(
            "recipe_id" => $idRecipe['id'],
            "ingredients_id" => $_POST['mp_ing'][$i]
          );

          //On lance les differentes insert necessaire
          $model -> insertBDD($array);

        }

        //On verifie que $_POST['mp_checked'] existe
        if (isset($_POST['mp_checked'])) {

          //On verifie si aucun theme n'est selectionner
          if ($_POST['mp_checked'][0] == 'none') {

            echo 'aucun theme select';

          //Si un theme est selectionner
          } else {

            //On definie la table a utiliser
            $model -> setTable('link_rec_the');

            //On crée une boucle pour remplir la table 'link_rec_theme'
            for ($i=0; $i < count($_POST['mp_checked']) ; $i++) {

              //On crée le tableau pour insert
              $array = array(
                "recipe_id" => $idRecipe['id'],
                "theme_id" => $_POST['mp_checked'][$i]
              );

              //On lance les differentes insert necessaire
              $model -> insertBDD($array);

            }
          }
        }
      }
    } else {
      echo 'erreur';
    }
  }

  //Trouver les recettes avcec les ingredients prensent dans le panier
  public function findRecipe() {

    $model = new RecipeModel();
    $model -> setTable('link_ing_rec');

    //Preparation d'une tableau pour recuperé le resultat de la requete
    $arrayTemp = array();

    //Requete SQL Sans aucune protection
    $sql = "SELECT recipe_id AS id FROM link_ing_rec WHERE ingredients_id = " . $_POST['mp_ing'][0];

    //Condition en function du nombre d'ingredients dans le panier
    if (count($_POST['mp_ing']) > 1) {
      for ($i=1; $i < count($_POST['mp_ing']) ; $i++) {
        //Concatenation de la requete SQL
        $sql .= " AND recipe_id IN (  SELECT link_ing_rec.recipe_id FROM link_ing_rec WHERE ingredients_id = " . $_POST['mp_ing'][$i]  . ")";
      }
    }

    $sth = $this->dbh->prepare($sql);
		$sth->execute();
		$findRecipe = $sth->fetchAll();

    //Changemetn de la table
    $model -> setTable('recipe');

    //Boucle Pour recuperé l'integralité du contenue des recipes
    for ($i=0; $i < count($findRecipe) ; $i++) {
     array_push($arrayTemp ,$model -> search($findRecipe[$i]));
    }

    //Carotte NINJA pour retiré une dimension d'un tableau
    foreach($arrayTemp as $tab1 => $val){
      foreach($val as $tab2 => $val2) {
        foreach($val2 as $tab3 => $val3) {
          $recipeHtml2[$tab1][$tab3]=$val3;
        }
      }
    }

    return $data = array(
      "success" => true,
      "list" => $recipeHtml2
    );

  }

  //Method pour afficher les recettes sur la page
  public function showRecipe() {
    var_dump($_POST);
  }


}
