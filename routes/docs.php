<?php

$app->get('/docs', function () {
	
?>
	<h1>Documentation</h1>
    
    This documentation will outline the event-app API's routes and explain each other their uses. The routes were intended to be as straightforward as possible, but several deviate from the standard convention. Error messages will also be explained if they exist.

Variables are denoted in blue. All inputs should be URL Encoded.

Note: Tokens will eventually be required.

Create user
/user/create/:name

- Adds a user to the database with an auto_inc ID (will be replaced w/ Facebook connection)
- Facebook profile picture URL will also be included eventually

Edit user
/user/edit/:id/:zip

- Updates the user zip code (5 digits)

Delete user
/user/delete/:id

- Deletes a user

Retrieve user details
/user/details/:id

- Returns all information about a particular user

Create event
/event/create/:creator_id/:name/:datetime/:location/:description/:min_req/:max_req

- Creates an event
- If min_req or max_req are not specified, set to zero

Edit event
/event/edit/:id/:name/:datetime/:location/:description/:min_req/:max_req 


- Submit all fields when editing an event
- Will require a check to verify user's ownership of the event

Delete event
/event/delete/:id

- Deletes an event from the database
- Will require a check to verify user's ownership of the event

Retrieve event details
/event/details/:id

- Returns all information about a particular event, including users attending and comments

Create comment

/comment/create/:user_id/:event_id/:comment

- Creates a comment for an event

Delete comment
/comment/delete/:id

Connect a user with an event
/connect/event/:event_id/user/:user_id

- Invites a user to an event

Set user to 'attend' event
/attend/event/:event_id/user/:user_id

- Sets 'attending' to one


Set user to 'decline' event
/decline/event/:event_id/user/:user_id 

- Sets 'attending' to zero

Deletes an event invite
/delete/event/:event_id/user/:user_id

- Removes invite from database

Connect a user with another user
/connect/user/:user_id/friend/:friend_id

- Makes a one-way connection to another user

Removes a user connection
/delete/user/:user_id/friend/:friend_id

- Removes one-way user connection

Retrieve a user's connections
/get/friends/:user_id

- Returns details of user's connections
    
<?

});
	
?>