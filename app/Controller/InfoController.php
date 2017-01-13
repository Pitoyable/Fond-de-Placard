<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UserModel;


class InfoController extends Controller
{
  public function display(){
    $this->show('info/info_display');
  }

}
