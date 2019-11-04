<?php

//error messages
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

//required
use Medoo\Medoo;
require 'vendor/autoload.php';

// Initialize DB
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'projectdoable',
    'server'        => 'localhost',
    'username'      => 'root',
    'password'      => ''
]);

//Successful connection
/*
echo '<pre>';
print_r( $database->info());
echo '</pre>';
*/