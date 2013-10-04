<?php 
	
	// Create a new comment
    $app->get('/comment/create/:user_id/:event_id/:comment', function ($user_id, $event_id, $comment) {
		
		$db = getConn();
		
		// Insert statement
		$sql_stmt = "INSERT INTO `comment`
					(`user_id`, `event_id`, `comment`)
					VALUES ('".$user_id."','".$event_id."',:comment)";
		
		// Submit to database
		$action = $db->prepare($sql_stmt);
		$action->bindValue(':comment', $comment, PDO::PARAM_STR);
		$action->execute();
		
		// Return results
		$success['result'] = $action->rowCount();
		header("Content-Type: application/json");
		echo json_encode($success);
		
	});
	
	// Delete a comment
    $app->get('/comment/delete/:id', function ($id) {
		
		$db = getConn();
		
		// Insert statement
		$sql_stmt = "DELETE FROM `comment`
					WHERE `id` = '".$id."'";
		
		// Submit to database
		$action = $db->prepare($sql_stmt);
		$action->execute();
		
		// Return results
		$success['result'] = $action->rowCount();
		header("Content-Type: application/json");
		echo json_encode($success);
		
	});
	
?>