<?php
namespace Model;

use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;

use PHPMailer;

class UserModel extends \W\Model\Model
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
            //creation de la clef cripter md5 : chaine de caractere, uniqid : identifiant unique et mt_rand un nombre aléatoire
            $clef = md5(uniqid(mt_rand()));
            // methode pour hasher le mdp
            $authentification = new AuthentificationModel();
            $passwordHash = $authentification -> hashPassword($password);
            $arrayData = array(
              'use_pseudo' => $pseudo,
              'use_email' => $email,
              'use_password' => $passwordHash,
              'use_clef' => $clef,
            );
            //methode pour inscrire en bdd
            $model = new UsersModel();
            $insert = $model -> insert($arrayData, $stripTags = true);


            // variable pour constituer l'email
            $subject = 'le sujet';
            $message = "<h2> Bienvenue $pseudo</h2>";
            $message .= "<p>Pour valider votre compte cliquer sur le lien suivant : </p>";
            //lien avec la clef crre précédemment
            $message .= '<a href=" http://fond-de-placard.fredericnoel.com/utilisateur_email?clef='.$clef.'">Valider</a>';

            //info pour dire a la fonction mail que l'on envoie du html
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

           $mail = mail($email, $subject, $message, $headers);

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
        "error" => "informations incorrectes",
      );
      return $data;
    }else{
      $model = new UsersModel();
      //on cherche l'utilisateur en bdd avec son email
      $emailValide = $model -> getUserByUsernameOrEmail($email);
      //on verifie que l'email est valide
      if($emailValide['use_valide'] == 0){
        $data = array(
          "success" => false,
          "error" => "email non validé",
        );
        return $data;
      }else{
        //on met les information en session
        $authentification ->logUserIn($emailValide);

        $data = array(
          "success" => true,

        );
        return $data;
      }
    }
  }

  public function updateUser($array, $id){
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
          "error" => "informations fausses",
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

  public function validate($clef){
    // pn regarde sur la valeur de clef est vide ou pas
    if (!empty($clef)){
        //on met a jour l'utilisateur qui a cette clef
        $sql = "UPDATE user SET use_valide = 1 WHERE use_clef = :clef";

        $sth = $this->dbh->prepare($sql);
        	$sth->bindValue(':clef', $clef);
        if(!$sth->execute()){
    			return false;
    		}
    		return true;
    }else{
      return false;
    }
  }
}
