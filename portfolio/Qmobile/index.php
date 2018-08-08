<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Q Dashboard: Secure Login</title>
		<link rel="stylesheet" type="text/css" href="css/themes/qDashboard.css">
		<link rel="stylesheet" type="text/css" href="css/themes/jquery.mobile.icons.min.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.mobile-1.4.5.css" />
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	</head>
	<body>
		
		<!-- Login Page -->
		<div data-role="page" id="loginPage">  
			<div data-role="header" data-theme="b">  
			 
			<h1 id="logo"><img src="css/themes/images/QDashboard.png" alt="Q Dashboard"></h1> 
			</div>  
			<div align="center" data-role="content" id="contentConfirmation" name="contentConfirmation">
			<?php
		        if (isset($_GET['error'])) {
		            echo '<p class="error">Error Logging In!</p>';
		        }
	        ?>   
				<form id="HLogin" action="includes/process_login.php" method="POST" name="login_form">  
					<div data-role="fieldcontain">  
					<label for="text-basic">Email:*</label>  
					          <input class="required" id="text-basic" name="email" type="text" value="">            
					</div>  
					<div data-role="fieldcontain">  
					<label for="password">Password:*</label>  
					          <input id="password" name="password" type="password" value="">            
					</div>  
					<div class="ui-grid-a">  

					<button class="ui-btn ui-btn-inline ui-corner-all" id="login" data-enhanced="true" data-theme="a" type="submit" data-ajax="false" onclick="formhash(this.form, this.form.password);" >Login</button> 
					 
					</div>   
				</form>
				<p>If you don't have a login, please <a href="register.php">register</a>.</p>
        		<p>If you are done, please <a href="../includes/logout.php">log out</a>.</p>
        		<p>You are currently logged <?php echo $logged ?>.</p>  
			</div>
			<div data-role="footer" data-theme="b" data-position="fixed">
				<h4>Powered by PVDC Hosting</h4>
			</div>  
		</div>
		<script type="text/javascript" src="js/retina.min.js"></script>
	</body>
</html>