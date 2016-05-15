<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/15/2016
 * Time: 7:44 PM
 */

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