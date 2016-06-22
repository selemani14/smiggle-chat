<?php
require_once('app/views.php');
require_once('app/router.php');
require_once('app/model.php');
require_once('app/globalVars.php');
require_once('app/chatcontroller.php');
require_once('app/chatPagecontroller.php');
require_once('app/restfulAPIcontroller.php');
require_once('app/indexcontroller.php');
require_once('app/ioc.php');
require_once('app/config.php');

// Register databased details
IOC::register('database', function()
	{
		// Uaw constants defined in from config file
		return new model(array(DB_HOST,DB_NAME,DB_USER,DB_PASSWORD));
	});

IOC::register('PDO', function($server,$database, $user,$password)
	{
		return new PDO("mysql:host=$server;dbname=$database", "$user", "$password");
	});
IOC::register('g_variables', function()
	{
		return new globalVars();
	});	
IOC::register('views', function()
	{
		return new views();
	});

	
$dispatch = new router();	
$dispatch->gets();
?>