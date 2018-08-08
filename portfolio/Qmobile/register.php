<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Q Dashboard: Registration Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/themes/qDashboard.css">
        <link rel="stylesheet" type="text/css" href="../css/themes/jquery.mobile.icons.min.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.mobile-1.4.5.css" />
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
    </head>
    <body>
        <!-- Register Page -->
        <div data-role="page" id="register">
            <div data-role="header" data-theme="b"> 
                <h1 id="logo"><img src="../css/themes/images/QDashboard.png" alt="Q Dashboard"></h1> 
            </div>
            <div align="center" data-role="content" id="navigation">
                <!-- Registration form to be output if the POST variables are not
                set or if the registration script caused an error. -->
                <h1>Register With Us</h1>
                <?php
                if (!empty($error_msg)) {
                    echo $error_msg;
                }
                ?>
                <div class="ui-grid-b"> 
                    <div class="ui-body">
                        <ul id="reglist">
                            <div data-role="fieldcontain">
                                <li>Usernames may contain only digits, upper and lower case letters and underscores.</li>
                            </div>
                            <div data-role="fieldcontain">
                                <li>Emails must have a valid email format.</li>
                            </div>
                            <div data-role="fieldcontain">
                                <li>Passwords must be at least 6 characters long.</li>
                            </div>
                            <div data-role="fieldcontain">
                                <li>Passwords must contain:
                                <ul>
                                    <div data-role="fieldcontain">
                                        <li>At least one upper case letter (A...Z).</li>
                                        <li>At least one lower case letter (a...z).</li>
                                        <li>At least one number (0...9).</li>
                                    </div>
                                </ul>
                            </li>
                            </div>
                            <div data-role="fieldcontain">
                                <li>Your password and confirmation must match exactly.</li>
                            </div>
                        </ul>
                    </div>
                </div>
                <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
                        method="post" 
                        name="registration_form">
                    Username: <input type='text' 
                        name='username' 
                        id='username' /><br>
                    Email: <input type="text" name="email" id="email" /><br>
                    Password: <input type="password"
                                     name="password" 
                                     id="password"/><br>
                    Confirm password: <input type="password" 
                                             name="confirmpwd" 
                                             id="confirmpwd" /><br>
                    <input type="button" 
                           value="Register" 
                           onclick="return regformhash(this.form,
                                           this.form.username,
                                           this.form.email,
                                           this.form.password,
                                           this.form.confirmpwd);" /> 
                </form>
                <p>Return to the <a href="index.php" data-ajax="false">login page</a>.</p>
            </div> <!-- Content End -->
        <div> <!-- End Page #register -->
            <script type="text/javascript" src="js/retina.min.js"></script>
    </body>
</html>