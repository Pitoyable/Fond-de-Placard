<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UserModel;
use Security\AuthentificationModel;


class UserController extends Controller
{
  public function signUp(){
    //methode pour s'inscrire
  }
  public function login(){
    //methode pour se connecté
    echo "string";
    var_dump($_POST);
  }
  public function logout(){
    //methode pour se déconnecté
  }
  public function update(){
    //methode pour modifier le compte
    $this->show('user/update');
  }
}
