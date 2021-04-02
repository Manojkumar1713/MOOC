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
$arr= $studentmark->RetriveAssignStudentQuizMark();
$arr2= $studentmark->RetriveAssignStudentTrueFalseMark();
$arr3= $studentmark->RetriveAssignStudentShortAnsMark();
$arr4= $studentmark->RetriveAssignFileTypeAnsMark();
//global $b;
$radTopic;
$checkTopic;
$totalRad=0;
$truefalse;
$totaltrue=0;
$shortans;
$totalshort=0;
$filetype;
$totalfile=0;
$StudentRegNo;
// array_push($StudentDetails,$arr);
// array_push($StudentDetails,$arr2);
// array_push($StudentDetails,$arr3);
//var_dump($StudentDetails);
?>
<div class="container-fluid">
<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">STUDENT REPORT</h1>
</div>
<h1>MCQ</h1>
<?php
$radTopic=$arr[0]['topic'];
$StudentRegNo=$arr[0]['RegNo'];
echo("<h3>".$radTopic."</h3>");
foreach($arr as $a){
    if($radTopic==$a['topic']){
    ?>
<table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Question ID</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Mark</th>
    <th>Total Mark</th>

</tr>

     <?php
    echo("<tr>");
    echo("<td>");
    echo($a['RegNo']);
    echo("</td>");
    echo("<td>");
    echo($a['Qid']);
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
    if($StudentRegNo==$a['RegNo']){
    $totalRad+=$a['Mark'];
    }
    else{
        $StudentRegNo=$a['RegNo'];
        $totalRad=$a['Mark'];
    }
    echo("<td>");
    echo($totalRad);
    echo("</td>");
    echo("</tr>");
    ?>
<?php }

else{
    $totalRad=0;
    echo("</table>");
    $radTopic=$a['topic'];
    echo("<h3>".$radTopic."</h3>");
    ?>
    <table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Question ID</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Mark</th>

</tr>
<?php
echo("<tr>");
echo("<td>");
echo($a['RegNo']);
echo("</td>");
echo("<td>");
echo($a['Qid']);
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
echo("</table>");
}
echo("</table>");

}?>

<h1>TrueFalse</h1>
<?php
$truefalse=$arr2[0]['topic'];
$StudentRegNo=$arr2[0]['RegNo'];
echo($truefalse);
foreach($arr2 as $a){
    if($truefalse==$a['topic']){
    ?>
<table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Question ID</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Mark</th>
    <th>Total Mark</th>

</tr>

     <?php
    echo("<tr>");
    echo("<td>");
    echo($a['RegNo']);
    echo("</td>");
    echo("<td>");
    echo($a['id']);
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
    if($StudentRegNo==$a['RegNo']){
    $totaltrue+=$a['Mark'];
    }
    else{
        $StudentRegNo=$a['RegNo'];
        $totaltrue=$a['Mark'];
    }
    echo("<td>");
    echo($totaltrue);
    echo("</td>");
    echo("</tr>");
    ?>
<?php }

else{
    $totaltrue=0;
    echo("</table>");
    $truefalse=$a['topic'];
    echo("<h3>".$truefalse."</h3>");
    ?>
    <table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Question ID</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Mark</th>

</tr>
<?php
echo("<tr>");
echo("<td>");
echo($a['RegNo']);
echo("</td>");
echo("<td>");
echo($a['id']);
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
echo("</table>");
}
echo("</table>");

}?>

<h1>Short Answer</h1>
<?php
$shortans=$arr3[0]['Topic'];
$StudentRegNo=$arr3[0]['RegNo'];
echo("<h3>".$shortans."</h3>");
foreach($arr3 as $a){
    if($shortans==$a['topic']){
    ?>
<table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Question ID</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Mark</th>
    <th>Total Mark</th>

</tr>

     <?php
    echo("<tr>");
    echo("<td>");
    echo($a['RegNo']);
    echo("</td>");
    echo("<td>");
    echo($a['id']);
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
    if($StudentRegNo==$a['RegNo']){
        $totalshort+=$a['Mark'];
    }
    else{
        $StudentRegNo=$a['RegNo'];
        $totalshort=$a['Mark'];
    }
    echo("<td>");
    echo($totalshort);
    echo("</td>");
    echo("</tr>");
    ?>
<?php }

else{
    $totalshort=0;
    echo("</table>");
    $shortans=$a['topic'];
    echo("<h3>".$shortans."</h3>");
    ?>
    <table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Question ID</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Mark</th>

</tr>
<?php
echo("<tr>");
echo("<td>");
echo($a['RegNo']);
echo("</td>");
echo("<td>");
echo($a['id']);
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
echo("</table>");
}
echo("</table>");

}?>

<h1>File Uploads</h1>
<?php
$filetype=$arr4[0]['Topic'];
$StudentRegNo=$arr4[0]['RegNo'];
echo("<h3>".$filetype."</h3>");
foreach($arr4 as $a){
    if($filetype==$a['topic']){
    ?>
<table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Question ID</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Mark</th>
    <th>Total Mark</th>

</tr>

     <?php
    echo("<tr>");
    echo("<td>");
    echo($a['RegNo']);
    echo("</td>");
    echo("<td>");
    echo($a['id']);
    echo("</td>");
    echo("<td>");
    echo($a['ques']);
    echo("</td>");
    echo("<td>");
    ?>
        <a href="./uploads/<?php echo($a['CourseID']."/".$a['RegNo']."/".$a['Ans']); ?>">
            <?php echo($a['Ans'])?>
        </a>
    <?php
    echo("</td>");
    echo("<td>");
    echo($a['Mark']);
    echo("</td>");
    if($StudentRegNo==$a['RegNo']){
        $totalfile+=$a['Mark'];
    }
    else{
        $StudentRegNo=$a['RegNo'];
        $totalfile=$a['Mark'];
    }
    echo("<td>");
    echo($totalfile);
    echo("</td>");
    echo("</tr>");
    ?>
<?php }

else{
    $totalfile=0;
    echo("</table>");
    $filetype=$a['topic'];
    echo("<h3>".$filetype."</h3>");
    ?>
    <table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Question ID</th>
    <th>Topic</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Mark</th>

</tr>
<?php
echo("<tr>");
echo("<td>");
echo($a['RegNo']);
echo("</td>");
echo("<td>");
echo($a['id']);
echo("</td>");
echo("<td>");
echo($a['ques']);
echo("</td>");
echo("<td>");
    ?>
        <a href="./uploads/<?php echo($a['CourseID']."/".$a['RegNo']."/".$a['Ans']); ?>">
            <?php echo($a['Ans'])?>
        </a>
    <?php
echo("</td>");
echo("<td>");
echo($a['Mark']);
echo("</td>");
echo("</tr>");
echo("</table>");
}
echo("</table>");

}?>




</table>
</div>
	</div>
        </div>

<?php include('./footer.html'); ?>

</body>
</html>