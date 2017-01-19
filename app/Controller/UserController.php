<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \Model\UserModel;
use \W\Security\AuthentificationModel;


class UserController extends Controller
{
  public function signUp(){
    //methode pour s'inscrire
    $authentification = new UserModel();
    $test = $authentification -> signUp($_POST['pseudo'], $_POST['password'], $_POST['password'], $_POST['password_check']);

  }
  public function login(){
    //methode pour se connecté
    $authentification = new UserModel();
    $test = $authentification -> login($_POST['pseudo'], $_POST['password']);



  }
  public function logout(){
    //methode pour se déconnecté
    $authentification = new AuthentificationModel();
    $authentification -> logUserOut();
    $this->show('default/home');
  }
  public function display(){
    //methode pour afficher le compte

    $this->show('user/user_display');
  }

  public function update(){
    //methode pour modifier le compte

    $authentification = new UserModel();
    $test = $authentification -> update($_POST['pseudo'], $_POST['password']);

  }

}
