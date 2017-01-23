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

    $this->show('administration/admin_manageUser', ['array' => $array]);
  }
  public function updateUser(){
    //methode pour mettre à jour un utilisateur
    $authorization = new AuthorizationModel();
    $authorization -> isGranted(1);

  }

  public function deleteUser(){
    //methode pour supprimer un utilisateur
    $authorization = new AuthorizationModel();
    $authorization -> isGranted(1);

  }


  public function manageRecipe(){
    //methode pour afficher les recette
    $authorization = new AuthorizationModel();
    $authorization -> isGranted(1);

    $this->show('administration/admin_manageRecipe');
  }

  public function manageTheme(){
    $authorization = new AuthorizationModel();
    $authorization -> isGranted(1);

    $this->show('administration/admin_manageTheme');
  }
}
