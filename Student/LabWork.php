<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lab Work</title>
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
include "CourseDetails.php";
$LabQues=new CourseDetails;
$ques=$LabQues->GetLabAssignmentQuestions();
//var_dump($ques);
$newid;
?>


<?php
foreach($ques as $q){
    ?>
    <form action="./Admin/compile/compile.php" method="post">
    <?php
    echo("Question: ".$q['ques']);
    echo("<br>");
    echo("Sample Input: ".$q['input']);
    echo("<br>");
    echo("Sample Output: ".$q['output']);
    echo("<br>");
    echo("Format: ".$q['format']);
    echo("<br>");
    echo("Language: ".$q['language']);
?>
<div class="form-group">
<textarea type="text" name="ans" class="form-control"></textarea>
<input type="hidden" name="language" id="actionResult" value="<?php echo($q['language']); ?>"/>
<input type="hidden" name="labid" id="actionResult" value="<?php echo($q['id']); ?>"/>
<input type="submit" name="submit" class="btn btn-success">
</form>
</div>
<?php
// $newid = $q['id'];
// if(isset($_POST[$q['id']])){
//     $_SESSION['Ans']=$_POST['ans'];
//     $_SESSION['id']=$q['id'];

//     // $_SESSION['Ans']=$q['Stu'];
//     var_dump($_POST);
//     $LabQues->LabResponseFromStudent();
// }
}
// if(isset($_POST['submit'])){

// }

?>
<div>
<!-- <input type="hidden" name=""> -->

</div>


<?php include('./footer.html'); ?>

</body>
</html>