<html>
<body>
<?php
session_start(); 
include "CourseDetails.php";
$Courses = new CourseDetails;
$topicArr=array();
$newarr=array();
$arr=$Courses->TopicSummaryReport();
var_dump($arr);

?>
<div>
<form action="" method="post">
    <input type="text" name="search">
    <input type="submit" name="searchbutt" value="Search" >
</div>
</form>
<?php
if(isset($_POST['searchbutt'])){
    foreach($arr as $a){
        if($a['topic']==$_POST['search']){
            $newarr=$a;
        }
    }
}
var_dump($newarr);

?>
</body>
</html>