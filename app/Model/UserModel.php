<?php
namespace Model;

use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;


class UserModel
{
  public function signUp($pseudo, $email, $password, $password_check){
    //methode pour s'inscrire
      //vérifier la taille du pseudo
    if (strlen($pseudo) >=5 && strlen($pseudo) <= 20){
      //vérifier que les 2 champ mdp sont indentique
      if ($password === $password_check){
        $usersModel = new UsersModel();
        //verifier que l'email et le pseudo n'existe pas déja en bdd
        if ($usersModel -> usernameExists($pseudo) || $usersModel ->emailExists($email)) {
          echo "pseudo ou email existe déja";
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


          header('Location:http://fond_de_placard.local/recette_afficher');
        }
      }else{
        echo "2 mdp pas identique";
        header('Location:http://fond_de_placard.local/utilisateur_afficher');
      }
    }else{
      echo "taille du pseudo faux";
      header('Location:http://fond_de_placard.local/utilisateur_afficher');
    }
  }

  public function login($email, $password){
    //methode pour se connecté
    //verifier que l'email et password existe en bdd et sont liée
    $authentification = new AuthentificationModel();
    $test = $authentification -> isValidLoginInfo($email, $password);

    if ($test == 0){
      echo"erreur";
    }else{
      echo 'good';
      header('Location:http://fond_de_placard.local/recette_afficher');
      $model = new UsersModel();
      //on cherche l'utilisateur en bdd avec son email
      $emailValide = $model -> getUserByUsernameOrEmail($email);
      //on met les information en session
      $authentification ->logUserIn($emailValide);
      }
  }

  public function update($array, $id){
    //methode pour modifier le compte

    // on verifie que l'ancien et le nouveau mdp ne sont pas identique
    if ($array['old_use_password'] == $array['use_password']){
      echo "ancien et nouveau mdp identique";
    }else{
      // on verifie l'email et le mdp se bon avec la bdd
      $authentification = new AuthentificationModel();
      $test = $authentification -> isValidLoginInfo($array['use_email'], $array['old_use_password']);
      //si 0 il existe pas
      if ($test == 0){
        echo "erreur";
      }else {
        echo "good";
        //on hash le nouveau mdp pour le rentré dans la bdd
        $passwordHash = $authentification -> hashPassword($array['use_password']);
        $info = array (
          "use_email" => $array['use_email'],
          "use_password" => $passwordHash,
        );
        //on insert les donner en bdd
        $model = new UsersModel();
        $model -> update($info, $id, $stripTags = true);
      }
    }


  }


}
