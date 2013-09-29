<?php 
	
	// Create a new user
    $app->get('/user/create/:name/', function ($name) {
		
		$db = getConn();
		
		// Insert statement
		$sql_stmt = "INSERT INTO `user`
					(`name`)
					VALUES ('".$name."')";
		
		// Submit to database
		$action = $db->prepare($sql_stmt);
		$action->execute();
		
		// Return results
		$success['result'] = $action->rowCount();
		header("Content-Type: application/json");
		echo json_encode($success);
		
	});
	
	// Update a user
    $app->get('/user/update/:id/:zip/', function ($id, $zip) {
		
		$db = getConn();
		
		// Update statement
		$sql_stmt = "UPDATE `user`
					SET `zip` = '".$zip."'
					WHERE `id` = ".$id;
		
		// Submit to database
		$action = $db->prepare($sql_stmt);
		$action->execute();
		
		// Return results
		$success['result'] = $action->rowCount();
		header("Content-Type: application/json");
		echo json_encode($success);
		
	});
	
	// Delete a user
    $app->get('/user/delete/:id', function ($id) {
		
		$db = getConn();
		
		// Update statement
		$sql_stmt = "DELETE FROM `user`
					WHERE `id` = ".$id;
		
		// Submit to database
		$action = $db->prepare($sql_stmt);
		$action->execute();
		
		// Return results
		$success['result'] = $action->rowCount();
		header("Content-Type: application/json");
		echo json_encode($success);
		
	});
	
?>