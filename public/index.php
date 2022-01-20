<?php
//configure Cors Resource sharing
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type:application/json");
//require auto loader for slim
require '../vendor/autoload.php';

//enable error reporting
$configuration = [
	'settings' => [
		'displayErrorDetails' => true,
	],
];
$container = new \Slim\Container($configuration);

//fire slim app
$app = new \Slim\App($container);
//require google sheet helper class
require '../src/helpers/google-Sheets.class.php';
//require the routes file
require '../src/routs/api.php';
//run slim application
$app->run();