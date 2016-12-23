<?php
//variable de connexion
$user = "root";//nom d'utilisateur de labase de donnée.
$mdp = "";// Mot de passe de l'utilisateur.
$host = "localhost";// adress de la base de donnée.
$dbname = "fond_de_placard";// nom de la base de donnée.
//Connexion à la base de donnée.
try {
  //On instancie une nouvelle connexion PDO à la base de donnée
  $instance = new PDO("mysql:host=".$host.";dbname=".$dbname, $user, $mdp,
  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  //array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') pour accepté les accent
  }catch (PDOException $e){
    //si il y a une erreur PHP (Exception) levée par PDO (PDOException) on l'affiche et on arrête le script.
  die('Erreur :'. $e->getMessage());
}
