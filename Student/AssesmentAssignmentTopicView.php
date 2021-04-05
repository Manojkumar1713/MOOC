
<?php
session_start();
include "CourseDetails.php";
$instance = new CourseDetails;
$MCQ=$instance->Restrive();
//var_dump($MCQ);
?>

<table border="1" id='customers'>
<tr>
    <th>StaffID</th>
    <th>Name</th>
    <th>Password</th>
    <th>Dept</th>
    <th>Email</th>
    <th>Phone No</th>
</tr>
<?php
foreach($MCQ as $a){
    ?>
     <?php
    echo("<tr>");
    echo("<td>");
    echo($a['StaffID']);
    echo("</td>");
    echo("<td>");
    echo($a['Name']);
    echo("</td>");
    echo("<td>");
	echo($a['Password']);
    echo("</td>");
    echo("<td>");
	echo($a['Dept']);
    echo("</td>");
    echo("<td>");
	echo($a['Email']);
    echo("</td>");
    echo("<td>");
	echo($a['PhoneNo']);
    echo("</td>");
    ?>
    </tr>
    <?php }?>
</table>
