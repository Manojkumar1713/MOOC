<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create MCQ</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<script>
	$(document).ready(function(){
	$("input[type='radio']").change(function(){
	if($(this).val()=="Multiple")
	{
	$("#Answer2").show();
	$("#Answer3").show();
	$("#Label2").show();
	$("#Label3").show();
	}
	else
	{
	$("#Answer2").hide();
	$("#Answer3").hide();
	$("#Label2").hide();
	$("#Label3").hide();
	}
	});
	});
	</script>
</head>
<body>

<?php include('./header.html');
date_default_timezone_set('Asia/Kolkata'); ?>

<?php 
// $rootDir = basename(__DIR__);

// function SubmitData()
// {
include "QuizDetails.php";
if(isset($_POST['Submit'])) 
{ 
    $buttonClick = new QuizDetails;
    $buttonClick->PostData();
}
// } 
?>


<div class="container-fluid">
<?php 
if(isset($_POST['Cancel'])) 
{ 
    //header("Location: ./CourseSpecificRedirect.php");
    echo("<script>location.href = './CourseSpecificRedirect.php';</script>");
}
?>

<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">CREATE MCQ</h1>
</div>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">	
<label><b>Unit</b></label>
<input type="text" name="Unit" class="form-control">
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

<div class = "form-group">
<label for ="file"><b>Upload Any Image</b></label>
<input type ="file" name="file" id="file" class="form-control">
</div>

<div class = "form-group">
<label><b>Single Choice Question</b></label>
	<input type="radio" name="answer" value="yes" checked="checked">
<label><b>Multiple Choice Question</b></label>
	<input type="radio" name="answer" value="Multiple">
</div>

<div class="form-group">	
<label><b>Question</b></label>
<input type="text" name="question" class="form-control">
</div>

<div class="form-group">	
<label><b>Option A</b></label>
<input type="text" name="optionA" class="form-control">
</div>

<div class="form-group">	
<label><b>Option B</b></label>
<input type="text" name="optionB" class="form-control">
</div>

<div class="form-group">	
<label><b>Option C</b></label>
<input type="text" name="optionC" class="form-control">
</div>

<div class="form-group">	
<label><b>Option D</b></label>
<input type="text" name="optionD" class="form-control">
</div>

<div class="form-group">	
<label><b>Answer 1</b></label>
<input type="text" name="ans" class="form-control">
</div>

<div class="form-group">	
<label style="display:none;" id="Label2"><b>Answer 2</b></label>
<input style="display:none;" type="text" name="ans2" id="Answer2" class="form-control">
</div>

<div class="form-group">	
<label style="display:none;" id="Label3"><b>Answer 3</b></label>
<input style="display:none;" type="text" name="ans3" id="Answer3" class="form-control">
</div>

	
<!--
<div class="form-group">	
<label><b>Course ID</b></label>
<input type="text" name="CourseID" class="form-control">
</div>

<div class="form-group">	
<label><b>StaffID</b></label>
<input type="text" name="StaffID" class="form-control">
</div>
-->
<input type="submit" name ="Submit" class="btn btn-success">
<input type="submit" name ="Cancel" value="Cancel" class="btn btn-danger">
</form>
<br>
</div>

<?php include('./footer.html'); ?>

</body>
</html>