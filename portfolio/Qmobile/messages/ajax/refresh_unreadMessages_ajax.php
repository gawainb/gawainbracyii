<?php
	include('../includes/loader_ajax.php');

	if(isset($_POST['id']) || isset($_POST['uid']))
	{
		if(isset($_POST['id']))
		{
			$id = $db->escape($_POST['id']);
		} else {
			$id = $db->escape($_POST['uid']);	
		}
		
		$list_unread_messages = $msg->get_unread_messages_count_by_user();
		if($list_unread_messages)
		{
			foreach($list_unread_messages as $c)
			{
				$list_unread_message[$c['user_id']] = $c['counted'];
			}
		} 

		if(isset($list_unread_message[$id]))
		{
			echo $list_unread_message[$id];
		} 
	}
?>
