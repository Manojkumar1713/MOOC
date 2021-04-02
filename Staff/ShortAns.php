<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Short Answer</title>
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
<style>
    .form-inline {
  display: flex;
  flex-flow: row wrap;
  align-items: center;
}
</style>
</head>
<body>

<?php include('./header.html');
date_default_timezone_set('Asia/Kolkata'); ?>

<?php 
// $rootDir = basename(__DIR__);

// function SubmitData()
// {
include "ShortAnsDetails.php";
include "QuizDetails.php";
if(isset($_POST['Submit'])) 
{ 
    $buttonClick = new ShortAnsDetails;
    $buttonClick->StaffShortAnsPostData();
}
if(isset($_POST['Cancel'])) 
{ 
    //header("Location: ./CourseSpecificRedirect.php");
    echo("<script>location.href = './CourseSpecificRedirect.php';</script>");
}
// } 
?>
<div class="container-fluid">
<div class="jumbotron" style="background-color: #222d32; padding-top: 25px; padding-bottom: 25px;">
    <h1 style="background-color: white; color: #222d32;">CREATE SHORT ANSWER</h1>
</div>



<form action="" method="post">

<div class="form-group">    
<label><b>Unit</b></label>
<input type="text" name="unit" class="form-control">
</div>
<div class="form-group">	
<label><b>Topic</b></label>
<?php

$butt = new QuizDetails;
$topicArr=$butt->GetTopicDetails();
?>
<select name="topicSel" class="form-control">

<?php
foreach($topicArr as $ta){
    ?>
    
    <option >
    <?php
    echo($ta['topic']);
    ?>
    </option>
    
<?php
}
?>
</select>
</div>

<div class="form-group">    
<label><b>Question</b></label>
<input type="text" name="ques" class="form-control">
</div>

<div class="form-group">    
<label><b>Answer</b></label>
<input type="text" name="answer" class="form-control">
</div>


<div>
<input type="submit" name ="Submit" class="btn btn-success">
<input type="submit" name ="Cancel" value="Cancel" class="btn btn-danger">
</div>
<?php 
// $rootDir = basename(__DIR__);

// function SubmitData()
// {
if(isset($_POST['RestriveData'])) 
{ 
    $buttonClick = new ShortAnsDetails;
    $buttonClick->StaffShortAnsSpecific();
}
// } 
?>
</form>
</div>

<?php include('./footer.html'); ?>

</body>
</html>