<?php
	include_once '../../includes/db_connect.php';
	include_once '../../includes/functions.php';
	
	include('../../messages/includes/connection.php');

	include('../../messages/includes/database.class.php');
	
	$db = new ConnectMe(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE);

	include('../../messages/includes/messages.class.php');
	
	$msg = new Messages();
	
	include('../../messages/includes/demo.functions.php');
	// include('demo.session.php');
	
	sec_session_start();
	 
	if (login_check($mysqli) == true) {
		$logged = 'in';
	} else {
		$logged = 'out';
	}
	
	$msg->logged_user_id = @$_SESSION['user_id'];
		
	include('../../messages/includes/embed.php');
	
	include('../../messages/includes/attachments.class.php');
	
	include('../../messages/includes/maps.class.php');
	
?>