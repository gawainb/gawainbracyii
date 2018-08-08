<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
 
if (! $error) {
    $error = 'Oops! An unknown error happened.';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Q Dashboard: Error Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/themes/qDashboard.css">
        <link rel="stylesheet" type="text/css" href="../css/themes/jquery.mobile.icons.min.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.mobile-1.4.5.css" />
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    </head>
    <body>
        <div data-role="page" id="errorpage">
            <div data-role="header" data-theme="b"> 
                <h1 id="logo"><img src="../css/themes/images/QDashboard.png" alt="Q Dashboard"></h1> 
            </div>
            <div align="center" data-role="content" id="navigation">
                <h1>There was a problem</h1>
                <p class="error"><?php echo $error; ?></p>
            </div>
        </div>  
    </body>
</html>