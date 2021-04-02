<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assignment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/kare_icon.ico" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
</head>
<body>

<?php
error_reporting(E_ERROR | E_PARSE);
 include('./header.html'); ?>

<div class="container-fluid">
<div class="jumbotron" style="background-color: #2a103c; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #2a103c;">QUIZ</h1>
</div>

<?php
session_start();
include "CourseDetails.php";
$instance = new CourseDetails;
$AMCQ=$instance->AssignRetriveQuiz();
var_dump($AMCQ);
$trueFalse= $instance->AssignretriveTrueFalse();
$shortans=$instance->AssignretriveShortAns();
$fileAns=$instance->AssignretriveFiletype();
//global $TopicName="";
foreach($AMCQ as $m){
    if($m['correct2']!=""){
        // if($TopicName!)
        $st=(int)$m['StartTime'];
        $et=(int)$m['ExpiryTime'];
        var_dump($st);
        var_dump($et);
        var_dump(time());
    echo("<br>");
    echo($m['FilePath']);
    echo("<br>");
    echo("<br>");
    echo($m['Qname']);
    echo("<br>");
    ?>

<form action="" method="post">

<div class="form-group">
<input type="checkbox" name="quiz" id="opA">
<label for="opA"><?php echo($m['opA']);?></label>
</div>

<div class="form-group">
<input type="checkbox" name="quiz" id="opB">
<label for="opB"><?php echo($m['opB']);?></label>
</div>

<div class="form-group">
<input type="checkbox" name="quiz" id="opC">
<label for="opC"><?php echo($m['opC']);?></label>
</div>

<div class="form-group">
<input type="checkbox" name="quiz" id="opD">
<label for="opD"><?php echo($m['opD']);?></label>
</div>

</form>

    <?php
    echo("<br>");
    }else{
    echo("<br>");
    echo($m['FilePath']);
    echo("<br>");
    echo("<br>");
    echo($m['Qname']);
    echo("<br>");
  	?>

<form action="" method="post">

<div class="form-group">
<input type="radio" name="quiz" id="opA">
<label for="opA"><?php echo($m['opA']);?></label>
</div>

<div class="form-group">
<input type="radio" name="quiz" id="opB">
<label for="opB"><?php echo($m['opB']);?></label>
</div>

<div class="form-group">
<input type="radio" name="quiz" id="opC">
<label for="opC"><?php echo($m['opC']);?></label>
</div>

<div class="form-group">
<input type="radio" name="quiz" id="opD">
<label for="opD"><?php echo($m['opD']);?></label>
</div>

</form>

  	<?php
    echo("<br>");
    }
        
}

foreach($trueFalse as $m){
    echo("<br>");
    echo($m['ques']);
    echo("<br>");
    echo("<br>");
    ?>

<form action="" method="post">

<div class="form-group">
<input type="radio" name="quiz" id="opA">
<label for="opA"><?php echo($m['opA']);?></label>
</div>

<div class="form-group">
<input type="radio" name="quiz" id="opB">
<label for="opB"><?php echo($m['opB']);?></label>
</div>

</form>

    <?php
    echo("<br>");

}
foreach($shortans as $m){
    echo("<br>");
    echo($m['ques']);
    echo("<br>");
}

foreach($fileAns as $m){
    echo("<br>");
    ?>
    <div class = "form-group">
	<label for="file"><?php echo($m['ques']);?></label>
	<input type="file" name="file" id="file" data-max-file-size="1024M" class="form-control">
	</div>
    <?php
    echo("<br>");
}
?>

<?php include('./footer.html'); ?>

</body>
</html>