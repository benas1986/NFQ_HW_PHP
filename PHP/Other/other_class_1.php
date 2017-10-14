<?php
/**
 * Created by PhpStorm.
 * User: benas
 * Date: 17.10.14
 * Time: 03.57
 */

namespace PHP\Other\other_class_1;

class other_class_1 {

    function __construct()
    {
        echo 'This is ' . __METHOD__ . PHP_EOL . '</br>';
    }
}

$other_class = new other_class_1();