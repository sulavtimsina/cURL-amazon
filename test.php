<?php
/**
 * Created by PhpStorm.
 * User: Sulav.Timsina
 * Date: 3/30/2018
 * Time: 12:46 PM
 */

$input = "hello there hell yellow";

preg_match("/^[a-zA-Z ]+$/", $input, $matches);
print_r($matches);