<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Assignment File Type Question</title>
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

<?php include('./header.html'); ?>
                
<?php 
// $rootDir = basename(__DIR__);

// function SubmitData()
// {
include "AssignFileTypeQuestionDetails.php";
include "AssignQuizDetails.php";
if(isset($_POST['Submit'])) 
{ 
    $buttonClick = new FileTypeDetails;
    $buttonClick->StaffFileTypePostData();
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
    <h1 style="background-color: white; color: #222d32;">CREATE ASSIGMENT FILE TYPE QUESTION</h1>
</div>

<form action="" method="post">
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

<input type="submit" name ="Submit" class="btn btn-success">
<input type="submit" name ="Cancel" value="Cancel" class="btn btn-danger">
</form>
</div>

<?php include('./footer.html'); ?>

</body>
</html>