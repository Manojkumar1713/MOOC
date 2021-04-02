<?php
class ComplierDetails{

    public function PostData()
    {
         //session_start();
         include "db.php";
        
       //var_dump($_SESSION['array']);
       $arr=$_SESSION['array'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $arr[0]['StaffID'];
            $Course=$arr[0]['CourseID'];

            $ques =$_POST['question'];
            $sample = $_POST['sample'];
            $output = $_POST['output'];
            $test1  = $_POST['testcase1'];
            $tout = $_POST['t1out'];
            $test2= $_POST['testcase2'];
            $tout2 = $_POST['t2out'];
            $title = $_POST['title'];
            $assign = $_POST['assignment'];
            $format = $_POST['format'];
            $table=$_POST['language'];
            $StartTime=strtotime($_POST['StartDate']);
            $EndTime=strtotime($_POST['EndDate']);
            $query = "insert into question(input,output,format,t1in,t1out,t2in,t2out,ques,title,Number,language,StartTime,ExpiryTime,StaffID,CourseID)values('$sample','$output','$format','$test1','$tout','$test2','$tout2','$ques','$title','$assign','$table','$StartTime','$EndTime','$user','$Course')";

	        if ($conn->query($query) === TRUE) {
                echo "New record created successfully";
                } else {
                echo "Error: " . $query . "<br>" . $conn->error;
                }$conn->close();

        }
    }


}
?>