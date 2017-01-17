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
    $usersModel = new UsersModel();
    if ($usersModel -> usernameExists($_POST['pseudo']) || $usersModel ->emailExists($_POST['email'])) {
      echo "pseudo ou email existe déja";
    }else{
      // methode pour hasher le mdp
      $modelHash = new AuthentificationModel();
      $passwordHash = $modelHash -> hashPassword($_POST['password']);
      $arrayData = array(
        'use_pseudo' => $_POST['pseudo'],
        'use_email' => $_POST['email'],
        'use_password' => $passwordHash,
      );
      $model = new UsersModel();
      $truc = $model -> insert($arrayData, $stripTags = true);
      //problems erreur avec la methode find() pas d'id mais je ne comprend pas pourquoi il utilise find ...!!!!!
      var_dump($truc);
      echo"good";
    }
    $this->show('default/home');

  }
  public function login(){
    //methode pour se connecté
    $authentification = new AuthentificationModel();
    $test = $authentification -> isValidLoginInfo($_POST['pseudo'], $_POST['password']);

    var_dump($test);
    if ($test == 0){
      echo"erreur";
    }else{
      echo 'good';
      $model = new UsersModel();
      $truc = $model -> getUserByUsernameOrEmail($_POST['pseudo']);
      $authentification ->logUserIn($truc);
      }
    var_dump($_SESSION);
    // $this->show('default/home');



  }
  public function logout(){
    //methode pour se déconnecté
    $authentification = new AuthentificationModel();
    $authentification -> logUserOut();
    $this->show('default/home');
  }
  public function display(){
    //methode pour modifier le compte
    var_dump($_SESSION);
    $this->show('user/user_display');
  }

  public function update(){
    //methode pour modifier le compte
    var_dump($_SESSION);
    var_dump($_POST);
    $model = new UsersModel();
    $model -> update($_POST, $_SESSION['user']['use_id'], $stripTags = true);
    // $this->show('default/home');
  }

}
