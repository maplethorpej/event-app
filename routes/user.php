<?php 
	
	// Create a new user
    $app->get('/user/create/:name', function ($name) {
		
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
	
	// Edit a user
    $app->get('/user/edit/:id/:zip', function ($id, $zip) {
		
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
	
	// Retrieve user details
    $app->get('/user/details/:id', function ($id) {
		
		$db = getConn();
		
		// Update statement
		$sql_stmt = "SELECT * FROM `user`
					WHERE `id` = ".$id;
		
		// Submit to database
		$action = $db->prepare($sql_stmt);
		$action->execute();
		
		// Verify user exists
		if ($action->rowCount() == 0) {
			$success['result'] = "This user does not exist.";
		} else {
			// Return results
			$success['result'] = $action->fetchAll(PDO::FETCH_ASSOC);
			header("Content-Type: application/json");
		}
		
		echo json_encode($success);
		
	});
	
?>