<?php include_once('calendar/includes/loader.php'); ?>
<!DOCTYPE html> 
<html> 
	<head> 
	<title> Q Dashboard: Calendar</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/themes/qDashboard.css">
	<link rel="stylesheet" type="text/css" href="css/themes/jquery.mobile.icons.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.mobile-1.4.5.css" />
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/fontello.css">
	<link rel="stylesheet" href="css/jw-jqm-cal.ios7.css" />
    
    <!-- Calendar Required Styles -->
    <link href="calendar/css/bootstrap.css" rel="stylesheet">
    <link href="calendar/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="calendar/css/style.css" rel="stylesheet">
    <link href="calendar/css/ui-lightness/jquery-ui.css" rel="stylesheet">
    <link href="calendar/css/fullcalendar.css" rel="stylesheet">
    <link href="calendar/lib/colorpicker/css/colorpicker.css" rel="stylesheet">
    <link href="calendar/lib/validation/css/validation.css" rel="stylesheet">
    
    <link href="calendar/lib/timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet">
    <!-- // Calendar Required Styles -->
    
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

	</head> 
	<body> 
		<!-- Calendar Page -->
		<div data-role="page" id="view-calendar" data-theme="a">
			<div data-role="header" data-theme="b">
				<a data-icon="bars" data-iconpos="notext" href="../menu.php" data-ajax="false">Home</a>
				<h1 id="logo"><img src="css/themes/images/QDashboard.png" alt="Q Dashboard"></h1> 
			</div>
			<?php if (login_check($mysqli) == true) : ?>
            
			<div align="center" data-role="content">
				
                <?php
					include 'calendar/add_event.php';
				?>
                
			</div>
            
			<!-- FOOTER -->
			<div data-role="footer" data-position="fixed" class="nav-glyphish-example" data-theme="b">
				<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
					<ul>
						<li><a href="sales.php" class="icon-chart-bar" data-icon="custom" data-ajax="false">Sales Report</a></li>
						<li><a href="calendar.php" class="icon-calendar" data-icon="custom" data-ajax="false" class="ui-btn-active ui-state-persist">Calendar</a></li>
						<li><a href="imessages.php" class="icon-chat" data-icon="custom" data-ajax="false">Message</a></li>
						<li><a href="includes/logout.php" class="icon-logout" data-icon="custom" data-ajax="false">Log Out</a></li>
					</ul>
				</div>
			</div>
			<?php else : ?>
                <p style="text-align : center;">
                    <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
                </p>
            <?php endif; ?>
		</div>
	</body>
</html>