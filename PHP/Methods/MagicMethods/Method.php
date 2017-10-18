<?php
/**
 * Created by PhpStorm.
 * User: benas
 * Date: 17.10.14
 * Time: 00.26
 */
namespace Methods\MagicMethods;

class Method {

    private $data = array();
    public $declared = 1;
    private $hidden = 2;

    function __construct()
    {
         echo 'This is ' . __METHOD__ . PHP_EOL . '</br>';
    }

    function __destruct()
    {
        echo 'This is ' . __METHOD__ . PHP_EOL . '</br>';
    }


    public function __set($name, $value)
    {
        echo 'This is ' . __METHOD__ . PHP_EOL . '</br>';
        echo "Setting '$name' to '$value'" . '</br>';
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        echo 'This is ' . __METHOD__ . PHP_EOL . '</br>';
        echo "Getting '$name'" . PHP_EOL . '</br>' ;
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        } else {
            return __METHOD__ . $name . " No name";
        }
    }

    public function __isset($name)
    {
        echo 'This is ' . __METHOD__ . PHP_EOL . '</br>';
        echo "Is '$name' set?"  . '</br>';
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        echo 'This is ' . __METHOD__ . PHP_EOL . '</br>';
        echo "Unsetting '$name"  . PHP_EOL . '</br>';
        unset($this->data[$name]);
    }

    public function __call($name, $arguments)
    {
        echo "Calling object method '$name' "
            . implode(', ', $arguments). PHP_EOL . '</br>';
    }

    public static function __callStatic($name, $arguments)
    {
        echo "Calling static method '$name' "
            . implode(', ', $arguments). PHP_EOL . '</br>';
    }

}

