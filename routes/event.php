<?php 
	
	// Create a new event
    $app->get('/event/create/:name/:datetime/:location/:description/:min_req/:max_req/', function ($name, $datetime, $location, $description, $min_req, $max_req) {
		
		$db = getConn();
		
		// Insert statement
		$sql_stmt = "INSERT INTO `event`
					(`name`, `datetime`, `location`, `description`, `min_req`, `max_req`)
					VALUES (:name,'".$datetime."',:location, :description,'".$min_req."','".$max_req."')";
		
		// Submit to database
		$action = $db->prepare($sql_stmt);
		$action->bindValue(':name', $name, PDO::PARAM_STR);
		$action->bindValue(':location', $location, PDO::PARAM_STR);
		$action->bindValue(':description', $description, PDO::PARAM_STR);
		$action->execute();
		
		// Return results
		$success['result'] = $action->rowCount();
		header("Content-Type: application/json");
		echo json_encode($success);
		
	});
	
	// Edit an event
    $app->get('/event/edit/:id/:name/:datetime/:location/:description/:min_req/:max_req/', function ($id, $name, $datetime, $location, $description, $min_req, $max_req) {
		
		$db = getConn();
		
		// Update statement
		$sql_stmt = "UPDATE `event`
					SET `name` = :name, `datetime` = '".$datetime."', `location` = :location, `description` = :description, min_req = '".$min_req."', max_req = '".$max_req."'
					WHERE `id` = ".$id;
		
		// Submit to database
		$action = $db->prepare($sql_stmt);
		$action->bindValue(':name', $name, PDO::PARAM_STR);
		$action->bindValue(':location', $location, PDO::PARAM_STR);
		$action->bindValue(':description', $description, PDO::PARAM_STR);
		$action->execute();
		
		// Return results
		$success['result'] = $action->rowCount();
		header("Content-Type: application/json");
		echo json_encode($success);
		
	});
	
	// Delete an event
    $app->get('/event/delete/:id/', function ($id) {
		
		$db = getConn();
		
		// Update statement
		$sql_stmt = "DELETE FROM `event`
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