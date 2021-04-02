<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Home Page</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="images/kare_icon.ico" />
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/staff.css">
<style>
	body{
	background-image: url('./images/kare_cover.png');
	background-repeat: no-repeat;
  	background-attachment: fixed;
  	background-position: center;
  	background-size: cover;
	*/background-color: #222d32;*/
}

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
error_reporting(E_ERROR | E_PARSE);
session_start();
include "CourseDetails.php";
$Courses = new CourseDetails;
// $arr=$Courses->GetCourseDetails();
$arr=$Courses->RetriveAllCourse();
global $b;
//var_dump($arr);
?>

<header>
	<marquee scrollamount="5" bgcolor="#2a103c" hspace="15" vspace="20"><font color="#ffffff">
        <h2> Welcome, <?php echo($_SESSION["StudentName"]." (".$_SESSION['SID'].")"); ?> </h2>
    </font>
  </marquee>
</header>
<div class="container-fluid">
<div class="text-right">
<form action="" method="post">
<input type ="submit" name="CreateCourse" value="Register Course" class="btn btn-success">
</form>
<?php
if(isset($_POST['CreateCourse'])){
    echo("<script>location.href = './UnRegistered.php';</script>");

}
?>
</div>
</div>
<hr>

<form action="" method="post">
<div class="container">
<div class="row-fluid row">

<?php
foreach($arr as $a){
?>

<div class="col-sm-4">
  <div class="card-columns-fluid">
    <div class="card  bg-light" style = "margin: 10px; max-width:700px;">
      <div class="card-body" style="height: 190px; background-color: #792fac;">
        <center><b><font style="color: white;">
<?php
    echo($a['Name']);
    echo "<br>";
    echo("(".$a['CourseID'].")");
    echo "<br>";
    echo("Due Date: ".$a['ExpiryDate']);
?>
</font>
</b><br>
<input type='submit' value="View" name="<?php echo($a['CourseID']);$b=$a['CourseID']; ?>" class="btn btn-warning">
</center>
</div>
</div>
</div>
</div>

<?php
     // echo($row['CourseID']);
      if(isset($_POST[$b])) 
     { 
      $buttonClick = new CourseDetails;
     $_SESSION['CourseID']=$b;
     $ar=$buttonClick->GetSpecificCourse();
     $_SESSION['array'] = $ar;
     //echo($_SESSION['CourseID']);
    //  var_dump( $_SESSION['array']);
     //header("Location: ./CourseSpecificRedirect.php");
     echo("<script>location.href = './CourseSpecificRedirect.php';</script>");
     }
     ?>

<?php }?>

</div>
</div>
</form>

<div class="footer"><a href="../Developers/index.php" style="color: black;">Made with 💚 for</a> <a href="../Developers/index.php" style="color: red;">KARE</a>
</div>

</body>
</html>