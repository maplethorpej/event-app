<?php 

	// Create a new event
    $app->get('/event/create/:creator/:name/:datetime/:location/:description/:min_req/:max_req/', function ($creator, $name, $datetime, $location, $description, $min_req, $max_req) {

		$db = getConn();

		// Insert statement
		$sql_stmt = "INSERT INTO `event`
					(`creator``name`, `datetime`, `location`, `description`, `min_req`, `max_req`)
					VALUES ('".$creator."',:name,'".$datetime."',:location, :description,'".$min_req."','".$max_req."')";

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
    $app->get('/event/edit/:id/:name/:datetime/:location/:description/:min_req/:max_req', function ($id, $name, $datetime, $location, $description, $min_req, $max_req) {

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
    $app->get('/event/delete/:id', function ($id) {

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
	
	// Get event details
	$app->get('/event/details/:id', function ($id) {
		
		$db = getConn();
		
		$sql = "SELECT * FROM `event` WHERE `id` = '".$id."'";
		
		// Submit to database
		$event_details = $db->prepare($sql);
		$event_details->execute();
		$event = $event_details->fetchAll(PDO::FETCH_ASSOC);

		// Select associated users
		$sql_stmt = "SELECT `user`.*
					FROM `event`
					JOIN `invite` ON `invite`.`event_id` = `event`.`id`
					JOIN `user` ON `user`.`id` = `invite`.`user_id`
					WHERE `event`.`id` = '".$id."'";

		// Submit to database
		$user_list = $db->prepare($sql_stmt);
		$user_list->execute();
		$users = $user_list->fetchAll(PDO::FETCH_ASSOC);
		
		// Select associated comments
		$sql_stmt2 = "SELECT `comment`.*
					FROM `event`
					JOIN `comment` ON `comment`.`event_id` = `event`.`id`
					WHERE `event`.`id` = '".$id."'";
					
		// Submit to database
		$comment_list = $db->prepare($sql_stmt2);
		$comment_list->execute();
		$comments = $comment_list->fetchAll(PDO::FETCH_ASSOC);

		// Return results
		$success['event'] = $event;
		$success['users'] = $users;
		$success['comments'] = $comments;
		header("Content-Type: application/json");
		echo json_encode($success);
		
	});


?>