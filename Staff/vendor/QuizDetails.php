<?php
class QuizDetails{
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $port="3308";
        $db = "klu";

        $conn = mysqli_connect($servername, $username, $password,$db,$port);
        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        // echo "Connected successfully";
    }
    public function PostData(){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $port="3308";
        $db = "klu";

        $conn = new mysqli($servername, $username, $password,$db,$port);
        session_start();
        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
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
            
            $unit=$_POST['Unit'];
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

        $sql=$conn->prepare("INSERT INTO quiz ( Unit,Topic,FilePath, Qname, opA, opB, opC, opD, correct,correct2,correct3,QuestionType,CourseID,StaffID)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

            $sql->bind_param("ssssssssssssss",$unit,$topic,$file,$question,$opA,$opB,$opC,$opD,$correct,$correct2,$correct3,$QuestionType,$CourseID,$StaffID);
            $sql->execute();
            $sql->close();
            $conn->close();
        }

    public function GetQuizDetails(){
        $GetQuizsDetails=array();

        $servername = "localhost";
        $username = "root";
        $password = "";
        $port="3308";
        $db = "klu";
        $conn = mysqli_connect($servername, $username, $password,$db,$port);
        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM Quiz";
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

        $servername = "localhost";
        $username = "root";
        $password = "";
        $port="3308";
        $db = "klu";
        $conn = mysqli_connect($servername, $username, $password,$db,$port);
        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
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

        $servername = "localhost";
        $username = "root";
        $password = "";
        $port="3308";
        $db = "klu";
        $conn = mysqli_connect($servername, $username, $password,$db,$port);
        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
       $vari =$_SESSION['CourseID'];
       $vari="$vari";
       //echo($vari);
        $sql = "SELECT * FROM quiz INNER JOIN topic on quiz.Topic=topic.topic WHERE quiz.CourseID = '{$vari}'";
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
    
            $servername = "localhost";
            $username = "root";
            $password = "";
            $port="3308";
            $db = "klu";
            $conn = mysqli_connect($servername, $username, $password,$db,$port);
            // Check connection
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }
           $vari =$_SESSION['QID'];
           $vari="$vari";
           //echo($vari);
            $sql = "DELETE FROM quiz WHERE Qid = '{$vari}'";
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
    
            $servername = "localhost";
            $username = "root";
            $password = "";
            $port="3308";
            $db = "klu";
            $conn = mysqli_connect($servername, $username, $password,$db,$port);
            // Check connection
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }
            $topic=$_POST['Topic'];
            $unit=$_POST['Unit'];
           $StartTime=strtotime($_POST['StartDate']);
           $EndTime=strtotime($_POST['EndDate']);
           $StaffID=$_SESSION['StaffID'];
           $CourseID=$_SESSION['CourseID'];
           //echo($vari);
              $sql = "INSERT INTO topic ( topic,unit,QuestionType,CourseID,StaffID,StartTime,ExpiryTime)
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
    
            $servername = "localhost";
            $username = "root";
            $password = "";
            $port="3308";
            $db = "klu";
            $conn = mysqli_connect($servername, $username, $password,$db,$port);
            // Check connection
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }
            $vari =$_SESSION['CourseID'];
           $vari="$vari";
            $sql = "SELECT * FROM topic WHERE CourseID = '{$vari}' AND QuestionType = 'mcq' ";
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
