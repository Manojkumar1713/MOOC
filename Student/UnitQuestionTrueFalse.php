<?php
session_start();
include "CourseDetails.php";
$instance = new CourseDetails;
$trueFalse= $instance->retriveTrueFalse();
$shortans=$instance->retriveShortAns();
$fileAns=$instance->retriveFiletype();
?>
<form action="" method="post">
<?php
foreach($trueFalse as $m){
    echo("<br>");
    echo($m['ques']);
    echo("<br>");
    echo("<br>");
    ?>

<div class="form-group">
<input type="radio" name="quiz" id="opA">
<label for="opA"><?php echo($m['opA']);?></label>
</div>

<div class="form-group">
<input type="radio" name="quiz" id="opB">
<label for="opB"><?php echo($m['opB']);?></label>
</div>

	<?php
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
}