<?php
/**
 * Created by PhpStorm.
 * User: benas
 * Date: 17.10.14
 * Time: 02.43
 */

class last_method {

    function __sleep()
    {
        echo 'This is ' . __METHOD__ . PHP_EOL . '</br>';
        return array("name", "lastName");
    }

    function __wakeup()
    {
        echo 'This is ' . __METHOD__ . PHP_EOL . '</br>';

    }

    function __toString()
    {
        return "This is " . __METHOD__ . PHP_EOL . "</br>";
    }

    function __invoke($value)
    {
        echo __METHOD__ . $value . PHP_EOL . "</br>";
    }

    function __set_state($arr)
    {
        echo 'This is ' . __METHOD__ . PHP_EOL . '</br>';
        $obj = new last_method();
        $obj->name = $arr['name'];
        $obj->lastName = $arr['lastName'];
        return $obj;
    }

    function __clone()
    {
        echo 'This is ' . __METHOD__ . PHP_EOL . '</br>';
        $c = new last_method();
        $c->name = $this->name;
        return $c;
    }

    function __debugInfo()
    {
        echo 'This is ' . __METHOD__ . PHP_EOL . '</br>';
        return array($this->name,$this->lastName);
    }
}