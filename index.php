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
	// Comment controller
	include('routes/comment.php');
	
	
	/* Relational Database controllers */
	
	// User-Event Connection controller
	include('routes/user_event_conn.php');
	// User-User Connection controller
	include('routes/user_user_conn.php');
	
	// Run app
	$app->run();
	
?>