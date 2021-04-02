<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assignment Summary Report</title>
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
session_start();
?>

<?php
include "CourseDetails.php";
$StudentDetails;
$studentmark = new CourseDetails;
$arr= $studentmark->AssignmentSummaryReport();
// $arr2= $studentmark->RetriveTotalMarkForTrue();
// $arr3= $studentmark->RetriveTotalMarkForShort();
//global $b;
?>
<div class="container-fluid">
<br>
<p> <input type="button" value="Export as PDF" id="btPrint" onclick="createPDF()" class="btn btn-danger" /> </p>
    
<div id="tab">
<img src="images/kare_pdf.png" style="width: 100%;">
<center>
<h1>Massive Open Online Courses</h1>
<h3>Assignment Summary Report</h3>
</center>

<table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Name</th>
    <th>Total Mark</th>

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
    echo($a['Name']);
    echo("</td>");
    echo("<td>");
    echo($a['total']);
    echo("</td>");
    echo("</tr>");
    
    ?>
<?php }
?>
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
       //win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write('<img>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close();   // CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>

</html>
