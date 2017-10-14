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

    $obj = new last_method();
    $obj->name = "Benas";
    $obj->lastName = "Rimsa";
    //serialize() checks if your class has a function with the magic name __sleep().
    // If so, that function is executed prior to any serialization.
    // It can clean up the object and is supposed to return an array with the names of all
    // variables of that object that should be serialized.
    $obj = serialize($obj);
    echo $obj . PHP_EOL . "</br>";
    //Conversely, unserialize() checks for the presence of a function with
    // the magic name __wakeup(). If present, this function can reconstruct any
    // resources that the object may have.
    $obj = unserialize($obj);
    echo "Name: " . $obj->name . PHP_EOL . "</br>";

    //The __toString() method allows a class to decide how it
    // will react when it is treated like a string.
    echo $obj . PHP_EOL;

    //The __invoke() method is called when a script tries to call an object as a function.
    $obj(" result String");

    //The only parameter of this method is an array containing exported properties
    // in the form array('property' => value, ...).
    eval('$exportTest = ' . var_export($obj, true) . ';');
    echo "Name: " . $exportTest->name . " LastName: " . $exportTest->lastName . PHP_EOL . "</br>";

    //Once the cloning is complete, if a __clone() method is defined,
    // then the newly created object's __clone() method will be called,
    // to allow any necessary properties that need to be changed.
    echo "object name: " . $obj->name . PHP_EOL . "</br>";
    $obj2 = clone $obj;
    echo "cloned object name: " . $obj2->name . PHP_EOL . "</br>";

    //This method is called by var_dump() when dumping an object to get the properties
    // that should be shown. If the method isn't defined on an object,
    // then all public, protected and private properties will be shown.
    var_dump($obj);