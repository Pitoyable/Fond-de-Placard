<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UserModel;


class RecipeController extends Controller
{
  public function afficher(){
    $this->show('default/home');
  }

}
