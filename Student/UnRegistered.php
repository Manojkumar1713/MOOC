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
</style>
</head>
<body>

<?php 
error_reporting(E_ERROR | E_PARSE);
session_start();
$newarr1=array();
include "CourseDetails.php";
$Courses = new CourseDetails;
$arr=$Courses->UnRegCourse();
// $arr2=$Courses->RetriveAllCourse();
// $arr3=array();
// $arr4=array();
// global $b;
// $result = array_diff_key($arr, $arr2);
// var_dump($result);
// $result2 = array_intersect($arr, $arr2);
// var_dump($result2);
// // else{
// //   echo("You Have registered for all the courses");
// //   $arr=null;
// // }

// if($result==null){
//   $result=$arr;
// }
// var_dump($newarr1);
?>

<header>
	<marquee scrollamount="5" bgcolor="#2a103c" hspace="15" vspace="20"><font color="#ffffff">
        <h2> Welcome, <?php echo($_SESSION["StudentName"]." (".$_SESSION['SID'].")"); ?> </h2>
    </font>
  </marquee>
</header>

<div class="container-fluid">
<form action="" method="post">
<input type ="submit" name="Back" value="Back" class="btn btn-primary">
</form>
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
      <div class="card-body" style="height: 190px; background-color: #367fa9;">
        <center><b>
<?php
    echo($a['Name']);
    echo "<br>";
    echo("(".$a['CourseID'].")");
    echo "<br>";
    echo("Due Date: ".$a['ExpiryDate']);
?>

</b><br>
<input type='submit' value="Register" name="<?php echo($a['CourseID']);$b=$a['CourseID']; ?>" class="btn btn-warning">
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
     //$buttonClick->GetSpecificCourse();
     $_SESSION['array'] = $a;
     $buttonClick->RegisterCourse();
     //echo($_SESSION['CourseID']);
     //var_dump( $_SESSION['array']);
     //header("Location: ./CourseSpecificRedirect.php");
     echo("<script>location.href = './GetCourse.php';</script>");
     }
     
     ?>

<?php }
if(isset($_POST['Back'])) 
{ 
     echo("<script>location.href = './GetCourse.php';</script>");
}?>

</div>
</div>
</form>
</body>
</html>