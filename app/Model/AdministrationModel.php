<?php
namespace Model;
use \W\Model\ConnectionModel;
use W\Model\UsersModel;

class AdministrationModel extends \W\Model\Model
{

  public function updateUser($pseudo, $email, $groupe){
    //methode pour mettre à jour un utilisateur
    var_dump($_POST);
    $id = $_POST['id'];
    $info = array (
      "use_pseudo" => $pseudo,
      "use_email" => $email,
      "group_gro_id" => $groupe,
    );
    //on insert les donner en bdd
    $model = new UsersModel();
    $model -> update($info, $id, $stripTags = true);

    header('Location:http://fond-de-placard.local/administration_gerer_user');
  }


}
