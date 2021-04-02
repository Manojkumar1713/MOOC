<!DOCTYPE html>
<html lang="en">
<head>
    <title>View File Type Question</title>
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

<?php 

//session_start();
include "FileTypeQuestionDetails.php";


    $buttonClick = new FileTypeDetails;
    $arr=$buttonClick-> StaffFileTypeSpecific();
    global $b;

?>
<div class="container-fluid">
<div class="jumbotron" style="background-color: #222d32; padding-top: 25px; padding-bottom: 25px;">
    <h1 style="background-color: white; color: #222d32;">VIEW FILE TYPE QUESTION</h1>
</div>
<table border="1" id='customers'>
<tr>
    <th>Unit</th>
    <th>Topic</th>
    <th>Question</th>
    <th>Delete</th>
</tr>
<?php
foreach($arr as $a){
    ?>
     <?php
    echo("<tr>");
    echo("<td>");
    echo($a['unit']);
    echo("</td>");
    echo("<td>");
    echo($a['Topic']);
    echo("</td>");
    echo("<td>");
	echo($a['ques']);
	echo("</td>");
    ?>
    <form action="" method="post">
    <td>
    <input type='submit' value="Delete" name="<?php echo($a['id']);$b=$a['id']; ?>" class="btn btn-danger" >
    </td>
    </tr>
    </form> 
    <?php
    
     // echo($row['CourseID']);
    if(isset($_POST[$b])) 
    { 
    $buttonClick = new FileTypeDetails;
    $_SESSION['SID']=$b;
    echo( $_SESSION['SID']);
    $ar=$buttonClick->DeleteFileType();
    //header("Location: ./CourseSpecificRedirect.php");
    echo("<script>location.href = './FileTypeView.php';</script>");
    }   
    ?>

<?php }?>
</table>
</div>

<?php include('./footer.html'); ?>

</body>
</html>
