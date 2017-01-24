<?php

namespace Controller;

use \W\Controller\Controller;
use Model\AdministrationModel;
use \W\Model\UsersModel;
use W\Security\AuthorizationModel;


class AdministrationController extends Controller
{
  public function adminHome(){

    //methode pour se connecté a la partie administration
    $this->show('administration/admin_home');
  }

  public function manageUser(){
    //methode pour afficher les utilisateurs
      //appelle de model pour vérifier que l'utilisateur est connecter et à les droit pour la partie administration
    $authorization = new AuthorizationModel();
    $authorization -> isGranted(1);

    $model = new UsersModel();
    $array = $model -> findAll($orderBy = 'id', $orderDir = 'ASC', $limit = null, $offset = null);

    $this->show('administration/user/admin_manageUser', ['array' => $array]);
  }

  public function editUser(){

    // on recupere les informatino de l'utilisateur avec sont id
    $model = new UsersModel();
    $array = $model -> find($_POST['id']);
    $this->show('administration/user/admin_editUser', ['array' => $array]);
  }
  public function updateUser(){
    //methode pour mettre à jour un utilisateur
    $authorization = new AuthorizationModel();
    $authorization -> isGranted(1);
    $table = 'user';
    $id =  $_POST['id'];
    $info = array (
      "use_pseudo" => $_POST['pseudo'],
      "use_email" => $_POST['email'],
      "group_id" => $_POST['groupe'],
    );

    $model = new AdministrationModel ();
    $model -> updateAdmin($info, $id, $table);
  }

  public function deleteUser(){
    //methode pour supprimer un utilisateur
    $authorization = new AuthorizationModel();
    $authorization -> isGranted(1);

    $model = new AdministrationModel ();
    $table = 'user';
    $model -> deleteAdmin($_POST['id'], $table);
  }


  public function manageRecipe(){
    //methode pour afficher les recette
    $authorization = new AuthorizationModel();
    $authorization -> isGranted(1);


    $model = new UsersModel();
    $model -> setTable('recipe');
    $array = $model -> findAll($orderBy = 'id', $orderDir = 'ASC', $limit = null, $offset = null);

    $this->show('administration/recipe/admin_manageRecipe', ['array' => $array]);
  }

  public function editRecipe(){
    //methode pour modifier la recette
    $this->show('administration/recipe/admin_editRecipe');
  }

  public function updateRecipe(){
    //methode pour mettre a jour  la recette
  }

  public function deleteRecipe(){
    //methode pour mettre a jour  la recette
    $authorization = new AuthorizationModel();
    $authorization -> isGranted(1);

    $model = new AdministrationModel ();
    $table = 'recipe';
    $model -> deleteAdmin($_POST['id'], $table);
  }

  public function validateRecipe(){
    //methode pour mettre a jour  la recette
    $authorization = new AuthorizationModel();
    $authorization -> isGranted(1);
    $table = 'recipe';
    $id =  $_POST['id'];
    $info = array (
      "rec_valide" => 1,
    );

    $model = new AdministrationModel ();
    $model -> updateAdmin($info, $id, $table);
  }
  public function manageTheme(){
    $authorization = new AuthorizationModel();
    $authorization -> isGranted(1);

    $this->show('administration/theme/admin_manageTheme');
  }
}
