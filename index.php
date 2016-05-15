<?php
session_start();
include_once 'php/connectDB.php';

if (isset($_SESSION['userSession']) != "") {
    header("Location: home.php");
    exit;
}
include 'php/login.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>GasPedaal Phone Notes</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<body class="index-background">

<div class="signin-form">

    <div class="container">

        <div class="jumbotron center-block" style="width: 70%;margin-top: 10%;">
        <form class="form-signin" method="post" id="login-form">
            <img src="img/login-logo.png" class="center-block">
            <hr/>

            <?php
            if (isset($msg)) {
                echo $msg;
            }
            ?>

            <div class="form-group">
                <input maxlength="40" type="email" class="form-control" placeholder="Email address" name="email"
                       required/>
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                <input maxlength="100" type="password" class="form-control" placeholder="Password" name="password"
                       required/>
            </div>

            <hr/>

            <div class="form-group">
                <button type="submit" class="btn index-btn" name="btn-login" id="btn-login">
                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
                </button>

                <a href="register.php" class="btn index-btn" style="float:right;">Sign up Here!</a>

            </div>


        </form>
    </div>

</div>

</div>

</body>
</html>