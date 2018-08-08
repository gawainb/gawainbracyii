<?php
	include('../includes/loader_ajax.php');

	if(isset($_POST['id']) && isset($_POST['uid']))
	{
		$message_id = $db->escape($_POST['id']);
		
		$user_id = $db->escape($_POST['uid']);
					
		$ok = $msg->delete_message($message_id, $user_id);
				
		if($ok) 
		{
			echo true;
		} else {
			echo false;	
		}
	}
?>
