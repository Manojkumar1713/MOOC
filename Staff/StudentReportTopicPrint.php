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

<?php error_reporting(E_ERROR | E_PARSE); ?>

<?php
include "CourseDetails.php";
$StudentDetails=array();
$studentmark = new CourseDetails;
$arr= $studentmark->RetriveStudentQuizMark();
$arr2= $studentmark->RetriveStudentTrueFalseMark();
$arr3= $studentmark->RetriveStudentShortAnsMark();
$arr4= $studentmark->RetriveFileTypeAnsMark();
//global $b;
// array_push($StudentDetails,$arr);
// array_push($StudentDetails,$arr2);
// array_push($StudentDetails,$arr3);
//var_dump($StudentDetails);
?>
<div class="container-fluid">

<p> <input type="button" value="Export as PDF" id="btPrint" onclick="createPDF()" class="btn btn-info" /> </p>
    
<div id="tab">
<img src="images/kare_pdf.png" style="width: 100%;">
<center>
<h1>Massive Open Online Courses</h1>
<h3>Assessment Summary Report</h3>
</center>
<?php
foreach($_SESSION['array'] as $a){
    ?>
   <h2>
     <?php

    echo("Course ID: ".$a['CourseID']);
    echo('<div style="float: right;">');
    echo("Course Name: ".$a['Name']);
    echo ("</div>");
    ?>
   </h2>
<?php }?>
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
        </div>

</body>
<script>
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>
</html>
