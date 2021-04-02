<!DOCTYPE html>
<html lang="en">
<head>
<title>Staff Home Page</title>
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
// $rootDir = basename(__DIR__);

include "StaffDetails.php";
include "CourseDetails.php";

     $buttonClick = new StaffDetails;
     $arr=$buttonClick->StaffSpecificCourse(); 

     global $a,$b;
     
     if(isset($_POST['CreateCourse'])) 
     { 
          header("Location: ./CreateCourse.php");
     }
     if(isset($_POST['DeleteCourse'])) 
     { 
          header("Location: ./DeleteSpecificCourse.php");
     }
    
?>

<header>
	<marquee scrollamount="5" bgcolor="#222d32" hspace="15" vspace="20"><font color="#ffffff">
        <h2> Welcome,
        <?php echo $_SESSION['Name']; ?>
        </h2>
    </font>
  </marquee>
</header>
<div class="container-fluid">
<div class="text-right">
<form action="" method="post">
<input type ="submit" name="CreateCourse" value="Create New Course" class="btn btn-success">
<input type ="submit" name="DeleteCourse" value="Delete Course" class="btn btn-danger" style="float: left;">
</form>
</div>
</div>
<hr>

<form action="" method="post">
<div class="container">
<div class="row-fluid row">
<?php foreach ($arr as $row): array_map('htmlentities', $row); ?>
<!--cards -->


<div class="col-sm-4">
  <div class="card-columns-fluid">
    <div class="card  bg-light" style = "margin: 10px; max-width:700px;">
      <div class="card-body" style="height: 190px; background-color: #367fa9;">
        <center><b>
<?php
      echo($row['Name']);
      echo "<br>";
      echo("(".$row['CourseID'].")");
      echo "<br>";
      echo("Due Date: ".$row['ExpiryDate']);
    ?>
</b><br>
<input type='submit' value="View" name="<?php echo($row['CourseID']);$a=$row['CourseID']; ?>" class="btn btn-warning">
</center>
</div>
</div>
</div>
</div>

<!--cards -->

      <?php
     // echo($row['CourseID']);
      if(isset($_POST[$a])) 
     { 
      $buttonClick = new CourseDetails;
     $_SESSION['CourseID']=$a;
     $ar=$buttonClick->GetSpecificCourse();
     $_SESSION['array'] = $ar;
     //header("Location: ./CourseSpecificRedirect.php");
     echo("<script>location.href = './CourseSpecificRedirect.php';</script>");
     }
     ?>
   
<?php endforeach; ?>
</div>
</div>
</form>
</body>
</html>


    