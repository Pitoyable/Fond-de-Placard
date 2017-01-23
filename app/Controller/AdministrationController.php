<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UserModel;


class AdministrationController extends Controller
{
  public function adminHome(){
    //methode pour se connecté a la partie administration
    $this->show('administration/admin_home');
  }

  public function manageUser(){
    $this->show('administration/admin_manageUser');
  }

  public function validRecipe(){
    $this->show('administration/admin_validRecipe');
  }

  public function manageTheme(){
    $this->show('administration/admin_manageTheme');
  }
}
