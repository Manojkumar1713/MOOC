<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete Course</title>
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
// $rootDir = basename(__DIR__);

include "StaffDetails.php";
include "CourseDetails.php";

     $buttonClick = new StaffDetails;
     $arr=$buttonClick->StaffSpecificCourse(); 

     global $b;
     if(isset($_POST['DeleteCourse'])) 
     { 
          header("Location: ./CreateCourse.php");
     }
     if(isset($_POST['GoBack'])) 
     { 
          header("Location: ./StaffHomePage.php");
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
<form action="" method="post">
<input type ="submit" name="GoBack" value="Go Back" class="btn btn-primary">
</form>
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
<input type='submit' value="Delete" name="<?php echo($row['CourseID']);$b=$row['CourseID']; ?>" class="btn btn-danger">
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
     $ar=$buttonClick->DeleteCourse();
     //header("Location: ./CourseSpecificRedirect.php");
     echo("<script>location.href = './StaffHomePage.php';</script>");
     }
     ?>
   
<?php endforeach; ?>
</div>
</div>
</form>

<div class="footer"><a href="../Developers/index.php" style="color: black;">Made with 💚 for</a> <a href="../Developers/index.php" style="color: red;">KARE</a>
</div>

</body>
</html>


    