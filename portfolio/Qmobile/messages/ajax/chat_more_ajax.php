<?php
	include('../includes/loader_ajax.php');
	
	if(isset($_POST['lastid']) && isset($_POST['uid']))
	{
		$lastid = intval($db->escape($_POST['lastid']));
		$lastid = $lastid + $perpage;
		$user_id = $db->escape($_POST['uid']);
		
		$load_more = true;
				
		include('../html_chat.php');
	}
	
?>
