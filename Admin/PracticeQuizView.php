<!DOCTYPE html>
<html lang="en">
<head>
    <title>View MCQ</title>
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

<?php include('./header.html'); ?>

<div class="container-fluid">
<?php 
if(isset($_POST['Back'])) 
{ 
    header("Location: ./CourseSpecificRedirect.php");
}
?>

<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">VIEW  PRACTICE MCQ</h1>
</div>
<?php 

include "QuizDetails.php";


    $buttonClick = new QuizDetails;
    $arr=$buttonClick->PracticeGetStaffSpecificQuiz();
    global $b;

// } 
?>
<table border="1" id='customers'>
<tr>
    <th>Unit</th>
    <th>Topic</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Delete</th>
</tr>
<?php
foreach($arr as $a){
    ?>
     <?php
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
    ?>
    <form action="" method="post">
    <td>
    <input type='submit' value="Delete" name="<?php echo($a['Qid']);$b=$a['Qid']; ?>" class="btn btn-danger" >
    </td>
    </tr>   
    </form>
    <?php
    
     // echo($row['CourseID']);
      if(isset($_POST[$b])) 
     { 
      $buttonClick = new QuizDetails;
     $_SESSION['QID']=$b;
     echo( $_SESSION['QID']);
     $ar=$buttonClick->PracticeDeleteQuiz();
     //header("Location: ./CourseSpecificRedirect.php");
     echo("<script>location.href = './PracticeQuizView.php';</script>");
     }
     ?>
<?php } ?>

</table>
</div>

<?php include('./footer.html'); ?>

</body>
</html>