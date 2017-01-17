<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UserModel;


class ProvideController extends Controller
{
  public function display(){
    $this->show('provide/provide_display');
  }

}
