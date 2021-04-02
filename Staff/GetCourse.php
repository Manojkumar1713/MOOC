<html>
<body>
<?php 
include "CourseDetails.php";
$Courses = new CourseDetails;
$arr=$Courses->GetCourseDetails();
//var_dump($arr);
?>

<table>
<tr>
<?php
foreach($arr as $a){
    ?>
    <tr>
    <?php
    echo($a['Name']);
    echo($a['Dept']);
    ?>
    </tr>
<?php }?>

</table>
</body>
</html>