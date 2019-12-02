<?php
//require stuff
require_once 'vendor/autoload.php';
if( !session_id() ) @session_start();

//error messages
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


$config = [
    'db' => [
        'type' => 'mysql',
        'name' => 'doableapp',
        'server' => '127.0.0.1', // port 3306 itsovy.sk IP
        'username' => 'doable',
        'password' => 'doable',
        'charset' => 'utf8'
    ]
];

$db=new PDO(
    "{$config['db']['type']}:host={$config['db']['server']};
	dbname={$config['db']['name']};charset={$config['db']['charset']}",
	$config['db']['username'],$config['db'][ 'password']

);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    //Successful connection
    /*echo '<pre>';
    print_r( $database->info());
    echo '</pre>';*/
?>