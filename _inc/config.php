<?php
/*
//error messages
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
*/
//required
require 'vendor/autoload.php';
use Medoo\Medoo;

// Initialize DB
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'doableApp',
    'server'        => 'localhost',
    'username'      => 'doable',
    'password'      => 'doable'
]);

//Successful connection
/*echo '<pre>';
print_r( $database->info());
echo '</pre>';*/
?>