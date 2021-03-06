<?php

require 'components/connection.php';
session_start();
if(!isset($_SESSION['email']))
{
    header("Location: index.php");
}




if(isset($_POST['save']))
{
    if ($_POST['password'] !== $_POST['confirm_password'])
    {

        $msg='Password should match!';   
    }
    else
    {
    $_SESSION['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $password=$_SESSION['password'];
	$email=$_SESSION['email'];

	
	if($_POST['otpvalue'] == $_SESSION['otp'] )
	{   $sql = "UPDATE user SET password='$password' WHERE email='$email'";
        $stmt = $con->prepare($sql);
		$stmt->bindParam(':password',$password,PDO::PARAM_STR);
        $stmt->execute(['password'=>$_SESSION['password']]);
	echo "<script>alert('Password changed succesfully!');</script>";

 	session_unset();
 	session_destroy();
 	header("Location: login.php");
        
	}
	 else
	{ 
	    echo "<script>alert('Invalid OTP')</script>";
	}
}
}

?>

<!DOCTYPE html>
<html>

<head>
    <?php include 'components/head.html' ?>
    <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <script src="js/signup_validation.js"></script>
</head>

<body>
    <?php include 'components/header.php' ?>
    <div class="container" style="height: 100%;">

        <div class="signup-form">
            <h1>OTP</h1>
            <p>Check your email for the OTP.</p>
            <form action="#" method="post" id="fileForm" role="form">
                <div class="form-group">
                    <label for="name"><span class="req"></span> Enter OTP:</label>
                    <input class="form-control" type="text" name="otpvalue" id="user_otp" onkeyup="Validate(this)"
                        required />
                </div>
                <div class="form-group">
                    <label for="password"><span class="req"></span> New Password: </label>
                    <input required name="password" type="password" class="form-control inputpass" minlength="4"
                        maxlength="16" id="pass1" /> </p>

                    <label for="confirm_password"><span class="req"></span> Confirm Password: </label>
                    <input required name="confirm_password" type="password" class="form-control inputpass" minlength="4"
                        maxlength="16" placeholder="Enter again to validate" id="pass2"
                        onkeyup="checkPass(); return false;" />
                    <span id="confirmMessage" class="confirmMessage"></span> </p>
                </div>
                <div class="form-group">
                    <hr>
                    <input class="btn btn-success" type="submit" name="save" value="Confirm">
                    <span class="loginMsg"><?php echo @$msg;?></span>
                </div>
            </form>
            <div><?php if(isset($message)) { echo $message; } ?>
            </div>
            <hr>
        </div>
    </div>
    <?php include('components/footer.html'); ?>




</body>

</html>