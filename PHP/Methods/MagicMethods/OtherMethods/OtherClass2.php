<?php
/**
 * Created by PhpStorm.
 * User: benas
 * Date: 17.10.14
 * Time: 04.02
 */

namespace PHP\Methods\MagicMethods\OtherMethods;

class OtherClass2{

    function __construct()
    {
        echo 'Test find this ' . __METHOD__ . PHP_EOL . '</br>';
    }
}