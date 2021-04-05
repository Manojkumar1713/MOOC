<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Resources</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/kare_icon.ico" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
</head>
<body>
<?php
session_start();
 $arr=$_SESSION['array'];
?>
<div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Student Portal</h3>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="CourseSpecificRedirect.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="#Quiz" data-toggle="collapse" aria-expanded="false">Quiz</a>
                        <ul class="collapse list-unstyled" id="Quiz">
                            <li><a href="CourseSpecificRedirect.php?AddTopic">Quiz</a></li>
                            <li><a href="CourseSpecificRedirect.php?CreateMCQ">View Result</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#Assignment" data-toggle="collapse" aria-expanded="false">Assignment</a>
                        <ul class="collapse list-unstyled" id="Assignment">
                        <li class="active">
                        <a href="#CreateAssignQuiz" data-toggle="collapse" aria-expanded="false">Create Assignment</a>
                        <ul class="collapse list-unstyled" id="CreateAssignQuiz">
                            <li><a href="CourseSpecificRedirect.php?AssignAddTopic">Add Topic</a></li>
                            <li><a href="CourseSpecificRedirect.php?AssignCreateMCQ">MCQ</a></li>
                            <li><a href="CourseSpecificRedirect.php?AssignCreateTrue">True / False</a></li>
                            <li><a href="CourseSpecificRedirect.php?AssignCreateShortAnswer">Short Answer</a></li>
                            <li><a href="CourseSpecificRedirect.php?AssignCreateFileUpload">File Type</a></li>
                        </ul>
                        </li>
                        <li class="active">
                        <a href="#ViewAssignQuiz" data-toggle="collapse" aria-expanded="false">View Assignment</a>
                        <ul class="collapse list-unstyled" id="ViewAssignQuiz">
                            <li><a href="CourseSpecificRedirect.php?AssignViewMCQ">MCQ</a></li>
                            <li><a href="CourseSpecificRedirect.php?AssignViewTrue">True / False</a></li>
                            <li><a href="CourseSpecificRedirect.php?AssignViewShortAnswer">Short Answer</a></li>
                            <li><a href="CourseSpecificRedirect.php?AssignViewFileUpload">File Type</a></li>
                        </ul>
                        </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#Materials" data-toggle="collapse" aria-expanded="false">Materials</a>
                        <ul class="collapse list-unstyled" id="Materials">
                            <li><a href="CourseSpecificRedirect.php?Resource">Unit</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="CourseSpecificRedirect.php?StudentReport">Student Progress</a>
                    </li>
                    
                <li>
                    <?php
                    if($arr[0]['CompilerRequired']==1){
                        ?>
                       <a href="CourseSpecificRedirect.php?Compiler">Lab Assignment</a>
                       <?php
                    }
                    else{
                        ?>
                        <style type="text/css">#divId{
                        display:none;
                        }</style>
                        <?php
                        }
                        ?>
                </li>
                <li>
                    <a href="CourseSpecificRedirect.php?DiscussionForum">Discussion Forum</a>
                </li>
   
                </ul>
                <ul class="list-unstyled CTAs">
                    <li><a href="#" class="download">Logout</a></li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="CourseSpecificRedirect.php?Back" >Home</a></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

<div class="container-fluid">
<div class="jumbotron" style="background-color: #2a103c; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #2a103c;">VIEW RESOURCES</h1>
</div>
                
<?php 
include "ResourceDetails.php";
//session_start();
global $b;
$res = new ResourceDetails;
$arra=$res->GetResourceDetails();
$sessionArr=$_SESSION['array'];
$unitStore=array();
$arraystore=array();
for($i=0;$i<count($arra);$i++){
    if($arra[$i]['CourseID']===$sessionArr[0]['CourseID']){

    
            if(array_key_exists($arra[$i]['Unit'],$unitStore)){
                array_push($unitStore[$arra[$i]['Unit']],$arra[$i]);
            }

            else{
                
                $unitStore[$arra[$i]['Unit']]=array($arra[$i]);
                 }
        }
    
}
//var_dump($unitStore);
// foreach($unitStore as $k=>$v){
//         echo("<br><h3>");
//        echo("Unit".$k);
//        echo("</h3>");
       foreach($_SESSION['ResourceArray'] as $newarr){
        echo("<br>");
        echo("File:"); ?>
        <a href="../Staff/uploads/<?php echo $newarr['CourseID']."/".$newarr['FilePath'] ?>">
            <?php echo($newarr['FilePath'])?>
        </a>
        <?php 
        echo("<br>");
        ?>
        <a href="<?php echo $newarr['Extlink'] ?>">
        <?php echo($newarr['Extlink'])?>
        </a>
        <?php
        echo("<br>");
        echo("YouTube Video Link: <br> ".$newarr['VideoLink']);
        echo("<br>");
       }
//     }
//var_dump($_SESSION['ResourceArray']);
//var_dump($unitStore);
    ?>

</div>

<?php include('./footer.html'); ?>

</body>
</html>