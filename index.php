<?php
	require 'vendor/autoload.php';
	require 'conn.php';
	
	// Initiate app and set debug to 'true'
	$app = new \Slim\Slim();
	$app->config('debug', true);

	// User controller
	include('routes/user.php');
	
	// Event controller
	include('routes/event.php');
	
	// Run app
	$app->run();
	
?>