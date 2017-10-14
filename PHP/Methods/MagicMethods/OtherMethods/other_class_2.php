<?php
/**
 * Created by PhpStorm.
 * User: benas
 * Date: 17.10.14
 * Time: 04.02
 */

namespace PHP\Methods\MagicMethods\Other\other_class_2;

class other_class_2 {

    function __construct()
    {
        echo 'This is ' . __METHOD__ . PHP_EOL . '</br>';
    }
}

$other_class = new other_class_2();