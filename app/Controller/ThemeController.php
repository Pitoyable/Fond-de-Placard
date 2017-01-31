<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UserModel;


class ThemeController extends Controller
{
  public function display(){
    $this->show('theme/theme_display');
  }

}
