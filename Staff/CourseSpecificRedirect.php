<!DOCTYPE html>
<html lang="en">
<head>
    <title>Staff Portal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/kare_icon.ico" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
</head>
<body>

<?php include('./header.html'); ?>

<?php
foreach($_SESSION['array'] as $a){
    ?>
   <h2>
     <?php
    echo("Course ID:   ".$a['CourseID']);
    echo "<br>";
    echo("Course Name: ".$a['Name']);
    ?>
   </h2>
<?php }?>

<?php 
if(isset($_GET['Back'])) 
{ 
    //header("Location: ./StaffHomePage.php");
    echo("<script>location.href = './StaffHomePage.php';</script>");
}
?>


<?php 
if(isset($_POST['ViewData'])) 
{ 
    $buttonClick = new QuizDetails;
    var_dump($buttonClick->GetQuizDetails());
}

?>

<?php include('./footer.html'); ?>

</body>
</html>