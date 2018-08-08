<body>

<?php if(basename($_SERVER['PHP_SELF']) == 'messages.php') { ?>
<div data-role="header" data-theme="b">
	<a data-icon="bars" data-iconpos="notext" href="../menu.php" data-ajax="false">Home</a>
	<h1 id="logo"><img src="css/themes/images/QDashboard.png" alt="Q Dashboard"></h1> 
</div>
<div class="container">
  <div class="row">
	<div class="greatings">
    	<a href="../includes/logout.php" class="pull-right" style="margin-top: 15px;">Log Out</a>
    	<p class="pull-left">
        	<img src="<?php echo profile_picture($msg->logged_user_id, $base_url); ?>" width="50" height="50" />
			<?php echo $msg->return_display_name($msg->logged_user_id); ?>
        </p>
    </div>
  </div>
</div>
<?php } ?>