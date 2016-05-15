<?php
session_start();
if(isset($_SESSION['userSession'])!="")
{
	header("Location: home.php");
}
include_once 'php/connectDB.php';

if(isset($_POST['btn-signup']))
{
	$uname = $conn->real_escape_string(trim($_POST['username']));
	$email = $conn->real_escape_string(trim($_POST['email']));
	$upass = $conn->real_escape_string(trim($_POST['password']));

	$new_password = password_hash($upass, PASSWORD_DEFAULT);

    $check_uname = $conn->query("SELECT username FROM users WHERE username='$uname'");
	$check_email = $conn->query("SELECT email FROM users WHERE email='$email'");
	$count=$check_email->num_rows;
    $count2=$check_uname->num_rows;

	if($count==0 && $count2==0){


		$query = "INSERT INTO users(username,email,password) VALUES('$uname','$email','$new_password')";


		if($conn->query($query))
		{
			$msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Welcome!
					</div>";
		}
		else
		{
			$msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Something is not right. Please try again later.
					</div>";
		}
	}
	else{


		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Username is taken / Email is already registered here. <a href='index.php'>Already a member?</a>
				</div>";

	}

	$conn->close();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css"/>

</head>
<body class="index-background">

<div class="signin-form">

	<div class="container">

		<div class="jumbotron center-block" style="width: 70%;margin-top: 10%;">
       <form class="form-signin" method="post" id="register-form">

        <h2 class="form-signin-heading" style="text-align: center;">Sign up Here!</h2><hr />

        <?php
		if(isset($msg)){
			echo $msg;
		}
		else{
		}
		?>

        <div class="form-group">
        <input maxlength="40" type="text" class="form-control" placeholder="Username" name="username" required  />
        </div>

        <div class="form-group">
        <input maxlength="40" type="email" class="form-control" placeholder="Email address" name="email" required  />
        <span id="check-e"></span>
        </div>

        <div class="form-group">
        <input maxlength="100" type="password" class="form-control" placeholder="Password" name="password" required  />
        </div>

     	<hr />

        <div class="form-group">
            <button type="submit" class="btn index-btn" name="btn-signup">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
			</button>

            <a href="index.php" class="btn index-btn" style="float:right;">Log In Here</a>

        </div>

      </form>
			</div>

    </div>

</div>

</body>
</html>