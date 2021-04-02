<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Resource</title>
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

<style>

.footer {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  color: white;
  text-align: center;
}

</style>


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


<?php 
// $rootDir = basename(__DIR__);

include "ResourceDetails.php";
if(isset($_POST['submit'])) { 
    $buttonClick = new ResourceDetails;
    //var_dump($_FILES['file']);
    $buttonClick->PostData();

} 
?>

<div class="container-fluid">
<?php 
if(isset($_POST['Back'])) 
{ 
    header("Location: ./CourseSpecificRedirect.php");
}
?>

<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">UPLOAD RESOURCE</h1>
</div>

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                    <label><b>Unit</b></label>
                    <input type="text" name="unit" class="form-control">
                    </div>
                    <div class="form-group">
                    <label><b>Topic</b></label>
                    <input type="text" name="Topic" class="form-control">
                    </div>
                    <div class = "form-group">
                       <label for ="link">Embeded Video link</label>
                       <input type = "text" name="link" id="link" class="form-control">
                     </div>
                     <h4>OR</h4>
                     <div class = "form-group">
                       <label for ="link">Link</label>
                       <input type = "text" name="ExternalLink" id="link" class="form-control">
                     </div>
                     <h4>OR</h4>
                    <!-- <label>CourseID</label>
                    <input type="text" name="CourseID" > -->
                    <div>
                    <label><b>Upload Resource</b></label>
                        <input type="file" name="file" id="file" data-max-file-size="1024M">
                    </div><br>
                  
                    <input type="submit" name="submit" class="btn btn-success">
                </form>

               
                <?php
                 if(isset($_POST['View'])) { 
                $buttonClick = new ResourceDetails;
                $FileName=$buttonClick->GetResourceDetails();
                //var_dump($FileName);
                //echo($FileName[1]['FilePath']);
                // $GLOBALS['displayFile']="Location: ./uploads/".$FileName[1]['FilePath'];
                // // echo("<a href=".$displayFile."/>");
                // //link($displayFile,$FileName[1]['FilePath']);
                // echo('<input type="submit" value='.$FileName[1]['FilePath'].'>');
                //  }
                //  //echo(getcwd().$displayFile);
                //  foreach($FileName as $test){
                //     echo('<form method="post" action=""><input type="submit" name='.$test['FilePath'].' value='.$test['FilePath'].'></form>');
                //     // $GLOBALS['test2']="Location: ./uploads/".$test['FilePath'];
                //     // header($GLOBALS['test2']);
                //     if(isset($_POST[$test['FilePath']])){
                //     $GLOBALS['test2']="Location: ./uploads/".$test['FilePath'];
                //      header($GLOBALS['test2']);
                   // }
                   $files = scandir("uploads");

                     for ($a = 2; $a < count($files); $a++)
                   {
                ?>
                <p>
 
        <!-- href should be complete file path !-->
        <!-- download attribute should be the name after it downloads !-->
        <a href="uploads/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>">
        <?php echo $files[$a]; ?>
        </a>
    </p>
    <?php
}
                 }?>

</div>
<div class="footer"><a href="../Developers/index.php" style="color: black;">Made with 💚 for</a> <a href="../Developers/index.php" style="color: red;">KARE</a>
<?php include('./footer.html'); ?>

</div>

</body>
</html>   