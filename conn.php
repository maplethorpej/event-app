<?php
	
function getConn() {
	/* Local connection */
	$dsn = 'mysql:dbname=event-app;host=localhost';
	$user = 'root';
	$password = 'root';
	$PDO = new PDO($dsn, $user, $password);
	$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $PDO;
}

?>