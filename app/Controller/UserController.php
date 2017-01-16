<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UserModel;


class UserController extends Controller
{
  public function signUp(){
    //methode pour s'inscrire
  }
  public function login(){
    //methode pour se connecté
  }
  public function logout(){
    //methode pour se déconnecté
  }
  public function update(){
    //methode pour modifier le compte
    $this->show('user/update');
  }
}
