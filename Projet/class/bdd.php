<?php


class bdd
{
  public $user = "root";
  public $mdp = "";
  public $host = "localhost";
  public $dbname = "fond_de_placard"


  public function connectBdd(){
    //fonction pour ce connecter a la BDD
    try {

      $bdd = new PDO("mysql:host=".$host.";dbname=".$dbname, $user, $mdp);
    }catch (PDOException $e){

      $e->getMessage();

    }

}
