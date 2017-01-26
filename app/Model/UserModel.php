<?php
namespace Model;

use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;


class UserModel
{
  public function signUp($pseudo, $email, $password, $password_check, $route){
    //methode pour s'inscrire
      //vérifier la taille du pseudo
    if (strlen($pseudo) >=5 && strlen($pseudo) <= 20){
      //vérifier que les 2 champ mdp sont indentique
      if ($password === $password_check){
        //vérifier que la longueur du mdp est supérieux ou égal à 5 caractère
        if(strlen($password) >=5){
          $usersModel = new UsersModel();
          //verifier que l'email et le pseudo n'existe pas déja en bdd
          if ($usersModel -> usernameExists($pseudo) || $usersModel ->emailExists($email)) {
            $data = array(
              //donné à renvoyer en json pour le js
              "success" => false,
              "error" => "pseudo ou email existe déja",
            );
            return $data;
          }else{
            // methode pour hasher le mdp
            $authentification = new AuthentificationModel();
            $passwordHash = $authentification -> hashPassword($password);
            $arrayData = array(
              'use_pseudo' => $pseudo,
              'use_email' => $email,
              'use_password' => $passwordHash,
            );
            //methode pour inscrire en bdd
            $model = new UsersModel();
            $insert = $model -> insert($arrayData, $stripTags = true);

            $data = array(
              "success" => true,
            );
            return $data;
          }
        }else{
          $data = array(
            "success" => false,
            "error" => "erreur longueur mdp",
          );
          return $data;
        }
      }else{
        $data = array(
          "success" => false,
          "error" => "erreur mdp",
        );
        return $data;
      }
    }else{
      $data = array(
        "success" => false,
        "error" => "pseudo incorrect",
      );
      return $data;
    }
  }

  public function login($email, $password, $route){
    //methode pour se connecté
    //verifier que l'email et password existe en bdd et sont liée
    $authentification = new AuthentificationModel();
    $test = $authentification -> isValidLoginInfo($email, $password);
    //si egal à 0 ancun utilisateur n'a cette email et ce mdp en bdd sinon il renvoie l'id du compte
    if ($test == 0){
      $data = array(
        "success" => false,
        "error" => "information incorrect",
      );
      return $data;
    }else{
      $model = new UsersModel();
      //on cherche l'utilisateur en bdd avec son email
      $emailValide = $model -> getUserByUsernameOrEmail($email);
      //on met les information en session
      $authentification ->logUserIn($emailValide);

      $data = array(
        "success" => true,

      );
      return $data;

    }
  }

  public function update($array, $id){
    //methode pour modifier le compte

    // on verifie que l'ancien et le nouveau mdp ne sont pas identique
    if ($array['old_use_password'] == $array['use_password']){
      $data = array(
        "success" => false,
        "error" => "ancien et nouveau mdp identique",
      );
      return $data;
    }else{
      // on verifie l'email et le mdp se bon avec la bdd
      $authentification = new AuthentificationModel();
      $test = $authentification -> isValidLoginInfo($array['use_email'], $array['old_use_password']);
      //si 0 il existe pas
      if ($test == 0){

        $data = array(
          "success" => false,
          "error" => "information fausse",
        );
        return $data;
      }else {
        if(strlen($array['use_password']) >=5){
          //on hash le nouveau mdp pour le rentré dans la bdd
          $passwordHash = $authentification -> hashPassword($array['use_password']);
          $info = array (
            "use_email" => $array['use_email'],
            "use_password" => $passwordHash,
          );
          //on insert les donner en bdd
          $model = new UsersModel();
          $model -> update($info, $id, $stripTags = true);

          $data = array(
            "success" => true,
          );
          return $data;
        }else{
          $data = array(
            "success" => false,
            "error" => "longueur nouveau mdp fausse",
          );
          return $data;
        }
      }
    }
  }
}
