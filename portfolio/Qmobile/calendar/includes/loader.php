<?php	
	
	if(basename($_SERVER['PHP_SELF']) == 'calendar.php' || basename($_SERVER['PHP_SELF']) == 'calendar_add_event.php')
	{
		include_once 'includes/db_connect.php';
		include_once 'includes/functions.php';
		
		// Database Connection
		include('calendar/includes/connection.php');
		
		// Calendar Class
		include('calendar/includes/calendar.php');
		
		// Embed Class
		include('calendar/includes/embed.php');
		
		// Formater Class
		include('calendar/includes/formater.php');
		
	} else {
		include_once '../../includes/db_connect.php';
		include_once '../../includes/functions.php';
		
		// Database Connection
		include('connection.php');
	
		// Calendar Class
		include('calendar.php');
	
		// Embed Class
		include('embed.php');
	
		// Formater Class
		include('formater.php');
	}
		
	sec_session_start();
	 
	if (login_check($mysqli) == true) {
		$logged = 'in';
	} else {
		$logged = 'out';
	}
	
	
	// Search
	if(isset($_POST['search']) && strlen($_POST['search']) !== 0)
	{
		$_SESSION['condition'] = " title OR description LIKE '%".$_POST['search']."%'";	
	}
	
	// Starts the Calendar Class @params 'DB Server', 'DB Username', 'DB Password', 'DB Name', 'Table Name', [$condition]
	if(isset($_POST['filter']) && !strlen($_POST['filter']) !== 0)
	{
		$filter = $_POST['filter'];
		$_SESSION['filter'] = $filter;
		if($filter == 'all-fields')
		{
			$_SESSION['condition'] = "user_id = '".$_SESSION['user_id']."'";
		} else {
			$_SESSION['condition'] = "category = '".$filter."'" . " AND user_id = '".$_SESSION['user_id']."'";	
		}
		
		$calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE, $_SESSION['condition']);
	} elseif(isset($_SESSION['condition']) && strlen($_SESSION['condition']) !== 0) {
		$calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE, $_SESSION['condition']);
	} else {
		if(basename($_SERVER['PHP_SELF']) !== 'index.php')
		{
			$_SESSION['condition'] = "user_id = '".$_SESSION['user_id']."'";
			$calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE, $_SESSION['condition']);	
		} else {
			$calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE);		
		}
			
	}
	
	// Set Categories
	if(isset($categories))
	{
		$calendar->categories = $categories;
	} else {
		$calendar->categories = array('General');	
	}
	
?>