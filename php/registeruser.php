<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/15/2016
 * Time: 7:45 PM
 */
if (isset($_POST['btn-signup'])) {
    $uname = $conn->real_escape_string(trim($_POST['username']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $upass = $conn->real_escape_string(trim($_POST['password']));

    $new_password = password_hash($upass, PASSWORD_DEFAULT);

    $check_uname = $conn->query("SELECT username FROM users WHERE username='$uname'");
    $check_email = $conn->query("SELECT email FROM users WHERE email='$email'");
    $count = $check_email->num_rows;
    $count2 = $check_uname->num_rows;

    if ($count == 0 && $count2 == 0) {


        $query = "INSERT INTO users(username,email,password) VALUES('$uname','$email','$new_password')";


        if ($conn->query($query)) {
            $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Welcome!
					</div>";
        } else {
            $msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Something is not right. Please try again later.
					</div>";
        }
    } else {


        $msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Username is taken / Email is already registered here. <a href='index.php'>Already a member?</a>
				</div>";

    }

    $conn->close();
}
?>