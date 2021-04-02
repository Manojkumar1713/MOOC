<?php
class QuizDetails{
    public function __construct()
    {
        include "db.php";
        // echo "Connected successfully";
    }
    public function PostData(){

        include "db.php";
        // echo "Connected successfully";

         $CompilerRequired=0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(!empty($_FILES['file']['name']))
            {
                
            $file = $_FILES['file']['name'];
            $filesize = $_FILES['file']['size'];
            $filetype = $_FILES['file']['type'];
            $filetmp = $_FILES['file']['tmp_name'];
            $files = 'quiz/'.$_FILES['file']['name'];
            $move = move_uploaded_file($filetmp,$files);
            }
            
            
            $topic=$_POST['topicSel'];
            $question=$_POST['question'];
            $opA=$_POST['optionA'];
            $opB=$_POST['optionB'];
            $opC=$_POST['optionC'];
            $opD=$_POST['optionD'];
            $correct=$_POST['ans'];
            $correct2=$_POST['ans2'];
            $correct3=$_POST['ans3'];
            $QuestionType="mcq";
            $CourseID =$_SESSION['CourseID'];
            $StaffID=$_SESSION['StaffID'];
        }

        $sql =$conn->prepare("INSERT INTO assignmentquiz (Topic,FilePath, Qname, opA, opB, opC, opD, correct,correct2,correct3,QuestionType,CourseID,StaffID)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");

            $sql->bind_param("sssssssssssss",$topic,$file,$question,$opA,$opB,$opC,$opD,$correct,$correct2,$correct3,$QuestionType,$CourseID,$StaffID);
            $sql->execute();
            $sql->close();
            $conn->close();
        }

    public function GetQuizDetails(){
        $GetQuizsDetails=array();

        include "db.php";
        $sql = "SELECT * FROM assignmentquiz";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetQuizsDetails,$row);
            }
        return $GetQuizsDetails;
         } else {
            echo "Error retriving Data";
         }
         
         mysqli_close($conn);


    }
    public function GetSpecificCourse(){
        //session_start();
        $GetSpecificQuizDetails=array();

        include "db.php";
       $vari =$_SESSION['Qid'];
       $vari="$vari";
       echo($vari);
        $sql = "SELECT * FROM quiz WHERE Qid = '{$vari}'";
        echo($sql);
        $result = mysqli_query($conn, $sql);
        var_dump($result);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetSpecificQuizDetails,$row);
            }
        return $GetSpecificQuizDetails;
         } else {
            echo "Error retriving Data";
         }
         
         mysqli_close($conn);
    }
    public function GetStaffSpecificQuiz(){
        //session_start();
        $GetSpecificQuizDetails=array();

        include "db.php";
       $vari =$_SESSION['CourseID'];
       $vari="$vari";
       //echo($vari);
        $sql = "SELECT * FROM assignmentquiz WHERE CourseID = '{$vari}'";
        //echo($sql);
        $result = mysqli_query($conn, $sql);
        //var_dump($result);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetSpecificQuizDetails,$row);
            }
        return $GetSpecificQuizDetails;
         } else {
            echo "Error retriving Data";
         }
         
         mysqli_close($conn);
    }
    public function DeleteQuiz()
    {
        session_start();
        $GetStudents=array();

        include "db.php";
       $vari =$_SESSION['QID'];
       $vari="$vari";
       //echo($vari);
        $sql = "DELETE FROM assignmentquiz WHERE Qid = '{$vari}'";
        //echo($sql);
        $result = mysqli_query($conn, $sql);
        //var_dump($result);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetStudents,$row);
            }
        return $GetStudents;
         } else {
            echo "Error retriving Data";
         }
         
         mysqli_close($conn);
    }

    public function QuizTopic()
    {
        session_start();
        $GetStudents=array();

        include "db.php";
        $topic=$_POST['Topic'];
        $unit=$_POST['Unit'];
       $StartTime=strtotime($_POST['StartDate']);
       $EndTime=strtotime($_POST['EndDate']);
       $StaffID=$_SESSION['StaffID'];
       $CourseID=$_SESSION['CourseID'];
       //echo($vari);
          $sql = "INSERT INTO assigntopic ( topic,unit,QuestionType,CourseID,StaffID,StartTime,ExpiryTime)
        VALUES ( '$topic','$unit','mcq','$CourseID','$StaffID','$StartTime','$EndTime')";
        echo($sql);
        if ($conn->query($sql) === TRUE) {
             echo "New record created successfully";
             } else {
             //echo "Error: " . $sql . "<br>" . $conn->error;
             }$conn->close();
    }
    public function GetTopicDetails(){
        $GetQuizsDetails=array();

        include "db.php";
        $vari =$_SESSION['CourseID'];
       $vari="$vari";

        $sql = "SELECT * FROM assigntopic WHERE CourseID = '{$vari}'AND QuestionType = 'mcq' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetQuizsDetails,$row);
            }
        return $GetQuizsDetails;
         } else {
            echo "Error retriving Data";
         }
         
         mysqli_close($conn);


    }
}
$inst = new QuizDetails;
//var_dump($inst->GetQuizDetails());
?>
