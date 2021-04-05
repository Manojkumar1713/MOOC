<!DOCTYPE html>
<html lang="en">
<head>
<title>Resource Unit</title>
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
include "ResourceDetails.php";
session_start();
global $b,$ReArr;

$res = new ResourceDetails;
$arra=$res->GetResourceDetails();
//var_dump($arra);
$sessionArr=$_SESSION['array'];
$unitStore=array();
$arraystore=array();
for($i=0;$i<count($arra);$i++){
    if($arra[$i]['CourseID']===$sessionArr[0]['CourseID']){
      $newkey=(string)$arra[$i]['Unit'];
      // var_dump($newkey);
      
            if(array_key_exists($newkey,$unitStore)){
                array_push($unitStore[$newkey],$arra[$i]);
            }

            else{
              $newkey=(string)$arra[$i]['Unit'];
             
                $unitStore[$newkey]=array($arra[$i]);
            }
    }
}

?>



<form action="" method="POST">
<div class="container-fluid">
<br>
<input type ="submit" name="GoBack" value="Go Back" class="btn btn-primary">
</div>
<hr>
<div class="container">
<div class="row-fluid row">
<?php
// var_dump($unitStore);
foreach($unitStore as $k=>$v)
{
  $k= str_replace(" ","_",$k);
  $arraystore[$k]=$v;
}
foreach($arraystore as $k=>$v)
{?>
<!--cards -->


<div class="col-sm-4">
  <div class="card-columns-fluid">
    <div class="card  bg-light" style = "margin: 10px; max-width:700px;">
      <div class="card-body" style="height: 190px; background-color: #792fac;">
        <center><b><font style="color: white;">
<?php
       echo("<br><h3>");
       echo(str_replace("_"," ",$k));
       echo("</h3>");
    ?>
  </font>
  
</b><br>
<?php 

// $v['Unit']=$k;


?>
<input type='submit' value="View" name="<?php echo($k);$b=$k;$ReArr=$v; ?>" class="btn btn-warning">

</center>
</div>
</div>
</div>
</div>
</form>
<?php

if(isset($_POST['GoBack'])) 
     { 
          header("Location: ./CourseSpecificRedirect.php");
     }
 
// var_dump($arraystore);
// var_dump($_POST);
if(isset($_POST[$k])) 
{ 
// echo("Hi");
// var_dump($v);
$_SESSION['ResourceArray'] = $ReArr;
//var_dump($b);
// var_dump($_SESSION['ResourceArray']);
echo("<script>location.href = './UnitResource.php';</script>");
}}
?>
<!--cards -->

      <!-- <?php
     // echo($row['CourseID']);
      
    //  ?> -->
   
    
</div>
</div>

</body>
</html>