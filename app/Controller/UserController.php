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


  }
  public function login(){
    //methode pour se connecté
    $authentification = new AuthentificationModel();
    $test = $authentification -> isValidLoginInfo($_POST['pseudo'], $_POST['password']);
		//$authentification -> logUserIn($_POST);
    var_dump($test);
    if ($test == 0){
      echo"erreur";
    }else{
      echo 'good';
      $authentification ->logUserIn($test);
      }
    var_dump($_SESSION);



  }
  public function logout(){
    //methode pour se déconnecté
  }
  public function update(){
    //methode pour modifier le compte
    $this->show('user/update');
  }
}
