<?php


class autoload
{
    private static $classDirectory = './class/';

    public static function classAutoload($class){
      //definie le repertoire ou autoload les classes
      $path = static::$classDirectory."$class.php";
      if(file_exists($path) && is_readable($path)){
        require $path;
      }
    }
}
