<?php
	
	define('USERS_TABLE', 'users');
	
	function add_user($username, $password, $user_table)
	{
		$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE);
		
		$query = sprintf('INSERT INTO %s SET username = "%s", password = "%s"', 
							mysqli_real_escape_string($link, $user_table),
							mysqli_real_escape_string($link, $username), 
							mysqli_real_escape_string($link, sha1($password))
						);
						
		$result = mysqli_query($link, $query);
		
		if($result)
		{
			return true;	
		} else {
			return false;
		}
				
	}
	
	function get_user($identifier)
	{
		$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE);
		
		$username = $_SESSION['username'];
	
		if(isset($username))
		{	
			$query =  mysqli_query($link, "SELECT users.id as id, users.username FROM users WHERE username = '{$username}'");
			
			while($row = mysqli_fetch_array($query))
			{
				//get logged user id and username
				$users_username = $row['username'];
				$users_id = $row['id'];
			}
			
				if($username == $users_username)
				{
					if($identifier == "id" || $identifier == "ID")
					{
						return $users_id;
					}
					
					if($identifier == "username" || $identifier == "USERNAME" || $identifier == "Username")
					{
						return $users_username;
					}
					
				} else {
					header('Location: index.php');
					exit();	
				}
			
			} else {
				header('Location: index.php');
				exit();	
			}
		
	}
?>