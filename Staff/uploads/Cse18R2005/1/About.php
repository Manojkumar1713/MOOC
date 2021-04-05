<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Portal</title>
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
include('./header.html'); ?>


<?php
session_start();
include "CourseDetails.php";
$instance = new CourseDetails;
$about=$instance->GetAboutData();
?>
<div class="container-fluid">
<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">ABOUT COURSE</h1>
</div>
<?php 
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

<?php include('./footer.html'); ?>

</body>
</html>