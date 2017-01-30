<?php
namespace Model;

use \W\Model\Model;
use \W\Model\ConnectionModel;

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
  public function createThemeList() {

    $model = new RecipeModel();
    $model -> setTable('theme');
    $allTheme = $model -> findAll();

    //Creation d'une variable theme
    $theme = "";

    //On boucle pour parcourir les themes
    for ($i=0; $i < count($allTheme) ; $i++) {

      //On concatene les different themes
      $theme .= "<label for='" . $allTheme[$i]['the_name'] . "'>" . $allTheme[$i]['the_name'] . "<input type='checkbox' name='mp_checked[]' value='" . $allTheme[$i]['id'] . "'></label>";

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

  //Method pour l'autocompletion des ingredients (AJAX)
  public function autoFindIngredient() {

    //Initialisation du model RecipdeModel
    $model = new RecipeModel();

    //Utilisation de la method setTable() pour chercher dans la table ingredients
    $model -> setTable('ingredients');
    //Création de la requete SQL
    $sql = "SELECT * FROM ingredients WHERE ing_name LIKE '" . $_POST['search_bar'] . "%' LIMIT 3";

    //Limitation à 3 ingreedients renvoyer
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

  //Function pour verifier
  public function recipeNameExists($nameRecipe) {

     $app = getApp();
     $sql = "SELECT * FROM recipe WHERE rec_name = '" . $nameRecipe . "'";
     $dbh = ConnectionModel::getDbh();
     $sth = $dbh->prepare($sql);
     if($sth->execute()){
         $foundName = $sth->fetch();
         if($foundName){
             return false;
         }
     }
    return true;
  }

  //Verification des info envoyer au moment d'ajotuer une recette
  public function checkInfoRec() {

    if (!empty($_POST['mp_ing']) && !empty($_POST['nom']) && !empty($_POST['type']) && !empty($_POST['recipe_content']) && !empty($_SESSION['user'])) {
      return true;
    } else {
      return false;
    }
  }

  //Ajouter de la recette en BDD (table recipe)
  public function addRecipeBdd() {

    $model = new RecipeModel();

    $array = array(
      "rec_name" => $_POST['nom'],
      "rec_html" => $_POST['recipe_content'],
      "rec_type" => $_POST['type']
    );

    //On definie la table à utiliser
    $model -> setTable('recipe');

    //On insert la recipe in BDD, on recupe son ID
    $idRecipe = $model -> insert($array, $stripTags = false);
    return $idRecipe;
  }

  //Ajout des ingredients en BDD pour la recipe
  public function addIngUserRecipeBdd($idRecipeAdd) {

    $model = new RecipeModel();

    //On definie la table a utiliser
    $model -> setTable('link_rec_use');

    //On crée un tableau pour remplir la table 'link_rec_use'
    $array = array(
      "recipe_id" => $idRecipeAdd,
      "user_id" => $_SESSION['user']['id']
    );

    $model -> insertBDD($array);

    //On crée une boucle pour remplir la table 'link_ing_rec'
    for ($i=0; $i < count($_POST['mp_ing']) ; $i++) {

      //On definie la table a utiliser
      $model -> setTable('link_ing_rec');

      //On crée le tableau pour insert
      $array = array(
        "recipe_id" => $idRecipeAdd,
        "ingredients_id" => $_POST['mp_ing'][$i]
      );

      //On lance les differentes insert necessaire
      $model -> insertBDD($array);
    }
  }

  //Vérification que des themes selectionner
  public function checkThemeSelectedRecipe($idRecipeAdd) {

    //On verifie que $_POST['mp_checked'] existe
    if (isset($_POST['mp_checked'])) {

      //On verifie si aucun theme n'est selectionner
      if ($_POST['mp_checked'][0] != 'none') {

        $model = new RecipeModel();
        //On definie la table a utiliser
        $model -> setTable('link_rec_the');
        //On crée une boucle pour remplir la table 'link_rec_theme'
        for ($i=0; $i < count($_POST['mp_checked']) ; $i++) {


          //On crée le tableau pour insert
          $array = array(
            "recipe_id" => $idRecipeAdd,
            "theme_id" => $_POST['mp_checked'][$i]
          );

          //On lance les differentes insert necessaire
          $model -> insertBDD($array);

        }
      }
    }
  }

  //Retourne les données de la recette ajouter
  public function searchRecipeLastInsert($idRecipeAdd) {

    $model = new RecipeModel();

    //Ajout de la previalisation de la recette
    $model -> setTable('recipe');
    $recipeAdd = $model -> find($idRecipeAdd);
    return $recipeAdd;
  }

  //Trouver les recettes avcec les ingredients prensent dans le panier
  public function findRecipe() {

    $model = new RecipeModel();
    $model -> setTable('link_ing_rec');

    //Preparation d'une tableau pour recuperé le resultat de la requete
    $arrayTemp = array();

    //Requete SQL Sans aucune protection
    $sql = "SELECT recipe_id AS id FROM link_ing_rec INNER JOIN recipe ON recipe.id = link_ing_rec.recipe_id WHERE recipe.rec_valide = 1 AND ingredients_id = " . $_POST['mp_ing'][0];

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

    //method NINJA pour retiré une dimension d'un tableau
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

    if (!empty($_POST['RecipeId'])) {

      $model = new RecipeModel();
      $model -> setTable('recipe');
      $recipeFind = $model -> find($_POST['RecipeId']);
      return $recipeFind;
    }
  }

  //Method pour verifier si le favoris est deja present en BDD
  public function checkFavoris() {
    $app = getApp();
    //On crée la requete sql qui va verifier si le favoris existe deja ou non
    $sql = "SELECT * FROM comment WHERE com_rec_id = '" . $_POST['recipeId'] . "' AND com_use_id = '" . $_SESSION['user']['id'] . "' AND com_fav = 1 OR com_fav = 0";
    $dbh = ConnectionModel::getDbh();
    $sth = $dbh->prepare($sql);
    //S'il existe, on recupere les données du favoris
    if($sth->execute()){
        $foundName = $sth->fetch();
        if($foundName){
            return $foundName;
        }
    }
    //S'il n'existe pas, on return NULL
   return NULL;
  }

  //Method pour l'ajout au favoris
  public function addFavoris() {
    $model = new RecipeModel();
    $model -> setTable('comment');

    $array = array(
      "com_use_id" => $_SESSION['user']['id'],
      "com_rec_id" => $_POST['recipeId'],
      "com_fav" => 1
    );

    if ($model -> insert($array)) {
      return $data = array(
        "success" => true,
        "favoris" => true
      );
    }
  }

}
