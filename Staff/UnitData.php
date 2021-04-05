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
                    <h3>Staff Portal</h3>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="CourseSpecificRedirect.php?Back">Home</a>
                    </li>
                    <li>
                        <a href="CourseSpecificRedirect.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="CourseSpecificRedirect.php?Annoucement">Announcement</a>
                    </li>
                    <li>
                        <a href="CourseSpecificRedirect.php?viewStudent" target="_blank">View Students</a>
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
                    <!--================================================================================================-->
                    <li class="active">
                        <a href="#Assignment" data-toggle="collapse" aria-expanded="false">Assessment</a>
                        <ul class="collapse list-unstyled" id="Assignment">
                        <li class="active">
                          <li><a href="CourseSpecificRedirect.php?AddTopic">Add Topic</a></li>
                        <a href="#CreateAssignQuiz" data-toggle="collapse" aria-expanded="false">Create Assessment</a>
                        <ul class="collapse list-unstyled" id="CreateAssignQuiz">
                          <li><a href="CourseSpecificRedirect.php?CreateMCQ">MCQ</a></li>
                          <li><a href="CourseSpecificRedirect.php?CreateTrue">True / False</a></li>
                          <li><a href="CourseSpecificRedirect.php?CreateShortAnswer">Short Answer</a></li>
                        </ul>
                        </li>
                        <li class="active">
                        <a href="#ViewAssignQuiz" data-toggle="collapse" aria-expanded="false">View Assessment</a>
                        <ul class="collapse list-unstyled" id="ViewAssignQuiz">
                          <li><a href="CourseSpecificRedirect.php?ViewMCQ">MCQ</a></li>
                          <li><a href="CourseSpecificRedirect.php?ViewTrue">True / False</a></li>
                          <li><a href="CourseSpecificRedirect.php?ViewShortAnswer">Short Answer</a></li>
                        </ul>
                        </li>
                        <li><a href="CourseSpecificRedirect.php?AssignShortAnsMark">Assign Short Answer Mark</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#createAssignmnet" data-toggle="collapse" aria-expanded="false">Assignment</a>
                        <ul class="collapse list-unstyled" id="createAssignmnet">
                            <li><a href="CourseSpecificRedirect.php?CreateFileUpload">Create Assignment</a></li>
                            <li><a href="CourseSpecificRedirect.php?ViewFileUpload">View Assignment</a></li>
                            <li><a href="CourseSpecificRedirect.php?AssignAssignmentMark">Assign Assignment Mark</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#PracticeQuiz" data-toggle="collapse" aria-expanded="false">Practice Quiz</a>
                        <ul class="collapse list-unstyled" id="PracticeQuiz">
                        <li class="active">
                        <a href="#CreatePracticeQuiz" data-toggle="collapse" aria-expanded="false">Create Practice Quiz</a>
                        <ul class="collapse list-unstyled" id="CreatePracticeQuiz">
                          <li><a href="CourseSpecificRedirect.php?CreatePracticeMCQ">MCQ</a></li>
                          <li><a href="CourseSpecificRedirect.php?CreatePracticeTrueFalse">True / False</a></li>
                        </ul>
                        </li>
                        <li class="active">
                        <a href="#ViewPracticeQuiz" data-toggle="collapse" aria-expanded="false">View Practice Quiz</a>
                        <ul class="collapse list-unstyled" id="ViewPracticeQuiz">
                          <li><a href="CourseSpecificRedirect.php?ViewPracticeMCQ">MCQ</a></li>
                          <li><a href="CourseSpecificRedirect.php?ViewPracticeTrueFalse">True / False</a></li>
                        </ul>
                        </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#createResource" data-toggle="collapse" aria-expanded="false">Resource</a>
                        <ul class="collapse list-unstyled" id="createResource">
                            <li><a href="CourseSpecificRedirect.php?UploadResources">Upload Resource</a></li>
                            <li><a href="CourseSpecificRedirect.php?Resource">View Resource</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#StudentReporttt" data-toggle="collapse" aria-expanded="false">Report</a>
                        <ul class="collapse list-unstyled" id="StudentReporttt">
                        <li class="active">
                        <a href="#Report" data-toggle="collapse" aria-expanded="false">Student Report</a>
                        <ul class="collapse list-unstyled" id="Report">
                            <li><a href="CourseSpecificRedirect.php?StudentReport">Assessment Report</a></li>
                            <li><a href="CourseSpecificRedirect.php?AssignmentReport">Assignment Report</a></li>
                        </ul>
                        </li>
                        <li class="active">
                        <a href="#TopicReport" data-toggle="collapse" aria-expanded="false">Student Topic Report</a>
                        <ul class="collapse list-unstyled" id="TopicReport">
                            <li><a href="CourseSpecificRedirect.php?QuizTopicReport">Assessment Topic Report</a></li>
                            <li><a href="CourseSpecificRedirect.php?StudentAssignmentResult">Assignment Topic Report</a></li>
                        </ul>
                        </li>
                        <li class="active">
                        <a href="#MarkReport" data-toggle="collapse" aria-expanded="false">Student Summary Report</a>
                        <ul class="collapse list-unstyled" id="MarkReport">
                            <li><a href="CourseSpecificRedirect.php?MarkReport">Assessment Summary Report</a></li>
                            <li><a href="CourseSpecificRedirect.php?AssignmentMarkReport">Assignment Summary Report</a></li>
                        </ul>
                        </li>
                        </ul>
                    </li>

                <li class="active">
                    <a href="#Discussion" data-toggle="collapse" aria-expanded="false">Forum</a>
                    <ul class="collapse list-unstyled" id="Discussion">
                        <li><a href="CourseSpecificRedirect.php?DiscussionForum">Discussion Forum</a></li>
                        <li><a href="CourseSpecificRedirect.php?PrivateForum">Private Forum</a></li>
                    </ul>
                </li>
                <li>
                      <a href="CourseSpecificRedirect.php?Feedback">Feedback</a>
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
                                <li><a href="CourseSpecificRedirect.php?Back">Home</a></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
