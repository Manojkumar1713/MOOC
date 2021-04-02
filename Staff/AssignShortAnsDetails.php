<?php
class ShortAnsDetails{
    public function __construct()
    {
       include "db.php";
        // echo "Connected successfully";
    }
    public function StaffShortAnsPostData(){

        include "db.php";
        // echo "Connected successfully";
        session_start(); 

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $CourseID =$_SESSION['CourseID'];
        $StaffID=$_SESSION['StaffID'];
        $topic=$_POST['topicSel'];
        $Ques=$_POST['ques'];
        $correct=$_POST['answer'];
        $QuestionType="shortans";
        }

        $sql = $conn->prepare("INSERT INTO assignmentshortans (CourseID,StaffID,topic,ques,ans,QuestionType)
            VALUES (?,?,?,?,?,?)");

            $sql->bind_param("ssssss",$CourseID,$StaffID,$topic,$Ques,$correct,$QuestionType);
            $sql->execute();
            $sql->close();
            $conn->close();;
        }
        public function GetShortAnsDetails(){
            $GetTrueFalsesDetails=array();
    
            include "db.php";
            $sql = "SELECT * FROM assignmentshortans";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) 
            {
                while($row = mysqli_fetch_assoc($result)) {
                   array_push($GetTrueFalsesDetails,$row);
                }
            return $GetTrueFalsesDetails;
             } else {
                echo "Error retriving Data";
             }
             
             mysqli_close($conn);
    
    
        }
    public function StaffShortAnsSpecific(){

        //session_start();
 
        $GetShortAnsDetails=array();
        include "db.php";
        $sql = "SELECT StaffID,Topic,id,ques,ans FROM assignmentshortans where CourseID = '{$_SESSION['CourseID']}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetShortAnsDetails,$row);
            }
            
         //var_dump($GetStaffsDetails);   
        return $GetShortAnsDetails;
    }
}
public function DeleteShortAns()
{
    session_start();
    $GetStudents=array();

    include "db.php";
   $vari =$_SESSION['SID'];
   $vari="$vari";
   //echo($vari);
    $sql = "DELETE FROM assignmentshortans WHERE id = '{$vari}'";
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
    VALUES ( '$topic','$unit','shortans','$CourseID','$StaffID','$StartTime','$EndTime')";
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

    $sql = "SELECT * FROM assigntopic WHERE CourseID = '{$vari}'AND QuestionType = 'shortans' ";
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
$inst = new ShortAnsDetails;
//var_dump($inst->GetShortAnsDetails());
?>
