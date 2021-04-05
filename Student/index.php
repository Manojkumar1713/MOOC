<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student Login / Signup</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/kare_icon.ico" />
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

<style>

.footer {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  color: white;
  text-align: center;
}

</style>

</head>
<body>
<?php 
// $rootDir = basename(__DIR__);

include "StudentDetails.php";
if(isset($_POST['Submit'])) { 
    $buttonClick = new StudentDetails;
	$buttonClick->PostData();
	echo("<script> alert('Student Account Created Successfully');</script>");
	echo("<script>location.href = './index.php';</script>");

} 
?>

<?php if(isset($_GET['create_user'])) { ?>

<div class="limiter">
<div class="container-login100" style="background-image: url('images/kare.jpg');">
<div class="wrap-login100 p-t-190 p-b-30">
<form action="" method="post" class="login100-form validate-form">
<div class="login100-form-avatar">
	<a href="index.php"><img src="images/kare_logo.png" alt="AVATAR"></a>
</div>
	<span class="login100-form-title p-t-20 p-b-45">
		Kalasalingam Academy of Research and Education
	</span>


<div class="wrap-input100 validate-input m-b-10">
<input type="text" name="RegNo" class="input100" placeholder="Register Number">
<span class="focus-input100"></span>
	<span class="symbol-input100">
			<i class="fa fa-id-badge"></i>
	</span>
</div>

<div class="wrap-input100 validate-input m-b-10">
<input type="text" name="name" class="input100" placeholder="Name">
<span class="focus-input100"></span>
	<span class="symbol-input100">
			<i class="fa fa-user"></i>
	</span>
</div>

<div class="wrap-input100 validate-input m-b-10">
<input type="password" name="password" class="input100" placeholder="Password">
<span class="focus-input100"></span>
	<span class="symbol-input100">
			<i class="fa fa-lock"></i>
	</span>
</div>

<div class="wrap-input100 validate-input m-b-10">
<input type="text" name="CLG" class="input100" placeholder="College Name">
<span class="focus-input100"></span>
	<span class="symbol-input100">
			<i class="fa fa-university"></i>
	</span>
</div>

<div class="wrap-input100 validate-input m-b-10">
<input type="text" name="Dept" class="input100" placeholder="Department">
<span class="focus-input100"></span>
	<span class="symbol-input100">
			<i class="fa fa-inbox"></i>
	</span>
</div>

<div class="wrap-input100 validate-input m-b-10">
<input type="text" name="Email" class="input100" placeholder="Email">
<span class="focus-input100"></span>
	<span class="symbol-input100">
			<i class="fa fa-envelope"></i>
	</span>
</div>


<div class="wrap-input100 validate-input m-b-10">
<input type="text" name="PhoneNo" class="input100" placeholder="Phone Number">
<span class="focus-input100"></span>
	<span class="symbol-input100">
			<i class="fa Example of phone fa-phone"></i>
	</span>
</div>

<div class="container-login100-form-btn p-t-10">
<input type="submit" name ="Submit" class="login100-form-btn">
</div>
<div class="text-center w-full p-t-25 p-b-230">
<a href="index.php" class="txt1">Back to login</a>
</div>
</form>

<div class="footer">Developed with 💚 by <a href="../Developers/Developers.php" style="color: white; background-color: black;"><b> Software Development Team, KARE </b></a>
</div>

</div>
</div>
</div>

<?php } else { ?>

<?php
if(isset($_POST['Login'])) { 
    $buttonClick = new StudentDetails;
    $buttonClick->StudentLogin();
} 

?>

<div class="limiter">
<div class="container-login100" style="background-image: url('images/kare_background.jpg');">
<div class="wrap-login100 p-t-190 p-b-30">

<form action="" method="post" class="login100-form validate-form"> 
<div class="login100-form-avatar">
		<img src="images/kare_logo.png" alt="AVATAR">
	</div>
	<span class="login100-form-title p-t-20 p-b-45">
		Kalasalingam Academy of Research and Education
	</span>

<div class="wrap-input100 validate-input m-b-10">
<input type="text" name="RegNo" class="input100" placeholder="Register Number">
<span class="focus-input100"></span>
	<span class="symbol-input100">
			<i class="fa fa-user"></i>
	</span>
</div>

<div class="wrap-input100 validate-input m-b-10">
<input type="password" name="password" class="input100" placeholder="Password">
<span class="focus-input100"></span>
	<span class="symbol-input100">
		<i class="fa fa-lock"></i>
	</span>
</div>

<div class="container-login100-form-btn p-t-10">
<input type="submit" name ="Login" class="login100-form-btn" value="Login">
</div>

<div class="text-center w-full p-t-25 p-b-230">
<a href="index.php?create_user" class="txt1">Create an account</a>
</div>

<div class="footer">Developed with 💚 by <a href="../Developers/Developers.php" style="color: white; background-color: black;"><b> Software Development Team, KARE </b></a>
</div>

</form>
<?php } ?>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>