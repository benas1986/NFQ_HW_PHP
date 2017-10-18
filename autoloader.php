<?php
/**
 * Created by PhpStorm.
 * User: benas
 * Date: 17.10.18
 * Time: 03.00
 */

spl_autoload_register(function ($class){
    $vendor = "PHP/";
    $namespace=str_replace("\\","/",__NAMESPACE__);
    $class=str_replace("\\","/",$class);
    $load=$vendor.(empty($namespace)?"":$namespace."/")."{$class}.php";
    if (@file_exists($load)) {
        require_once($load);
    }else{
        die("ERROR 404!");
    }
});