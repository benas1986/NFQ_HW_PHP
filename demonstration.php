<?php
/**
 * Created by PhpStorm.
 * User: benas
 * Date: 17.10.14
 * Time: 03.30
 */



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