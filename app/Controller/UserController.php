<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;

use \W\Security\AuthentificationModel;


class UserController extends Controller
{
  public function signUp(){
    //methode pour s'inscrire
    var_dump($_POST);
    // methode poru hasher le mdp
    // $modelHash = new AuthentificationModel();
    // $passwordHash = $modelHash -> hashPassword($_POST['password']);
    $arrayData = array(
      'use_pseudo' => $_POST['pseudo'],
      'use_email' => $_POST['email'],
      'use_password' => $_POST['password'],
    );
    $model = new UsersModel();
    $truc = $model -> insert($arrayData, $stripTags = true);
    //problems erreur !!!!!
    var_dump($truc);
  }
  public function login(){
    //methode pour se connecté
    $authentification = new AuthentificationModel();
    $test = $authentification -> isValidLoginInfo($_POST['pseudo'], $_POST['password']);
		//$authentification -> logUserIn($_POST);
    echo 'good';
    var_dump($_SESSION);
    var_dump($test);
    // a finir apres avoir reussi l'inscription pour le mdp hasher



  }
  public function logout(){
    //methode pour se déconnecté
  }
  public function update(){
    //methode pour modifier le compte
    $this->show('user/update');
  }
}
