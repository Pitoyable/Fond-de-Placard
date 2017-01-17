<?php
namespace Model;

use \W\Model\Model;

class RecipeModel extends \W\Model\Model
{

  public function findRecipe() {

    if (!empty($_SESSION['ingredients'])) {
      $_SESSION['ingredients'] = array(
        "ingredients" => $_POST['search_bar'],
      );
    }


  }




}
