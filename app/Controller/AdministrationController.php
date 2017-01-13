<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UserModel;


class AdministrationController extends Controller
{
  public function connection(){
    //methode pour se connecté a la partie administration
    $this->show('administration/connection');
  }

}
