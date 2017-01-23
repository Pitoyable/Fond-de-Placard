<?php
namespace Model;
use \W\Model\ConnectionModel;
use W\Model\Model;
class AdministrationModel extends \W\Model\Model
{



  public function manageUser($groupe){
    $app = getApp();

    $model = new AdministrationModel();

    $model -> setTable('user');
    $sql = 'SELECT * FROM  user WHERE ' . $app->getConfig('security_role_property') . ' = :role';

    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':role', $groupe);
    $sth->execute();
    $arrayUser = $sth->fetchAll();
    return $arrayUser;
  }



}