<div class="container-fluid">
<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">VIEW RESOURCES</h1>
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
//  var_dump($arra);
//  var_dump($sessionArr[0]['CourseID']);
//  var_dump(count($arra));
for($i=0;$i<count($arra);$i++){
    // var_dump($sessionArr[0]['CourseID']);
     //var_dump($arra[$i]);
    //var_dump($arra[$i]['CourseID']);
    if($arra[$i]['CourseID']===$sessionArr[0]['CourseID']){

       
            // if(!array_key_exists($arra[$i]['Unit'],$arraystore)){
            //     $arraystore[$arra[$i]['Unit']]=$arra[$i];
            // }
            // else
            // {
            //     for($i=0;$i<count($arraystore);$i++){
            //     $arraystore[$arra[$i]['Unit']]=$arra[$i];}
            // }
    
            if(array_key_exists($arra[$i]['Unit'],$unitStore)){
                array_push($unitStore[$arra[$i]['Unit']],$arra[$i]);
                //echo("<h3>Resource</h3>".$arra[$i]['FilePath']); 
            }

            else{
                // array_push($unitStore[$arra[$i]['Unit']],$arra[$i]);
                $unitStore[$arra[$i]['Unit']]=array($arra[$i]);
                //echo($unitStore[$arra[$i]['Unit']]);
            }
        // echo("<h3>Unit".$arra[$i]['Unit']."</h3>");
        // echo("<h3>Resource</h3>".$arra[$i]['FilePath']);
       
      // var_dump($v);
    }
    // else{
    //     echo("<br>not retriving data");
    // }
    
}
foreach($unitStore as $k=>$v){
        echo("<br><h3>");
       echo("Unit ".$k);
       echo("</h3>");
       foreach($v as $newarr){
        echo("Topic:");
        echo($newarr['Topic']);   
        echo("</h4>");
        echo("<br>");
        echo("File:"); ?>
        <a href="./uploads/<?php echo $newarr['CourseID']."/".$newarr['FilePath'] ?>">
            <?php echo($newarr['FilePath'])?>
        </a>
        <?php 
        echo("<br>");?>
        <a href="<?php echo $newarr['Extlink'] ?>" target="_blank" >
        <?php echo($newarr['Extlink'])?>
        </a>
        
       <?php
        echo("<br>");
        echo("YouTube Video Link: <br> ".$newarr['VideoLink']);
        echo("<br>");
        ?>
        <form action="" method="post">
        <input type='submit' value="Delete" name="<?php echo($newarr['ResourceID']);$b=$newarr['ResourceID']; ?>" class="btn btn-danger" >
        </form>
        <?php
         if(isset($_POST[$b])) 
         { 
            $_SESSION['RID']=$b;
            $res->DeleteRes();
            echo("<script>location.href = './UnitData.php';</script>");


         }
       }
    }
//var_dump($unitStore);
    ?>

</div>

<?php include('./footer.html'); ?>

</body>
</html>