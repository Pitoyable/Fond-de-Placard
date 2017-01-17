<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UserModel;


class AdministrationController extends Controller
{
  public function adminHome(){
    //methode pour se connecté a la partie administration
    $this->show('administration/adminhome');
  }

  public function manageUser(){
    $this->show('administration/admin_user');
  }

  public function validReceipe(){

  }

}
