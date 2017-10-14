<?php
/**
 * Created by PhpStorm.
 * User: benas
 * Date: 17.10.14
 * Time: 00.26
 */

class method {

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

    // when object is created automatically runs constructor and destructor.
    $obj = new Method();

    //__set() is run when writing data to inaccessible properties.
    //__get() is utilized for reading data from inaccessible properties.
    $obj->name = "Benas";
    echo $obj->name . PHP_EOL . '</br>';
    echo $obj->lastname . PHP_EOL . '</br>';

    //__isset() is triggered by calling isset() or empty() on inaccessible properties.
    //__unset() is invoked when unset() is used on inaccessible properties.
    var_dump(isset($obj->name)) . '</br>';
    var_dump(isset($obj->lastname)) . '</br>';
    unset($obj->name);
    var_dump(isset($obj->name)) . '</br>';
    //public is visible outside of class, so __get() is  not used, but __isset() is used.
    echo $obj->declared . PHP_EOL . '</br>';
    var_dump(isset($obj->declared))  . '</br>';
    //privates not visible outside of class, so __get() is used.
    echo $obj->hidden . PHP_EOL . '</br>';

    // __call() is triggered when invoking inaccessible methods in an object context
    $obj->runTest('in object context');
    //__callStatic() is triggered when invoking inaccessible methods in a static context.
    Method::runTest('in static context');


