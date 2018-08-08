<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Q Dashboard: Menu</title>
        <link rel="stylesheet" type="text/css" href="css/themes/qDashboard.css">
        <link rel="stylesheet" type="text/css" href="css/themes/jquery.mobile.icons.min.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.mobile-1.4.5.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.smarticker.css">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    </head>
    <body>
        <!-- Menu Page -->
        <div data-role="page" id="menu">
            <div data-role="header" data-theme="b"> 
                <h1 id="logo"><img src="css/themes/images/QDashboard.png" alt="Q Dashboard"></h1> 
            </div>
            <?php if (login_check($mysqli) == true) : ?>
                <p style="text-align : center;">Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
            <div align="center" data-role="content" id="navigation">
                <div class="news">
                    <ul>
                        <li data-subcategory="Latest News" data-category="Q MedRx" data-color="22326F" ><a href="#">New Pharmacy Coming Online with Q medRx</a></li>
                        <li data-subcategory="Latest News" data-category="Q MedRx" data-color="3C3C3C"><a href="#">News Item 2</a></li>
                        <li data-subcategory="Latest News" data-category="Q MedRx" data-color="B1BCD6"><a href="#">News Item 3</a></li>
                    </ul>
                </div>
                <h1>Menu</h1>
                <div class="ui-grid-a"> 
                <div class="ui-body ui-body-a">
                    <a class="ui-btn ui-corner-all" data-enhanced="true" id="sales" href="sales.php" data-ajax="false">Sales Report</a>

                    <a class="ui-btn ui-corner-all" data-enhanced="true" id="calendar" href="calendar.php" data-ajax="false">Calendar</a>

                    <a class="ui-btn ui-corner-all" data-enhanced="true" id="message" data-ajax="false" href="imessages.php">Message</a>

                    <a class="ui-btn ui-corner-all" data-theme="a" data-enhanced="true" id="logOut" data-ajax="false" href="includes/logout.php">Log Out</a>        
                </div>
                </div>
            </div>
            <!-- FOOTER -->
            <div data-role="footer" data-theme="b" data-position="fixed">
                <h4>Powered by PVDC Hosting</h4>
            </div>  
        </div>
        <script type="text/javascript" src="js/jquery.animate.colors.min.js"></script>
        <script type="text/javascript" src="js/jquery.smarticker.js"></script>
        <script type="text/javascript" src="js/retina.min.js"></script>
        <script type="text/javascript"> 
        (function(){
        $('.news').smarticker();
        })();
        </script>
                
            <?php else : ?>
                <p style="text-align : center;">
                    <span class="error">You are not authorized to access this page.</span> Please <a href="../index.php">login</a>.
                </p>
            <?php endif; ?>
        </div> <!-- End Page #menu -->
    </body>
</html>