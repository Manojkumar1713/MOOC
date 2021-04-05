<!DOCTYPE html>
<html lang="en">
<head>
	<title>Create Course</title>
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
  text-align: center;
}
</style>
</head>
<body>
<?php 

// $rootDir = basename(__DIR__);

// function SubmitData()
// {
include "CourseDetails.php";
if(isset($_POST['Submit'])) 
{ 
    $buttonClick = new CourseDetails;
    $buttonClick->PostData();
    echo("<script>location.href = './StaffHomePage.php';</script>");
}

if(isset($_POST['Cancel'])) 
{ 
    header("Location: ./StaffHomePage.php");
}
// } 
?>
<br>
<div class="container-fluid">
<div class="jumbotron" style="background-color: #222d32; padding-top: 25px; padding-bottom: 25px;">
    <h1 style="background-color: white; color: #222d32">CREATE COURSE</h1>
</div>

<form action="" method="post" id="course">

<div class="form-group">	
<label><b>COURSE ID</b></label>
<input type="text" name="CourseID" class="form-control">
</div>

<div class="form-group">	
<label><b>COURSE NAME</b></label>
<input type="text" name="name" class="form-control">
</div>

<div class="form-group">
<label><b>DEPARTMENT</b></label>
<input type="text" name="Dept" class="form-control">
</div>

<!--
<div class="form-group">
<label><b>STAFF ID</b></label>
<input type="text" name="StaffID" class="form-control">
</div>
-->

<div class="form-group">
<label><b>DURATION</b></label>
<input type="text" name="Duration" class="form-control">
</div>

<label for="ExpiryDate"><b>DUE DATE</b></label>
<input type="datetime-local"  name="ExpiryDate" class="form-control"><br>

<label for="CompilerReq"><b>COMPILER REQUIRED</b></label><br>
<div class="radio">
<input type="radio"  name="CompilerReq" value="Yes">
<label for="CompilerReq">Yes</label>
</div>
<div class="radio">
<input type="radio"  name="CompilerReq" value="No" checked>
<label for="CompilerReq">No</label><br>
<input type="submit" name ="Submit" class="btn btn-success">

<input type="submit" name ="Cancel" value="Cancel" class="btn btn-danger">
</form>
<br><br>
<div class="footer"><a href="../Developers/index.php" style="color: black;">Made with 💚 for</a> <a href="../Developers/index.php" style="color: red;">KARE</a>
</div>
</div>



</body>
</html>