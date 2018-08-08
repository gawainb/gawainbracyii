<?php
	include('../includes/loader_ajax.php');
	
	header('Content-Type: text/html; charset=utf-8');

	if(isset($_POST['id']))
	{
		$user_id = $db->escape($_POST['id']);

		$cdata = $msg->get_messages($user_id);
		
		if($cdata) 
		{
			include('../html_chat.php');
		} else {
			include('../html_chat_start.php');	
		}
	}
?>
