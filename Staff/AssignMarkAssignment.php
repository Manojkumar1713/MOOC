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
$arr3= $studentmark->RetriveAssignStudentShortAnsMark();
$arr4= $studentmark->RetriveAssignFileTypeAnsMark();
//global $b;
// array_push($StudentDetails,$arr);
// array_push($StudentDetails,$arr2);
// array_push($StudentDetails,$arr3);
//var_dump($StudentDetails);
?>
<div class="container-fluid">
<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">STUDENT REPORT</h1>
</div>

<div align="center">
    <input type="text" name="search" id="search" class="form-control" placeholder="Search here...">
</div>

<h1>Short Answer</h1>
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
foreach($arr3 as $a){
    ?>
    <div id="customers">
     <?php
    echo("<tr>");
    echo("<td>");
    echo($a['RegNo']);
    echo("</td>");
    echo("<td>");
    echo($a['id']);
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
    ?>
    <form action="" method="post">
    <input type="number" name="<?php echo($a['studentMarkId']); ?>">
    <input type="hidden" name="id" value="<?php echo($a['studentMarkId']); ?>">
    <input type="submit" name="Submit">
    </form>
    <?php
    echo("<td>");
    echo("</tr>");
    ?>
<?php

if(isset($_POST['Submit'])){
    $_SESSION['ID']=$_POST[$a['studentMarkId']];
    $_SESSION['RecordID']=$_POST['id'];
    echo("test");
    echo($_SESSION['ID']);
    echo($_SESSION['RecordID']);
    $studentmark->assignMarkShortStudentAM();
}
 }?>
</table>

<h1>File Uploads</h1>

<table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Question ID</th>
    <th>Topic</th>
    <th>Question</th>
    <th>Uploads</th>
    <th>Mark</th>
</tr>

<?php
foreach($arr4 as $a){
    ?>
    <div id="customers">
     <?php
    
    echo("<tr>");
    echo("<td>");
    echo($a['RegNo']);
    echo("</td>");
    echo("<td>");
    echo($a['id']);
    echo("</td>");
    echo("<td>");
    echo($a['Topic']);
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
    ?>
    <form action="" method="post">
    <input type="number" name="<?php echo($a['studentMarkId']); ?>">
    <input type="hidden" name="id" value="<?php echo($a['studentMarkId']); ?>">
    <input type="submit" name="Submit">
    </form>
    <?php
    echo("</td>");
    echo("</tr>");
    ?>
    </div>
<?php
if(isset($_POST['Submit'])){
    $_SESSION['ID']=$_POST[$a['studentMarkId']];
    $_SESSION['RecordID']=$_POST['id'];
    echo("test");
    echo($_SESSION['ID']);
    echo($_SESSION['RecordID']);
    $studentmark->assignMarkFileTypeAM();
}
 }?>
</table>
</div>
	</div>
        </div>

<?php include('./footer.html'); ?>

</body>
</html>

 <script>  
      $(document).ready(function(){  
           $('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#customers tr').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {    
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }  
      });  
 </script> 