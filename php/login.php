<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/15/2016
 * Time: 6:40 PM
 */

if (isset($_POST['btn-login'])) {
    $email = $conn->real_escape_string(trim($_POST['email']));
    $password = $conn->real_escape_string(trim($_POST['password']));

    $query = $conn->query("SELECT userID, email, password FROM users WHERE email='$email'");
    $row = $query->fetch_array();

    if (password_verify($password, $row['password'])) {
        $_SESSION['userSession'] = $row['userID'];
        header("Location: home.php");
    } else {
        $msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Log in failed. <a href='forgotpassword.php'>Forgot your password?</a>
				</div>";
    }

    $conn->close();

}

?>