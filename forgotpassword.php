<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/14/2016
 * Time: 2:32 PM
 */


session_start();
if (isset($_SESSION['userSession']) != "") {
    header("Location: home.php");
}
include_once 'php/connectDB.php';

if (isset($_POST['forgot'])) {
    $email = $conn->real_escape_string(trim($_POST['email']));
    $new_hash = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    if ($conn->query("UPDATE users SET password ='$new_hash' WHERE email='$email'")) {

        $msg = "<div class='alert alert-success'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; You have successfully reset your password.
				</div>";
    } else {
        $msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; You are not a member.<a href='register.php'>Sign up now!</a>
					</div>";
    }
}

$conn->close();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reset Password</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css"/>

</head>
<body class="index-background">

<div class="signin-form">

    <div class="container">

        <div class="jumbotron center-block" style="width: 70%;margin-top: 10%;">
        <form class="form-signin" method="post" id="register-form">

            <h2 class="form-signin-heading">Forgot your password?</h2>
            <hr/>

            <?php
            if (isset($msg)) {
                echo $msg;
            } else {
            }
            ?>


            <div class="form-group">
                <input maxlength="40" type="email" class="form-control" placeholder="Email address" name="email" required/>
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                <input maxlength="100" type="password" class="form-control" placeholder="Password" name="new_password" required/>
            </div>

            <hr/>

            <div class="form-group">
                <button type="submit" class="btn index-btn hidden-xs" name="forgot">
                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Reset your Password
                </button>

                <a href="index.php" class="btn index-btn hidden-xs" style="float:right;">Log In Here</a>

            </div>

        </form>
            </div>

    </div>

</div>

</body>
</html>