<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assignment Short Answer Topic</title>
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
                        <a href="CourseSpecificRedirect.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="CourseSpecificRedirect.php?viewStudent" target="_blank">View Students</a>
                    </li>
                    <li class="active">
                        <a href="#createQuiz" data-toggle="collapse" aria-expanded="false">Quiz Questions</a>
                        <ul class="collapse list-unstyled" id="createQuiz">
                            <li><a href="CourseSpecificRedirect.php?CreateMCQ">MCQ</a></li>
                            <li><a href="CourseSpecificRedirect.php?CreateTrue">True / False</a></li>
                            <li><a href="CourseSpecificRedirect.php?CreateShortAnswer">Short Answer</a></li>
                            <li><a href="CourseSpecificRedirect.php?CreateFileUpload">File Type</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#viewQuiz" data-toggle="collapse" aria-expanded="false">View Quiz</a>
                        <ul class="collapse list-unstyled" id="viewQuiz">
                            <li><a href="CourseSpecificRedirect.php?ViewMCQ">MCQ</a></li>
                            <li><a href="CourseSpecificRedirect.php?ViewTrue">True / False</a></li>
                            <li><a href="CourseSpecificRedirect.php?ViewShortAnswer">Short Answer</a></li>
                            <li><a href="CourseSpecificRedirect.php?ViewFileUpload">File Type</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#Assignment" data-toggle="collapse" aria-expanded="false">Assignment</a>
                        <ul class="collapse list-unstyled" id="Assignment">
                        <li class="active">
                        <a href="#CreateAssignQuiz" data-toggle="collapse" aria-expanded="false">Create Assignment</a>
                        <ul class="collapse list-unstyled" id="CreateAssignQuiz">
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
                    
                    <li>
                        <a href="CourseSpecificRedirect.php?UploadResources">Upload Resource</a>
                    </li>
                    <li>
                        <a href="CourseSpecificRedirect.php?Resource">View Resource</a>
                    </li>
                    <li>
                        <a href="CourseSpecificRedirect.php?StudentReport">Student Report</a>
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
<?php
if(isset($_POST['Submit'])){
    include "AssignShortAnsDetails.php";
    $NewTopic = new ShortAnsDetails;
    $NewTopic->QuizTopic();
    echo("<script>location.href = './AssignShortAns.php';</script>");
}
?>


<form action="" method="post">
<div class="form-group">
<label><b>Unit</b></label>
<input type="text" name="Unit" class="form-control">
</div>
<div class="form-group">
<label><b>Topic</b></label>
<input type="text" name="Topic" class="form-control">
</div>
<div class="form-group">    
<label for="StartDate"><b>Start Date</b></label>
<input type="datetime-local"  name="StartDate" class="form-control">
</div>

<div class="form-group">    
<label for="StartDate"><b>End Date</b></label>
<input type="datetime-local"  name="EndDate" class="form-control">
</div>
<input type="submit" name="Submit" class="btn btn-success">
</form>
</div>
</div>
</div>
    </div>
        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar, #content').toggleClass('active');
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });
        </script>
    </body>
</html>