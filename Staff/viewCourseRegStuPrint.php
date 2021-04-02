<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student Details</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/kare_icon.ico" />
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #222d32;
  color: white;
}
table {
  width: 100%;
}

th {
  height: 50px;
}
</style>

</head>

<body>


<div class="container-fluid">
<br>
<p> <input type="button" value="Download PDF" id="btPrint" onclick="createPDF()" class="btn btn-danger" /> </p>
 </div>   
<div id="tab">
<img src="images/kare_pdf.png" style="width: 100%;">
<center>
<h1>Massive Open Online Courses</h1>
<h3>Registered Student Details</h3>
</center>
<?php session_start();
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

<br>
<table id='customers'>
  <tr>
  <th>Register Number</th>
  <th>Student Name</th>
  <th>College Name</th>
  <th>Department</th>
  <th>Email</th>
  <th>Phone Number</th>
</tr>

<?php
include "CourseDetails.php";
$students= new CourseDetails;
    $studentsDetails=$students->GetStudentDetails();
    foreach($studentsDetails as $stu){
        echo("<tr>");
        echo("<td>");
        echo($stu['RegNo']);
        echo("</td>");
        echo("<td>");
        echo($stu['Name']);
        echo("</td>");
        echo("<td>");
        echo($stu['CLG']);
        echo("</td>");
        echo("<td>");
        echo($stu['Dept']);
        echo("</td>");
        echo("<td>");
        echo($stu['Email']);
        echo("</td>");
        echo("<td>");
        echo($stu['PhoneNo']);
        echo("</td>");
        echo("</tr>");
    }
?>
</table>



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
       // win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close();   // CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>
</html>