<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Course</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/kare_icon.ico" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
</head>
<body>
<?php error_reporting(E_ERROR | E_PARSE);
session_start();
include('./header.html'); ?>

<?php 
// $rootDir = basename(__DIR__);

// function SubmitData()
// {
include "CourseDetails.php";
if(isset($_POST['Submit'])) 
{ 
    $buttonClick = new CourseDetails;
    $buttonClick->AboutPostData();
}
// } 
?>
<div class="container-fluid">
<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">ABOUT COURSE</h1>
</div>
<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">    
<label><b>Add Description</b></label>
<br>
<textarea name="ques" rows="10" cols="150" style="border-style: outset;"></textarea>
</div>

<div class="form-group">    
<label><b>Course Plan</b></label>
<input type="file" name="file1" id="file1" data-max-file-size="1024M">
</div>

<div class="form-group">    
<label><b>Course Syllabus</b></label>
<input type="file" name="file2" id="file2" data-max-file-size="1024M"></div>

<input type="submit" name ="Submit" class="btn btn-success">

<?php 
// $rootDir = basename(__DIR__);

// function SubmitData()
// {
// } 
?>

<?php
$about=$buttonClick->GetAboutData();
 foreach($about as $a)
 echo($a['Ans']);
 ?>
 </br>
 <a href="../Staff/uploads/<?php echo $a['CourseID']."/".$a['Link1'] ?>">
            <?php echo($a['Link1'])?>
        </a> 
</br>
        <a href="../Staff/uploads/<?php echo $a['CourseID']."/".$a['Link2'] ?>">
            <?php echo($a['Link2'])?>
        </a>   
</form>
</div>
<?php include('./footer.html'); ?>

</body>
</html>