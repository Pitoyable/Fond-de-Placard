<?php
namespace Model;

use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;

class UserModel
{
  public function signUp($pseudo, $email, $password, $password_check){
    //methode pour s'inscrire
    if (strlen($pseudo) >=5 && strlen($pseudo) <= 20){
      if ($password === $password_check){
        $usersModel = new UsersModel();
        if ($usersModel -> usernameExists($pseudo) || $usersModel ->emailExists($email)) {
          echo "pseudo ou email existe déja";
        }else{
          // methode pour hasher le mdp
          $modelHash = new AuthentificationModel();
          $passwordHash = $modelHash -> hashPassword($password);
          $arrayData = array(
            'use_pseudo' => $pseudo,
            'use_email' => $email,
            'use_password' => $passwordHash,
          );
          $model = new UsersModel();
          $insert = $model -> insert($arrayData, $stripTags = true);
          //problems erreur avec la methode find() pas d'id mais je ne comprend pas pourquoi il utilise find ...!!!!!

          echo"good";
        }
      }else{
        echo "mdp faux";
      }
    }else{
      echo "taille du pseudo faux";
    }
  }

  public function login($email, $password){
    //methode pour se connecté
    $authentification = new AuthentificationModel();
    $test = $authentification -> isValidLoginInfo($email, $password);


    if ($test == 0){
      echo"erreur";
    }else{
      echo 'good';
      $model = new UsersModel();
      $emailValide = $model -> getUserByUsernameOrEmail($email);
      $authentification ->logUserIn($emailValide);
      }
  }
  public function update(){
    //methode pour modifier le compte

    $model = new UsersModel();
    $model -> update($_POST, $_SESSION['user']['use_id'], $stripTags = true);
    //a finir
  }


}
