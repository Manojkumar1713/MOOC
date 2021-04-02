<?php 
session_start();

include "AllStudentMarkDetails.php";

    $buttonClick = new AllStudentMarkDetails;
    $arr=$buttonClick->RetriveAllMarkDetails();
    var_dump($arr);
?>