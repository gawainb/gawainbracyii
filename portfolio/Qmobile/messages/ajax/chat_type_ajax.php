<?php
	include('../includes/loader_ajax.php');
	
	if(isset($_POST['status']) || isset($_POST['id']))
	{
		if(isset($_POST['id'])) 
		{
			$id = $db->escape($_POST['id']);	
		} else {
			$id = '';	
		}
		
		if(isset($_POST['status']))
		{
			$status = $db->escape($_POST['status']);
		} else {
			$status = 'stopped';	
		}
		
		$res = $msg->chat_type($status, $id);
		
		echo $res;
	}
?>
