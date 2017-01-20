<?php

use \W\Controller\Controller;
use Model\RecipeModel;

class AjaxController
{

  public function findIngredient() {


    header('Content-Type: application/json');
    //Je formate la reponse en JSON
    echo json_encode(array(
      "success" => true,
      "test" => 'bisous'
    ));

  }

}
