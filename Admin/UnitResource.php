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
    <link rel="stylesheet" href="css/style1.css">
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
                    <h3>Admin Portal</h3>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="CourseSpecificRedirect.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="CourseSpecificRedirect.php?About">List of Course</a>
                    </li>
                     <li>
                        <a href="CourseSpecificRedirect.php?Back">View Courses</a>
                    </li>
                    <li>
                        <a href="CourseSpecificRedirect.php?Staff">Staff Details</a>
                    </li>
                    <li class="active">
                        <a href="#createResource" data-toggle="collapse" aria-expanded="false">Student Details</a>
                        <ul class="collapse list-unstyled" id="createResource">
                            <li><a href="CourseSpecificRedirect.php?KareStudents">KARE Students</a></li>
                            <li><a href="CourseSpecificRedirect.php?OtherStudents">Other College Students</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="list-unstyled CTAs">
                    <li><a href="CourseSpecificRedirect.php?Logout" class="download">Logout</a></li>
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
                                <li><a href="CourseSpecificRedirect.php?Logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

<div class="container-fluid">
<div class="jumbotron" style="background-color: #2a103c; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #2a103c;">VIEW RESOURCES</h1>
</div>
<center> 
<h2>               
<?php 

        $TopicName = array();
       foreach($_SESSION['ResourceArray'] as $newarr){
        if(in_array($newarr['Topic'],$TopicName)){
        echo("<br>");
        if($newarr['FilePath']!=null){
        echo("<h4>File: </h4><br>"); ?>
        <a href="../Staff/uploads/<?php echo $newarr['CourseID']."/".$newarr['FilePath'] ?>">
            <?php echo($newarr['FilePath'])?>
        </a>
       
        <?php
        }
        echo("<br>");
        if($newarr['VideoLink']){
        echo("YouTube Video Link: <br>".$newarr['VideoLink']);
        echo("<br>");
        }
        }else{
            echo("TOPIC: ");
            echo("<h4>".$newarr['Topic']."</h4>");
            echo("</center>");
            echo("<br>");
            array_push($TopicName,$newarr['Topic']);
            echo("<br>");
            if($newarr['FilePath']!=null){
        echo("File: <br>"); ?>
        <a href="../Staff/uploads/<?php echo $newarr['CourseID']."/".$newarr['FilePath'] ?>">
            <?php echo($newarr['FilePath'])?>
        </a>
            <?php} 
            
            if($newarr['Extlink']!=null){?>
            
        <a href="<?php echo $newarr['Extlink'] ?>" target="_blank" >
        <?php echo($newarr['Extlink'])?>
        </a>
        
        <?php
            }
        echo("<br>");
        if($newarr['VideoLink']!=null){
        echo("YouTube Video Link: <br>".$newarr['VideoLink']);
        echo("<br>");
        }
        }
       }
//     }
//var_dump($_SESSION['ResourceArray']);
//var_dump($unitStore);
    ?>
</h2>
</div>

<?php include('./footer.html'); ?>

</body>
</html>