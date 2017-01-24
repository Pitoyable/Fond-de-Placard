<?php
namespace Model;
use \W\Model\ConnectionModel;
use W\Model\UsersModel;

class AdministrationModel extends \W\Model\Model
{

  public function updateAdmin($info, $id, $table, $route){
    //methode pour mettre à jour un utilisateur
    var_dump($info);
    //on insert les donner en bdd
    $model = new UsersModel();
    $model -> setTable($table);
    $model -> update($info, $id, $stripTags = true);

    header('Location:'.$route.'');

  }

  public function deleteAdmin($id, $table, $route){
    //methode pour supprimer un utilisateur
    var_dump($id);
    $model = new UsersModel();
    $model -> setTable($table);
    $model -> delete($id);

    header('Location:'.$route.'');
  }


}
