<?php

	// Create a user-event connection
    $app->get('/connect/event/:event_id/user/:user_id', function ($event_id, $user_id) {
		
		$db = getConn();
		
		// Insert statement
		$sql_stmt = "INSERT INTO `invite`
					(`event_id`, `user_id`)
					VALUES ('".$event_id."','".$user_id."')";
		
		// Submit to database
		$action = $db->prepare($sql_stmt);
		$action->execute();
		
		// Return results
		$success['result'] = $action->rowCount();
		header("Content-Type: application/json");
		echo json_encode($success);
		
	});
	
	// Set user to 'attending'
    $app->get('/attend/event/:event_id/user/:user_id', function ($event_id, $user_id) {
		
		$db = getConn();
		
		// Insert statement
		$sql_stmt = "UPDATE `invite`
					SET `attending`='1'
					WHERE `event_id` = '".$event_id."' AND `user_id` = '".$user_id."'";
		
		// Submit to database
		$action = $db->prepare($sql_stmt);
		$action->execute();
		
		// Return results
		$success['result'] = $action->rowCount();
		header("Content-Type: application/json");
		echo json_encode($success);
		
	});
	
	// Set user to 'not attending'
    $app->get('/decline/event/:event_id/user/:user_id', function ($event_id, $user_id) {
		
		$db = getConn();
		
		// Insert statement
		$sql_stmt = "UPDATE `invite`
					SET `attending`='0'
					WHERE `event_id` = '".$event_id."' AND `user_id` = '".$user_id."'";
		
		// Submit to database
		$action = $db->prepare($sql_stmt);
		$action->execute();
		
		// Return results
		$success['result'] = $action->rowCount();
		header("Content-Type: application/json");
		echo json_encode($success);
		
	});
	
	// Delete event invite
    $app->get('/delete/event/:event_id/user/:user_id', function ($event_id, $user_id) {
		
		$db = getConn();
		
		// Insert statement
		$sql_stmt = "DELETE FROM `invite`
					WHERE `event_id` = '".$event_id."' AND `user_id` = '".$user_id."'";
		
		// Submit to database
		$action = $db->prepare($sql_stmt);
		$action->execute();
		
		// Return results
		$success['result'] = $action->rowCount();
		header("Content-Type: application/json");
		echo json_encode($success);
		
	});

?>