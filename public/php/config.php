<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Load the .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


$DB_USER = $_ENV['DB_USER'] ?? null;
$DB_PASS = $_ENV['DB_PASS'] ?? null;
$DB_HOST = $_ENV['DB_HOST'] ?? null;
$DB_NAME = $_ENV['DB_NAME'] ?? null;




define('DB_HOST',$DB_HOST);
define('DB_USER',$DB_USER);
define('DB_PASS',$DB_PASS);
define('DB_NAME',$DB_NAME);
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME );




?>