<?php

	// Create a user connection
    $app->get('/connect/user/:user_id/friend/:friend_id', function ($user_id, $friend_id) {
		
		$db = getConn();
		
		// Insert statement
		$sql_stmt = "INSERT INTO `user_conn`
					(`user_id`, `friend_id`)
					VALUES ('".$user_id."','".$friend_id."')";
		
		// Submit to database
		$action = $db->prepare($sql_stmt);
		$action->execute();
		
		// Return results
		$success['result'] = $action->rowCount();
		header("Content-Type: application/json");
		echo json_encode($success);
		
	});
	
	// Create a user connection
    $app->get('/connect/user/:user_id/friend/:friend_id', function ($user_id, $friend_id) {
		
		$db = getConn();
		
		// Insert statement
		$sql_stmt = "INSERT INTO `user_conn`
					(`user_id`, `friend_id`)
					VALUES ('".$user_id."','".$friend_id."')";
		
		// Submit to database
		$action = $db->prepare($sql_stmt);
		$action->execute();
		
		// Return results
		$success['result'] = $action->rowCount();
		header("Content-Type: application/json");
		echo json_encode($success);
		
	});
	
	// Delete a user connection
    $app->get('/delete/user/:user_id/friend/:friend_id', function ($user_id, $friend_id) {
		
		$db = getConn();
		
		// Insert statement
		$sql_stmt = "DELETE FROM `user_conn`
					WHERE `user_id` = '".$user_id."' AND `friend_id` = '".$friend_id."'";
		
		// Submit to database
		$action = $db->prepare($sql_stmt);
		$action->execute();
		
		// Return results
		$success['result'] = $action->rowCount();
		header("Content-Type: application/json");
		echo json_encode($success);
		
	});
	
	// Get user connections
    $app->get('/get/friends/:user_id', function ($user_id) {
		
		$db = getConn();
		
		// Insert statement
		$sql_stmt = "SELECT `user`.* FROM `user_conn`
					JOIN `user` ON `user`.`id` = `user_conn`.`friend_id`
					WHERE `user_conn`.`user_id` = '".$user_id."'";
		
		// Submit to database
		$action = $db->prepare($sql_stmt);
		$action->execute();
		
		// Check if user has connections
		if ($action->rowCount() == 0) {
			$success['result'] = "This user does not have any connections.";
		} else {
			// Return results
			$success['result'] = $action->fetchAll(PDO::FETCH_ASSOC);
			header("Content-Type: application/json");
		}
		
		echo json_encode($success);
		
	});

?>