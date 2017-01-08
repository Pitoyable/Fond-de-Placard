<?php


class User
{
  private $id;
  public $pseudo;
  private $email;
  private $password;



  public function signIn(){
    //fonction pour s'incrire
    //verifier si l'adress email n'est pas déja utilisé
    //si elle est déja utilisé ne pas cree de compte et avertir l'utilisateur
    //sinon cree le nouveau compte, et envoie d'email de confirmation( a voir comme ça fonctionne )
  }

  public function connect(){
    //fonction pour se connecter à sont compte
    //verifier que le mts de passe et bon et l'email
    //Si faux avertir l'utilisateur
    //sinon connecter et creation des variables de section
  }

  public function disconnect(){
    //fonction pour deconnecter le comte
    //fermeture de la session et envoie sur la 1er page du site
  }
}
