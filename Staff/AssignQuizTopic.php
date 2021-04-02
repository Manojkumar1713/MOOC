<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Assignment Topic</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/kare_icon.ico" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
</head>
<body>

<?php include('./header.html');
date_default_timezone_set('Asia/Kolkata'); ?>

<?php
if(isset($_POST['Submit'])){
    include "AssignQuizDetails.php";
    $NewTopic = new QuizDetails;
    $NewTopic->QuizTopic();
    echo("<script>location.href = './AssignQuiz.php';</script>");
}
?>
<div class="container-fluid">
<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">ADD TOPIC FOR ASSIGNMENT</h1>
</div>

<form action="" method="post">

<div class="form-group">
<label><b>Unit</b></label>
<input type="text" name="Unit" class="form-control">
</div>

<div class="form-group">
<label><b>Topic</b></label>
<input type="text" name="Topic" class="form-control">
</div>
<div class="form-group">    
<label for="StartDate"><b>Start Date</b></label>
<input type="datetime-local"  name="StartDate" class="form-control">
</div>

<div class="form-group">    
<label for="StartDate"><b>End Date</b></label>
<input type="datetime-local"  name="EndDate" class="form-control">
</div>
<input type="submit" name="Submit" class="btn btn-success">
</form>
</div>

<?php include('./footer.html'); ?>

</body>
</html>