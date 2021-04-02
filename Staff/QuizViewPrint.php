<!DOCTYPE html>
<html lang="en">
<head>
    <title>Print MCQ</title>
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

<?php

session_start();
if(isset($_POST['Back']))
{
    header("Location: ./CourseSpecificRedirect.php");
}
?>

<?php

include "QuizDetails.php";


    $buttonClick = new QuizDetails;
    $arr=$buttonClick->GetStaffSpecificQuiz();
    global $b;

// }
?>

<div class="container-fluid">
<br>
<p> <input type="button" value="Download PDF" id="btPrint" onclick="createPDF()" class="btn btn-danger" /> </p>
    
<div id="tab">
<img src="images/kare_pdf.png" style="width: 100%;">
<center>
<h1>Massive Open Online Courses</h1>
<h3>MCQ</h3>
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

<table border="1" id='customers'>
<tr>
    <th>Unit</th>
    <th>Topic</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Options</th>
</tr>
<?php
//var_dump($arr);
foreach($arr as $a){
    ?>
     <?php
     if($a['correct']==null){
    echo("<tr>");
    echo("<td>");
    echo($a['Unit']);
    echo("</td>");
    echo("<td>");
    echo($a['topic']);
    echo("</td>");
    echo("<td>");
	echo($a['Qname']);
    echo("<td>");
	echo($a['correct']);
    echo("</td>");
    echo("<td>");
        echo($a['opA']);
        echo("</br>");
        echo($a['opB']);
        echo("</br>");
        echo($a['opC']);
        echo("</br>");
        echo($a['opD']);
    echo("</td>");
     }else{
        echo("<tr>");
        echo("<td>");
        echo($a['Unit']);
        echo("</td>");
        echo("<td>");
        echo($a['topic']);
        echo("</td>");
        echo("<td>");
        echo($a['Qname']);
        echo("<td>");
        echo($a['correct']);
        echo("</br>");
        echo($a['correct2']);
        echo("</br>");
        echo($a['correct3']);
        echo("</td>");
        echo("<td>");
        echo($a['opA']);
        echo("</br>");
        echo($a['opB']);
        echo("</br>");
        echo($a['opC']);
        echo("</br>");
        echo($a['opD']);
        echo("</td>");
        echo("</tr>");
        
     }
    ?>

    <?php

     // echo($row['CourseID']);
      if(isset($_POST[$b]))
     {
      $buttonClick = new QuizDetails;
     $_SESSION['QID']=$b;
     echo( $_SESSION['QID']);
     $ar=$buttonClick->DeleteQuiz();
     //header("Location: ./CourseSpecificRedirect.php");
     echo("<script>location.href = './QuizView.php';</script>");
     }
     ?>
<?php } ?>

</table>

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
