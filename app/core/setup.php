<?php


//require our files, remember should be relative to index.php
require_once '../app/core/Router.php';
//require_once '../app/controllers/MainController.php';
// require '../app/models/Model.php';


//set up env variables
$env = parse_ini_file('../.env');

define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);
define('DBDRIVER', '');

//set up other configs
define('DEBUG', true);

//Establish Connection with database
//I think I may be able to delete this later, so it's only accessed via model. 
try {
    $conn = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}