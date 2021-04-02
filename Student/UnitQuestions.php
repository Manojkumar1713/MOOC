<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quiz</title>
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

<div class="container-fluid">
<div class="jumbotron" style="background-color: #2a103c; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #2a103c;">QUIZ</h1>
</div>

<?php
session_start();
include "CourseDetails.php";
$instance = new CourseDetails;
$MCQ=$instance->RetriveQuiz();
//var_dump($MCQ);
$trueFalse= $instance->retriveTrueFalse();
$shortans=$instance->retriveShortAns();
$fileAns=$instance->retriveFiletype();
?>

<?php
foreach($MCQ as $m){
    $count=0;
    //echo("hi");echo($m['correct2']);
    if($m['correct2']!=""){
        // if($TopicName!)
        $st=(int)$m['StartTime'];
        $et=(int)$m['ExpiryTime'];
        // var_dump($st);
        // var_dump($et);
        // var_dump(time());
        echo("<br>");
	    echo($m['FilePath']);
	    echo("<br>");
	    echo("<br>");
	    echo($m['Qname']);
	    echo("<br>");
	    echo("<br>");
    ?>
<div class="form-group">
<?php
 echo($m['Qname']);
 ?>
 </div>
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
<!-- </form> -->
<input type="submit" name ="Submit">
</form>
    <?php
    if(isset($_POST['Submit'])){
        $instance = new CourseDetails;
        $instance->InsertMCQ();
       // echo("<script>location.href = './UnitQuestionTrueFalse.php';</script>");
    }
    
    }else{
    echo("<br>");
    echo($m['FilePath']);
    echo("<br>");
    echo("<br>");
    echo($m['Qname']);
    echo("<br>");
    echo("<br>");
    
    ?>
 <form action="" method="post">
<div class="form-group">
<input type="radio" name="quiz" value="<?php echo($m['opA']);?>" id="opA">
<label for="opA"><?php echo($m['opA']);?></label>
</div>

<div class="form-group">
<input type="radio" name="quiz" value="<?php echo($m['opB']);?>" id="opB">
<label for="opB"><?php echo($m['opB']);?></label>
</div>

<div class="form-group">
<input type="radio" name="quiz" value="<?php echo($m['opC']);?>" id="opC">
<label for="opC"><?php echo($m['opC']);?></label>
</div>

<div class="form-group">
<input type="radio" name="quiz" value="<?php echo($m['opD']);?>" id="opD">
<label for="opD"><?php echo($m['opD']);?></label>
</div>
<input type="submit" name ="Submit">
</form>
<!-- <input name="Submit"> -->
<!-- </form> -->
	<?php
    echo("<br>");
    $_SESSION['SMQid']=$m['Qid'];
    $_SESSION['SMUnit']=$m['Unit'];
    $_SESSION['SMTopic']=$m['Topic'];
    $_SESSION['SMQname']=$m['Qname'];
    $_SESSION['SMAns']=$_POST['quiz'];
    if($m['correct']==$_POST['quiz']){
        $_SESSION['SMMark']=1;  
    }
    else{
        $_SESSION['SMMark']=0;
    }
    
       // echo("<script>location.href = './UnitQuestionTrueFalse.php';</script>");
    }
    if(isset($_POST['Submit'])){
        $instance = new CourseDetails;
        $instance->InsertMCQ();
    }        
}
?>
<?php

include('./footer.html'); ?>

</body>
</html>