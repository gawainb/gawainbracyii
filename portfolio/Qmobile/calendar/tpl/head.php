<?php
	if(isset($_GET['action']) && $_GET['action'] == 'logout')
	{
		$_SESSION = array();
		header('Location: index.php');
		exit();
	}
?>

