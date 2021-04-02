<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/kare_icon.ico" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/table.css">

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
</head>
<body>

<?php error_reporting(E_ERROR | E_PARSE);
include('./header.html'); ?>



<?php
include "CourseDetails.php";
$StudentDetails=array();
$studentmark = new CourseDetails;
$arr= $studentmark->RetriveStudentQuizMark();
$arr2= $studentmark->RetriveStudentTrueFalseMark();
$arr3= $studentmark->RetriveStudentShortAnsMark();
//global $b;
// array_push($StudentDetails,$arr);
// array_push($StudentDetails,$arr2);
// array_push($StudentDetails,$arr3);
//var_dump($StudentDetails);
?>
<div class="container-fluid">
<div class="jumbotron" style="background-color: #2a103c; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #2a103c;">STUDENT QUIZ REPORT</h1>
</div>
<h1>MCQ</h1>

<table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Question ID</th>
    <th>Unit</th>
    <th>Topic</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Mark</th>

</tr>
<?php
foreach($arr as $a){
    ?>
     <?php
    echo("<tr>");
    echo("<td>");
    echo($a['RegNo']);
    echo("</td>");
    echo("<td>");
    echo($a['Qid']);
    echo("</td>");
    echo("<td>");
    echo($a['unit']);
    echo("</td>");
    echo("<td>");
    echo($a['topic']);
    echo("</td>");
    echo("<td>");
    echo($a['ques']);
    echo("</td>");
    echo("<td>");
    echo($a['Ans']);
    echo("<br>");
    echo($a['Ans2']);
    echo("<br>");
    echo($a['Ans3']);
    echo("<br>");
    echo("</td>");
    echo("<td>");
    echo($a['Mark']);
    echo("</td>");
    echo("</tr>");
    ?>
<?php }?>
</table>

<h1>True/False</h1>

<table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Question ID</th>
    <th>Unit</th>
    <th>Topic</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Mark</th>

</tr>
<?php
foreach($arr2 as $a){
    ?>
     <?php
    echo("<tr>");
    echo("<td>");
    echo($a['RegNo']);
    echo("</td>");
    echo("<td>");
    echo($a['id']);
    echo("</td>");
    echo("<td>");
    echo($a['unit']);
    echo("</td>");
    echo("<td>");
    echo($a['topic']);
    echo("</td>");
    echo("<td>");
    echo($a['ques']);
    echo("</td>");
    echo("<td>");
    echo($a['Ans']);
    echo("</td>");
    echo("<td>");
    echo($a['Mark']);
    echo("</td>");
    echo("</tr>");
    ?>
<?php }?>
</table>
<h1>Short Answer</h1>

<table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Question ID</th>
    <th>Unit</th>
    <th>Topic</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Mark</th>

</tr>
<?php
foreach($arr3 as $a){
    ?>
     <?php
    echo("<tr>");
    echo("<td>");
    echo($a['RegNo']);
    echo("</td>");
    echo("<td>");
    echo($a['id']);
    echo("</td>");
    echo("<td>");
    echo($a['unit']);
    echo("</td>");
    echo("<td>");
    echo($a['Topic']);
    echo("</td>");
    echo("<td>");
    echo($a['ques']);
    echo("</td>");
    echo("<td>");
    echo($a['Ans']);
    echo("</td>");
    echo("<td>");
    echo($a['Mark']);
    echo("</td>");
    echo("</tr>");
    ?>
<?php }?>
</table>
</div>
	</div>
        </div>

<?php include('./footer.html'); ?>

</body>
</html>