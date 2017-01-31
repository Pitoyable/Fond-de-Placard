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
      $this->show('defaut/home');
    }else{

      $model = new UserModel();
      $array = $model ->findRecipeByUSer($_SESSION['user']['id']);
      
      $this->show('user/user_display', ['array' => $array]);
    }
  }

  public function update(){
    //methode pour modifier le compte

    $authentification = new UserModel();
    $data = $authentification -> updateUser($_POST, $_SESSION['user']['id']);

    $controller = new UserController();
    //On revoie les données obtenue
    $controller -> showJson($data);
  }

  public function validate(){
    //methode pour afficher les formulaire d'inscription
    //on utilise la methode mail en lui donnant la valeur de clef qui est dans l'url renvoyer de l'email
    $authentification = new UserModel();
    $data = $authentification ->validate($_GET);

    if($data == true){
      $this->show('user/user_email');
    }else{
      $this->show('default/home');
    }
  }

}
