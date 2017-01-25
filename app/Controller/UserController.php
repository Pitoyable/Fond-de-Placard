<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \Model\UserModel;
use \W\Security\AuthentificationModel;
use W\View\Plates\PlatesExtensions;


class UserController extends Controller
{
  public function signUp(){
    //methode pour s'inscrire
    $plate = new PlatesExtensions;
    $route = $plate -> generateUrl('default_home');

    $authentification = new UserModel();
    $data = $authentification -> signUp($_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['password_check'], $route);

    //si l'inscription est ok on connect l'utilisateur
    if ($data == true){
      $data = $authentification -> login($_POST['email'], $_POST['password'], $route);
    }
    $controller = new UserController();
    //On revoie les données obtenue
    $controller -> showJson($data);
  }
  public function login(){
    //methode pour se connecté
    $plate = new PlatesExtensions;
    $route = $plate -> generateUrl('default_home');

    $authentification = new UserModel();
    $data = $authentification -> login($_POST['email'], $_POST['password'], $route);




    $controller = new UserController();
    //On revoie les données obtenue
    $controller -> showJson($data);

  }
  public function logout(){
    //methode pour se déconnecté
    $authentification = new AuthentificationModel();
    $authentification -> logUserOut();
    $this->show('default/home');
  }
  public function display(){
    //methode pour afficher le compte

    if (!isset($_SESSION['user'])){
      $this->show('user/user_acess');
    }else{
       $this->show('user/user_display');
    }
  }

  public function update(){
    //methode pour modifier le compte
    var_dump($_SESSION);
    $authentification = new UserModel();
    $test = $authentification -> update($_POST, $_SESSION['user']['id']);

  }

  public function acess(){
    //methode pour afficher les formulaire d'inscription


  }

}
