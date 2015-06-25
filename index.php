<?php

// Require Loader
if(file_exists("app/libraries/Autoload.php"))
	require_once("app/libraries/Autoload.php");

// Initialize all requires classes
Autoload::init();

// To avoid triggering a PHP notice, we can't use array elements that do not exists
if(!isset($_GET['url']))
	$_GET['url'] = '/';

$router = new Router($_GET['url']);

$router->setDefaultController('HomeController');
$router->setDefaultAction('index');

$router->parse();

$controller = $router->getController();
$action = $router->getAction();
$arguments = $router->getArguments();

$controllerClass = Controller::factory($controller);
$actionName = $action;

// This is the key part, we call a method that has a name stored in $stored
$controllerClass->$actionName($arguments);