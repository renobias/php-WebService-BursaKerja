<?php
//ob_start("ob_gzhandler");
error_reporting(0);
session_start();

/* DATABASE CONFIGURATION */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'mekarsari');
define('DB_DATABASE', 'bursakerjaftunj');
define("BASE_URL", "http://localhost/WebService-BursaKerja-final/api/");
define("SITE_KEY", 'yourSecretKey');


/* DATABASE CONFIGURATION */
/*
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'id7735509_root');
define('DB_PASSWORD', 'mekarsari');
define('DB_DATABASE', 'id7735509_bursakerjaftunj');
define("BASE_URL", "https://bursakerjaftunj.000webhostapp.com/public_html/api/");
define("SITE_KEY", 'yourSecretKey');
*/

function getDB() 
{
	$dbhost=DB_SERVER;
	$dbuser=DB_USERNAME;
	$dbpass=DB_PASSWORD;
	$dbname=DB_DATABASE;
	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbConnection->exec("set names utf8");
	$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbConnection;
}
/* DATABASE CONFIGURATION END */

/* API key encryption */
function apiToken($session_uid)
{
$key=md5(SITE_KEY.$session_uid);
return hash('sha256', $key);
}



?>