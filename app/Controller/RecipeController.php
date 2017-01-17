<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UserModel;


class RecipeController extends Controller
{
  public function display(){
    $this->show('recipe/recipe_display');
  }

}
