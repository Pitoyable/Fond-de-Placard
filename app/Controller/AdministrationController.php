<?php

namespace Controller;

use \W\Controller\Controller;
use Model\AdministrationModel;
use \W\Model\UsersModel;
use W\Security\AuthorizationModel;
use W\View\Plates\PlatesExtensions;

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
    $plate = new PlatesExtensions;
    $route = $plate -> generateUrl('Administration_manageUser');
    $model = new AdministrationModel ();
    $model -> updateAdmin($info, $id, $table, $route);
  }

  public function deleteUser(){
    //methode pour supprimer un utilisateur
    $authorization = new AuthorizationModel();
    $authorization -> isGranted(1);

    $plate = new PlatesExtensions;
    $route = $plate -> generateUrl('Administration_manageUser');

    $model = new AdministrationModel ();
    $table = 'user';
    $model -> deleteAdmin($_POST['id'], $table, $route);
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
    $model = new UsersModel();
    $model -> setTable('recipe');
    $array = $model -> find($_POST['id']);
    $this->show('administration/recipe/admin_editRecipe', ['array' => $array]);
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

    $plate = new PlatesExtensions;
    $route = $plate -> generateUrl('Administration_manageRecipe');

    $model -> deleteAdmin($_POST['id'], $table, $route);
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

    $model = new UsersModel();
    $model -> setTable('theme');
    $array = $model -> findAll($orderBy = 'id', $orderDir = 'ASC', $limit = null, $offset = null);

    $this->show('administration/theme/admin_manageTheme', ['array' => $array]);
  }

  public function addTheme(){
    //methode pour ajouter un theme
    $authorization = new AuthorizationModel();
    $authorization -> isGranted(1);

    $arrayData = array (
      "the_name" => $_POST['name'],
    );

    $table = 'theme';

    $plate = new PlatesExtensions;
    $route = $plate -> generateUrl('Administration_manageTheme');

    $model = new AdministrationModel ();
    $model -> addAdmin($arrayData, $table, $route);
  }
  public function editTheme(){
    //methode pour modifier le theme
    $model = new UsersModel();
    $model -> setTable('theme');
    $array = $model -> find($_POST['id']);
    $this->show('administration/theme/admin_editTheme', ['array' => $array]);
  }

  public function updateTheme(){
    //methode pour mettre a jour le theme
    $authorization = new AuthorizationModel();
    $authorization -> isGranted(1);
    $table = 'theme';
    $id =  $_POST['id'];
    $info = array (
      "the_name" => $_POST['name'],
    );

    $plate = new PlatesExtensions;
    $route = $plate -> generateUrl('Administration_manageTheme');

    $model = new AdministrationModel ();
    $model -> updateAdmin($info, $id, $table, $route);
  }

  public function deleteTheme(){
    //methode pour mettre a jour  le theme
    $authorization = new AuthorizationModel();
    $authorization -> isGranted(1);

    $model = new AdministrationModel ();
    $table = 'theme';

    $plate = new PlatesExtensions;
    $route = $plate -> generateUrl('Administration_manageTheme');

    $model -> deleteAdmin($_POST['id'], $table, $route);
  }
}
