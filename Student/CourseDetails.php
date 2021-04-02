<?php
class CourseDetails{
    public function __construct()
    {
        include "db.php";
        // echo "Connected successfully";
    }
    public function PostData(){

        include "db.php";
        // echo "Connected successfully";
        session_start();
         $CompilerRequired=0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $CourseID =$_POST['CourseID'];
        $Name=$_POST['name'];
        $Dept=$_POST['Dept'];
        $StaffID=$_SESSION['StaffID'];
        $Duration=$_POST['Duration'];
        $ExpiryDate=$_POST['ExpiryDate'];
       
        if($_POST['CompilerReq']=='Yes')
        {
            $CompilerRequired=true;
        }
        else{
            $CompilerRequired=0;
        }
        //echo($CompilerRequired);
        }

        $sql = "INSERT INTO course (CourseID, Name, Dept,StaffID,Duration,ExpiryDate,CompilerRequired)
            VALUES ( '$CourseID','$Name','$Dept','$StaffID','$Duration','$ExpiryDate','$CompilerRequired')";

            if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }$conn->close();
        }

    public function GetCourseDetails(){
        $GetCourseDetails=array();

        include "db.php";
        $sql = "SELECT * FROM course";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetCourseDetails,$row);
            }
        return $GetCourseDetails;
         } else {
            echo "Error retriving Data";
         }
         
         mysqli_close($conn);


    }
    public function GetSpecificCourse(){
        //session_start();
        $GetSpecificCourseDetails=array();

        include "db.php";
       $vari =$_SESSION['CourseID'];
       $vari="$vari";
       //echo($vari);
        $sql = "SELECT * FROM course WHERE CourseID = '{$vari}'";
        //echo($sql);
        $result = mysqli_query($conn, $sql);
        //var_dump($result);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetSpecificCourseDetails,$row);
            }
        return $GetSpecificCourseDetails;
         } else {
            echo "Error retriving Data";
         }
         
         mysqli_close($conn);
    }
        
        public function DeleteCourse()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
           $vari =$_SESSION['CourseID'];
           $vari="$vari";
           //echo($vari);
            $sql = "DELETE FROM course WHERE CourseID = '{$vari}'";
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
        public function RetriveMark()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
           //echo($vari);
            $sql = "SELECT * FROM studentMark INNER JOIN topic on studentmark.CourseID=topic.CourseID;";
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
                echo "No Data Found";
             }
             
             mysqli_close($conn);
        }
        public function RetriveAllCourse()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
           $vari= $_SESSION["SID"];
           $vari="$vari";
           //echo($vari);
            $sql = "SELECT * FROM course INNER JOIN registeredcourse on course.CourseID=registeredcourse.CourseID WHERE registeredcourse.RegNo = '{$vari}'";
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
                echo "No Data Found";
             }
             
             mysqli_close($conn);
        }
        public function UnRegCourse()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
           $vari= $_SESSION["SID"];
           $vari="$vari";
           //echo($vari);
            $sql = "SELECT * FROM course WHERE course.CourseID NOT IN (SELECT registeredcourse.CourseID FROM registeredcourse WHERE registeredcourse.RegNo='{$vari}')";
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
                echo "No Data Found";
             }
             
             mysqli_close($conn);
        }
        public function RegisterCourse(){
            include "db.php";
        // echo "Connected successfully";
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $CourseID =$_SESSION['CourseID'];
        $RegID=$_SESSION["SID"];
       
        //echo($CompilerRequired);
        }

        $sql = "INSERT INTO registeredcourse (CourseID,RegNo)
            VALUES ('$CourseID','$RegID')";

            if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }$conn->close();
        }
        
    
        // public function RetriveUnregisterdCourse()
        // {
        //     session_start();
        //     $GetStudents=array();
    
        //     $servername = "localhost";
        //     $username = "root";
        //     $password = "";
        //     $port="3308";
        //     $db = "klu";
        //     $conn = mysqli_connect($servername, $username, $password,$db,$port);
        //     // Check connection
        //     if (!$conn) {
        //     die("Connection failed: " . mysqli_connect_error());
        //     }
        //    //echo($vari);
        //     // $sql = "SELECT course.* from course LEFT JOIN registeredcourse on registeredcourse.CourseID=course.CourseID WHERE registeredcourse.CourseID IS NULL;";

        //     //echo($sql);
        //     $result = mysqli_query($conn, $sql);
        //     //var_dump($result);
        //     if (mysqli_num_rows($result) > 0) 
        //     {
        //         while($row = mysqli_fetch_assoc($result)) {
        //            array_push($GetStudents,$row);
        //         }
        //     return $GetStudents;
        //      } else {
        //         echo "No Data Found";
        //      }
             
        //      mysqli_close($conn);
        // }

        public function Restrive(){
            //session_start();
            $GetSpecificCourseDetails=array();
    
            include "db.php";
           //echo($vari);
           $sql = "SELECT * FROM Staff";
            //echo($sql);
            $result = mysqli_query($conn, $sql);
            //var_dump($result);
            if (mysqli_num_rows($result) > 0) 
            {
                while($row = mysqli_fetch_assoc($result)) {
                   array_push($GetSpecificCourseDetails,$row);
                }
            return $GetSpecificCourseDetails;
             } else {
                echo "Error retriving Data";
             }
             
             mysqli_close($conn);
        }
        
        public function RetriveQuiz(){
            //session_start();
            $GetSpecificCourseDetails=array();
    
            include "db.php";
           $vari =$_SESSION['CourseID'];
           $vari="$vari";
           //echo($vari);
            $sql = "SELECT * FROM topic INNER JOIN quiz on topic.CourseID=quiz.CourseID and topic.topic=quiz.Topic WHERE quiz.CourseID= '{$vari}' ORDER BY quiz.Topic,quiz.unit";
            //echo($sql);
            $result = mysqli_query($conn, $sql);
            //var_dump($result);
            if (mysqli_num_rows($result) > 0) 
            {
                while($row = mysqli_fetch_assoc($result)) {
                   array_push($GetSpecificCourseDetails,$row);
                }
            return $GetSpecificCourseDetails;
             } else {
                echo "Error retriving Data";
             }
             
             mysqli_close($conn);
        }
        public function retriveTrueFalse(){
            //session_start();
            $GetSpecificCourseDetails=array();
    
            include "db.php";
           $vari =$_SESSION['CourseID'];
           $vari="$vari";
           //echo($vari);
           $sql = "SELECT * FROM topic INNER JOIN truefalse on topic.CourseID=truefalse.CourseID and topic.topic=truefalse.Topic WHERE truefalse.CourseID= '{$vari}' ORDER BY truefalse.Topic,truefalse.unit";
            //echo($sql);
            $result = mysqli_query($conn, $sql);
            //var_dump($result);
            if (mysqli_num_rows($result) > 0) 
            {
                while($row = mysqli_fetch_assoc($result)) {
                   array_push($GetSpecificCourseDetails,$row);
                }
            return $GetSpecificCourseDetails;
             } else {
                echo "Error retriving Data";
             }
             
             mysqli_close($conn);
        }
            
        public function retriveShortAns(){
            //session_start();
            $GetSpecificCourseDetails=array();
    
            include "db.php";
           $vari =$_SESSION['CourseID'];
           $vari="$vari";
           //echo($vari);
            $sql = "SELECT * FROM shortans INNER JOIN topic ON shortans.CourseID = topic.CourseID and topic.topic=shortans.Topic WHERE shortans.CourseID = '{$vari}' ORDER BY shortans.Topic,shortans.unit";
            //echo($sql);
            $result = mysqli_query($conn, $sql);
            //var_dump($result);
            if (mysqli_num_rows($result) > 0) 
            {
                while($row = mysqli_fetch_assoc($result)) {
                   array_push($GetSpecificCourseDetails,$row);
                }
            return $GetSpecificCourseDetails;
             } else {
                echo "Error retriving Data";
             }
             
             mysqli_close($conn);
        }
             
        public function retriveFiletype(){
            //session_start();
            $GetSpecificCourseDetails=array();
    
            include "db.php";
           $vari =$_SESSION['CourseID'];
           $vari="$vari";
           //echo($vari);
            $sql = "SELECT * FROM filetypequestion INNER JOIN assigntopic ON filetypequestion.CourseID = assigntopic.CourseID and assigntopic.topic=filetypequestion.Topic WHERE filetypequestion.CourseID = '{$vari}' ORDER BY filetypequestion.Topic,filetypequestion.unit";
            //echo($sql);
            $result = mysqli_query($conn, $sql);
            //var_dump($result);
            if (mysqli_num_rows($result) > 0) 
            {
                while($row = mysqli_fetch_assoc($result)) {
                   array_push($GetSpecificCourseDetails,$row);
                }
            return $GetSpecificCourseDetails;
             } else {
                echo "Error retriving Data";
             }
             
             mysqli_close($conn);
        }

        public function AssignRetriveQuiz(){
            //session_start();
            $GetSpecificCourseDetails=array();
    
            include "db.php";
           $vari =$_SESSION['CourseID'];
           $vari="$vari";
           //echo($vari);
           $sql = "SELECT * FROM assigntopic INNER JOIN assignmentquiz on assigntopic.CourseID=assignmentquiz.CourseID and assigntopic.topic=assignmentquiz.Topic Where assignmentquiz.CourseID= '{$vari}' ORDER BY assignmentquiz.Topic";
            //echo($sql);
            $result = mysqli_query($conn, $sql);
            //var_dump($result);
            if (mysqli_num_rows($result) > 0) 
            {
                while($row = mysqli_fetch_assoc($result)) {
                   array_push($GetSpecificCourseDetails,$row);
                }
            return $GetSpecificCourseDetails;
             } else {
                echo "Error retriving Data";
             }
             
             mysqli_close($conn);
        }
        public function AssignretriveTrueFalse(){
            //session_start();
            $GetSpecificCourseDetails=array();
    
            include "db.php";
           $vari =$_SESSION['CourseID'];
           $vari="$vari";
           //echo($vari);
            $sql = "SELECT * FROM assigntopic INNER JOIN assignmenttruefalse on assigntopic.CourseID=assignmenttruefalse.CourseID and assigntopic.topic=assignmenttruefalse.Topic WHERE assignmenttruefalse.CourseID= '{$vari}' ORDER BY assignmenttruefalse.Topic";
            //echo($sql);
            $result = mysqli_query($conn, $sql);
            //var_dump($result);
            if (mysqli_num_rows($result) > 0) 
            {
                while($row = mysqli_fetch_assoc($result)) {
                   array_push($GetSpecificCourseDetails,$row);
                }
            return $GetSpecificCourseDetails;
             } else {
                echo "Error retriving Data";
             }
             
             mysqli_close($conn);
        }
            
        public function AssignretriveShortAns(){
            //session_start();
            $GetSpecificCourseDetails=array();
    
            include "db.php";
           $vari =$_SESSION['CourseID'];
           $vari="$vari";
           //echo($vari);
            $sql = "SELECT * FROM assignmentshortans INNER JOIN assigntopic ON assignmentshortans.CourseID = assigntopic.CourseID and assigntopic.topic=assignmentshortans.Topic WHERE assignmentshortans.CourseID = '{$vari}' ORDER BY assignmentshortans.Topic";
            //echo($sql);
            $result = mysqli_query($conn, $sql);
            //var_dump($result);
            if (mysqli_num_rows($result) > 0) 
            {
                while($row = mysqli_fetch_assoc($result)) {
                   array_push($GetSpecificCourseDetails,$row);
                }
            return $GetSpecificCourseDetails;
             } else {
                echo "Error retriving Data";
             }
             
             mysqli_close($conn);
        }
             
        public function AssignretriveFiletype(){
            //session_start();
            $GetSpecificCourseDetails=array();
    
            include "db.php";
           $vari =$_SESSION['CourseID'];
           $vari="$vari";
           //echo($vari);
            $sql = "SELECT * FROM assignmentfiletypequestion INNER JOIN assigntopic ON assignmentfiletypequestion.CourseID = assigntopic.CourseID and assigntopic.topic=assignmentfiletypequestion.Topic WHERE assignmentfiletypequestion.CourseID = '{$vari}' ORDER BY assignmentfiletypequestion.Topic";
            //echo($sql);
            $result = mysqli_query($conn, $sql);
            //var_dump($result);
            if (mysqli_num_rows($result) > 0) 
            {
                while($row = mysqli_fetch_assoc($result)) {
                   array_push($GetSpecificCourseDetails,$row);
                }
            return $GetSpecificCourseDetails;
             } else {
                echo "Error retriving Data";
             }
             
             mysqli_close($conn);
        }
    
        public function InsertMCQ()
        {
            include "db.php";
        // echo "Connected successfully";
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
        $CourseID=$_SESSION['CourseID'];
        $RegNo=$_SESSION["SID"];
        $qid=$_SESSION['SMQid'];
        $unit=$_SESSION['SMUnit'];
        $topic=$_SESSION['SMTopic'];
        $qname=$_SESSION['SMQname'];
        $ans=$_SESSION['SMAns'];
        $Mark=$_SESSION['SMMark'];
        }
        
        $sql = "INSERT INTO studentquizans (CourseID,RegNo,unit,topic,ques,Ans,Mark,Qid)
            VALUES ('$CourseID','$RegNo','$unit','$topic','$qname','$ans','$Mark','$qid')";
        echo($sql);
            if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }$conn->close();

        }
        public function InsertMultiMCQ()
        {
            include "db.php";
        // echo "Connected successfully";
        session_start();
        $ans=array();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
        $CourseID=$_SESSION['CourseID'];
        $RegNo=$_SESSION["SID"];
        $qid=$_SESSION['SMQid'];
        $unit=$_SESSION['SMUnit'];
        $topic=$_SESSION['SMTopic'];
        $Mark=$_SESSION['SMMark'];
        $qname=$_SESSION['SMQname'];
        // var_dump($_SESSION['SMAns']);
        // }
        
        
        for($i=0;$i<count($_SESSION['SMAns']);$i++){
            $ans[$i]=$_SESSION['SMAns'][$i];
        }
    }
        $ans1=null;
        $ans2=null;
        $ans3=null;
        if($ans[0]!=null){
            $ans1=$ans[0];    
        }
        if($ans[1]!=null){
            $ans2=$ans[1];   
        }
        if($ans[2]!=null){
            $ans3=$ans[2];
        }
        else{
            $ans3=null;
        }
    //var_dump($newarr);
    

        $sql = "INSERT INTO studentquizans (CourseID,RegNo,unit,topic,ques,Ans,Ans2,Ans3,Mark,Qid)
            VALUES ('$CourseID','$RegNo','$unit','$topic','$qname','$ans1','$ans2','$ans3','$Mark','$qid')";

            if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }$conn->close();

        }

        public function InsertTrueFalse()
        {
            include "db.php";
        // echo "Connected successfully";
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
        $CourseID=$_SESSION['CourseID'];
        $RegNo=$_SESSION["SID"];
        $qid=$_SESSION['SMid'];
        $unit=$_SESSION['SMUnit'];
        $topic=$_SESSION['SMTopic'];
        $qname=$_SESSION['SMQname'];
        $ans=$_SESSION['SMAns'];
        $Mark=$_SESSION['SMMark'];
        }

        $sql = "INSERT INTO studenttruefalse (CourseID,RegNo,unit,topic,ques,Ans,Mark,id)
            VALUES ('$CourseID','$RegNo','$unit','$topic','$qname','$ans','$Mark','$qid')";

            if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }$conn->close();

        }

        public function InsertShortAns()
        {
            include "db.php";
        // echo "Connected successfully";
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
        $CourseID=$_SESSION['CourseID'];
        $RegNo=$_SESSION["SID"];
        $qid=$_SESSION['SMid'];
        $unit=$_SESSION['SMUnit'];
        $topic=$_SESSION['SMTopic'];
        $qname=$_SESSION['SMQname'];
        $ans=$_SESSION['SMAns'];
        
       
        }

        $sql = "INSERT INTO studentshortans(CourseID,RegNo,unit,topic,ques,Ans,id)
            VALUES ('$CourseID','$RegNo','$unit','$topic','$qname','$ans','$qid')";

            if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }$conn->close();

        }

        public function InsertAssignMCQ()
        {
            include "db.php";
        // echo "Connected successfully";
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
        $CourseID=$_SESSION['CourseID'];
        $RegNo=$_SESSION["SID"];
        $qid=$_SESSION['SMQid'];
        $topic=$_SESSION['SMTopic'];
        $qname=$_SESSION['SMQname'];
        $ans=$_SESSION['SMAns'];
        $Mark=$_SESSION['SMMark'];
        }

        $sql = "INSERT INTO assignstudentquizans (CourseID,RegNo,topic,ques,Ans,Mark,Qid)
            VALUES ('$CourseID','$RegNo','$topic','$qname','$ans','$Mark','$qid')";

            if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }$conn->close();

        }
        public function InsertAssignMultiMCQ()
        {
            include "db.php";
        // echo "Connected successfully";
        session_start();
        $ans=array();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
        $CourseID=$_SESSION['CourseID'];
        $RegNo=$_SESSION["SID"];
        $qid=$_SESSION['SMQid'];
        $topic=$_SESSION['SMTopic'];
        $Mark=$_SESSION['SMMark'];
        $qname=$_SESSION['SMQname'];
        // var_dump($_SESSION['SMAns']);
        // }
        
        
        for($i=0;$i<count($_SESSION['SMAns']);$i++){
            $ans[$i]=$_SESSION['SMAns'][$i];
        }
    }
        $ans1=null;
        $ans2=null;
        $ans3=null;
        if($ans[0]!=null){
            $ans1=$ans[0];    
        }
        if($ans[1]!=null){
            $ans2=$ans[1];   
        }
        if($ans[2]!=null){
            $ans3=$ans[2];
        }
        else{
            $ans3=null;
        }
    //var_dump($newarr);
    

        $sql = "INSERT INTO assignstudentquizans (CourseID,RegNo,topic,ques,Ans,Ans2,Ans3,Mark,Qid)
            VALUES ('$CourseID','$RegNo','$topic','$qname','$ans1','$ans2','$ans3','$Mark','$qid')";

            if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }$conn->close();

        }

        public function AssignInsertTrueFalse()
        {
        include "db.php";
        // echo "Connected successfully";
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
        $CourseID=$_SESSION['CourseID'];
        $RegNo=$_SESSION["SID"];
        $qid=$_SESSION['SMid'];
        $topic=$_SESSION['SMTopic'];
        $qname=$_SESSION['SMQname'];
        $ans=$_SESSION['SMAns'];
        $Mark=$_SESSION['SMMark'];
        }

        $sql = "INSERT INTO assignstudenttruefalse (CourseID,RegNo,topic,ques,Ans,Mark,id)
            VALUES ('$CourseID','$RegNo','$topic','$qname','$ans','$Mark','$qid')";

            if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }$conn->close();

        }

        public function AssignInsertShortAns()
        {
        include "db.php";
        // echo "Connected successfully";
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
        $CourseID=$_SESSION['CourseID'];
        $RegNo=$_SESSION["SID"];
        $qid=$_SESSION['SMid'];
        $topic=$_SESSION['SMTopic'];
       
        $qname=$_SESSION['SMQname'];
        $ans=$_SESSION['SMAns'];
      
       
        }

        $sql = "INSERT INTO assignstudentshortans(CourseID,RegNo,Topic,ques,Ans,id)
            VALUES ('$CourseID','$RegNo','$topic','$qname','$ans','$qid')";

            if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }$conn->close();

        }
        public function RetriveStudentQuizMark()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
           $vari="$vari";
           $vari2 =$_SESSION['SID'];
           $vari2="$vari2";
           //echo($vari);
            $sql = "SELECT * FROM studentquizans  WHERE CourseID = '{$vari}' AND RegNo='{$vari2}';";
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
                echo "No Data Found";
             }
             
             mysqli_close($conn);
        }
        public function RetriveStudentTrueFalseMark()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
           $vari="$vari";
           $vari2 =$_SESSION['SID'];
           $vari2="$vari2";
           //echo($vari);
            $sql = "SELECT * FROM studenttruefalse WHERE CourseID = '{$vari}' AND RegNo='{$vari2}';";
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
                echo "No Data Found";
             }
             
             mysqli_close($conn);
        }
        public function RetriveStudentShortAnsMark()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
           $vari="$vari";
           $vari2 =$_SESSION['SID'];
           $vari2="$vari2";
           //echo($vari);
            $sql = "SELECT * FROM studentshortans  WHERE CourseID = '{$vari}' AND RegNo='{$vari2}';";
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
                echo "No Data Found";
             }
             
             mysqli_close($conn);
        }
        public function RetriveFileTypeAnsMark()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
           $vari="$vari";
           $vari2 =$_SESSION['SID'];
           $vari2="$vari2";
           //echo($vari);
            $sql = "SELECT * FROM studentfiletypeans WHERE CourseID = '{$vari}' AND RegNo='{$vari2}';";
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
                echo "No Data Found";
             }
             
             mysqli_close($conn);
        }


        public function RetriveAssignStudentQuizMark()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
           $vari="$vari";
           $vari2 =$_SESSION['SID'];
           $vari2="$vari2";
           //echo($vari);
            $sql = "SELECT * FROM assignstudentquizans  WHERE CourseID = '{$vari}' AND RegNo='{$vari2}';";
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
                echo "No Data Found";
             }
             
             mysqli_close($conn);
        }
        public function RetriveAssignStudentTrueFalseMark()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
           $vari="$vari";
           $vari2 =$_SESSION['SID'];
           $vari2="$vari2";
           //echo($vari);
            $sql = "SELECT * FROM assignstudenttruefalse WHERE CourseID = '{$vari}' AND RegNo='{$vari2}';";
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
                echo "No Data Found";
             }
             
             mysqli_close($conn);
        }
        public function RetriveAssignStudentShortAnsMark()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
           $vari="$vari";
           $vari2 =$_SESSION['SID'];
           $vari2="$vari2";
           //echo($vari);
            $sql = "SELECT * FROM assignstudentshortans  WHERE CourseID = '{$vari}' AND RegNo='{$vari2}';";
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
                echo "No Data Found";
             }
             
             mysqli_close($conn);
        }
        public function InsertFileType()
        {
        include "db.php";
        // echo "Connected successfully";
        session_start(); 
        // $ans=$_SESSION['SMAns'];
        // var_dump($ans);
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            //$unit=$_POST['unit'];
            //  $CourseID=$_POST['CourseID'];
            //  echo($CourseID);
             //echo($unit);
            $CourseID=$_SESSION['CourseID'];
             $Res=$_SESSION['RTest'];
             $unit =$_SESSION['SMUnit'];
            $RegNo=$_SESSION["SID"];
            $qid=$_SESSION['SMid'];
            $topic=$_SESSION['SMTopic'];
            $qname=$_SESSION['SMQname'];
       
           // echo($file);
            //$arra=$_SESSION['array'];
            $vari =$_SESSION['CourseID'];
           $vari="$vari";
           $vari2 =$_SESSION['SID'];
           $vari2="$vari2";
        
            // var_dump($Res);
            // echo($qname);
            
                $query = "INSERT INTO studentfiletypeans(CourseID,RegNo,topic,unit,ques,Ans,id) values('$CourseID','$RegNo','$topic','$unit','$qname','$Res','$qid')";  
                //var_dump($query);
            
            // $query = "INSERT INTO studentfiletypeans(CourseID,RegNo,topic,unit,ques,Ans,id) values('$CourseID','$RegNo','$topic','$unit','$qname','$file','$qid')";
            

            if ($conn->query($query) === TRUE) {
            //echo "New record created successfully";
            } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }$conn->close();

            }
       
    }

    public function RetriveAssignFileTypeAnsMark()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
           $vari="$vari";
           $vari2 =$_SESSION['SID'];
           $vari2="$vari2";
           //echo($vari);
            $sql = "SELECT * FROM assignmentfiletypequestion WHERE CourseID = '{$vari}' AND RegNo='{$vari2}';";
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
                echo "No Data Found";
             }
             
             mysqli_close($conn);
        }

        public function InsertAssignFileType()
        {
        include "db.php";
        // echo "Connected successfully";
        session_start(); 
        // $ans=$_SESSION['SMAns'];
        // var_dump($ans);
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            //$unit=$_POST['unit'];
            //  $CourseID=$_POST['CourseID'];
            //  echo($CourseID);
             //echo($unit);
            $CourseID=$_SESSION['CourseID'];
             $Res=$_SESSION['RTest'];
            $RegNo=$_SESSION["SID"];
            $qid=$_SESSION['SMid'];
            $topic=$_SESSION['SMTopic'];
            $qname=$_SESSION['SMQname'];
       
           // echo($file);
            //$arra=$_SESSION['array'];
            $vari =$_SESSION['CourseID'];
           $vari="$vari";
           $vari2 =$_SESSION['SID'];
           $vari2="$vari2";
        
            // var_dump($Res);
            // echo($qname);
            
                $query = "INSERT INTO assignstudentfiletypeans(CourseID,RegNo,topic,ques,Ans,id) values('$CourseID','$RegNo','$topic','$qname','$Res','$qid')";  
                //var_dump($query);
            
            // $query = "INSERT INTO studentfiletypeans(CourseID,RegNo,topic,unit,ques,Ans,id) values('$CourseID','$RegNo','$topic','$unit','$qname','$file','$qid')";
            

            if ($conn->query($query) === TRUE) {
            //echo "New record created successfully";
            } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }$conn->close();

            }
       
    }
    public function GetLabAssignmentQuestions(){
        $GetCourseDetails=array();

        include "db.php";
        $sql = "SELECT * FROM question";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetCourseDetails,$row);
            }
        return $GetCourseDetails;
         } else {
            echo "Error retriving Data";
         }
         
         mysqli_close($conn);


    }
    public function LabResponseFromStudent(){
        session_start();

        include "db.php";
        // echo "Connected successfully";
         $CompilerRequired=0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //$CourseID =$_SESSION['CourseID'];
        $ID=$_SESSION['id'];
        //$Ques=$_POST['ques'];
        $Answ=$_SESSION["Ans"];

        }
        echo($ID);
       
        echo("<br>");
        echo($Answ);


        // $sql=$conn->prepare("INSERT INTO studentlabresponse (id,Ans)
        //     VALUES ( ?,?)");
             $sql="INSERT INTO studentlabresponse (id,Ans)
             VALUES ('$ID','$Answ');";
             //echo($sql);
            
        // if($sql){
        //     echo($sql);
        // }
        // else{
        //     echo("No data");
        // }
        // $sql->bind_param("is",$ID,$Answ);
        // var_dump($sql);
        // $sql->execute();
        // $sql->close();
        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }$conn->close();


    }

    public function PracticeRetriveQuiz(){
        //session_start();
        $GetSpecificCourseDetails=array();

        include "db.php";
       $vari =$_SESSION['CourseID'];
       $vari="$vari";
       //echo($vari);
        $sql = "SELECT * FROM topic INNER JOIN practicequiz on topic.CourseID=practicequiz.CourseID and topic.topic=practicequiz.Topic WHERE practicequiz.CourseID= '{$vari}' ORDER BY practicequiz.Topic,practicequiz.unit";
        //echo($sql);
        $result = mysqli_query($conn, $sql);
        //var_dump($result);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetSpecificCourseDetails,$row);
            }
        return $GetSpecificCourseDetails;
         } else {
            echo "Error retriving Data";
         }
         
         mysqli_close($conn);
    }

    public function PracticeInsertMCQ()
    {
    include "db.php";
    // echo "Connected successfully";
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    $CourseID=$_SESSION['CourseID'];
    $RegNo=$_SESSION["SID"];
    $qid=$_SESSION['SMQid'];
    $unit=$_SESSION['SMUnit'];
    $topic=$_SESSION['SMTopic'];
    $qname=$_SESSION['SMQname'];
    $ans=$_SESSION['SMAns'];
    $Mark=$_SESSION['SMMark'];
    }
    
    $sql = "INSERT INTO practicestudentquizans (CourseID,RegNo,unit,topic,ques,Ans,Mark,Qid)
        VALUES ('$CourseID','$RegNo','$unit','$topic','$qname','$ans','$Mark','$qid')";
    echo($sql);
        if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        }$conn->close();

    }

    public function PracticeInsertMultiMCQ()
    {
    include "db.php";
    // echo "Connected successfully";
    session_start();
    $ans=array();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    $CourseID=$_SESSION['CourseID'];
    $RegNo=$_SESSION["SID"];
    $qid=$_SESSION['SMQid'];
    $unit=$_SESSION['SMUnit'];
    $topic=$_SESSION['SMTopic'];
    $Mark=$_SESSION['SMMark'];
    $qname=$_SESSION['SMQname'];
    // var_dump($_SESSION['SMAns']);
    // }
    
    
    for($i=0;$i<count($_SESSION['SMAns']);$i++){
        $ans[$i]=$_SESSION['SMAns'][$i];
    }
}
    $ans1=null;
    $ans2=null;
    $ans3=null;
    if($ans[0]!=null){
        $ans1=$ans[0];    
    }
    if($ans[1]!=null){
        $ans2=$ans[1];   
    }
    if($ans[2]!=null){
        $ans3=$ans[2];
    }
    else{
        $ans3=null;
    }
//var_dump($newarr);


    $sql = "INSERT INTO studentquizans (CourseID,RegNo,unit,topic,ques,Ans,Ans2,Ans3,Mark,Qid)
        VALUES ('$CourseID','$RegNo','$unit','$topic','$qname','$ans1','$ans2','$ans3','$Mark','$qid')";

        if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        }$conn->close();

    }

    public function PracticeretriveTrueFalse(){
        //session_start();
        $GetSpecificCourseDetails=array();

        include "db.php";
       $vari =$_SESSION['CourseID'];
       $vari="$vari";
       //echo($vari);
       $sql = "SELECT * FROM topic INNER JOIN practicetruefalse on topic.CourseID=practicetruefalse.CourseID and topic.topic=practicetruefalse.Topic WHERE practicetruefalse.CourseID= '{$vari}' ORDER BY practicetruefalse.Topic,practicetruefalse.unit";
        //echo($sql);
        $result = mysqli_query($conn, $sql);
        //var_dump($result);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetSpecificCourseDetails,$row);
            }
        return $GetSpecificCourseDetails;
         } else {
            echo "Error retriving Data";
         }
         
         mysqli_close($conn);
    }

    public function PracticeInsertTrueFalse()
        {
        include "db.php";
        // echo "Connected successfully";
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
        $CourseID=$_SESSION['CourseID'];
        $RegNo=$_SESSION["SID"];
        $qid=$_SESSION['SMid'];
        $unit=$_SESSION['SMUnit'];
        $topic=$_SESSION['SMTopic'];
        $qname=$_SESSION['SMQname'];
        $ans=$_SESSION['SMAns'];
        $Mark=$_SESSION['SMMark'];
        }

        $sql = "INSERT INTO practicestudenttruefalse (CourseID,RegNo,unit,topic,ques,Ans,Mark,id)
            VALUES ('$CourseID','$RegNo','$unit','$topic','$qname','$ans','$Mark','$qid')";

            if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }$conn->close();

        }
        public function GetAboutData(){
            session_start();
            $GetResource=array();
            include "db.php";
            $vari =$_SESSION['CourseID'];
            $vari="$vari";
            $sql = "SELECT * FROM about Where CourseID='{$vari}'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) 
            {
                while($row = mysqli_fetch_assoc($result)) {
                   array_push($GetResource,$row);
                }
            return $GetResource;
             } else {
                echo "Error retriving Data";
             }
             
             mysqli_close($conn);
    
        }

        public function UnAttendedQuizQues()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
           $vari= $_SESSION["SID"];
           $vari="$vari";
           $vari2= $_SESSION["CourseID"];
           $vari2="$vari2";
           //echo($vari);
            $sql = "SELECT * FROM topic INNER JOIN quiz on topic.CourseID=quiz.CourseID and topic.topic=quiz.Topic WHERE quiz.CourseID= '{$vari2}'AND quiz.Qid NOT IN (SELECT studentquizans.Qid FROM studentquizans WHERE studentquizans.CourseID='{$vari2}' AND studentquizans.RegNo='{$vari}') ORDER BY quiz.Topic,quiz.unit ";
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
                echo "No Data Found";
             }
             
             mysqli_close($conn);
        }
        public function UnAttendedTrueQues()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
           $vari= $_SESSION["SID"];
           $vari="$vari";
           $vari2= $_SESSION["CourseID"];
           $vari2="$vari2";
           //echo($vari);
            $sql = "SELECT * FROM topic INNER JOIN quiz on topic.CourseID=truefalse.CourseID and topic.topic=truefalse.Topic WHERE truefalse.CourseID= '{$vari2}'AND truefalse.Qid NOT IN (SELECT studentquizans.Qid FROM studenttruefalse WHERE studenttruefalse.CourseID='{$vari2}' AND studenttruefalse.RegNo='{$vari}') ORDER BY truefalse.Topic,truefalse.unit ";
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
                echo "No Data Found";
             }
             
             mysqli_close($conn);
        }
        public function UnAttendedShortQues()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
           $vari= $_SESSION["SID"];
           $vari="$vari";
           $vari2= $_SESSION["CourseID"];
           $vari2="$vari2";
           //echo($vari);
            $sql = "SELECT * FROM topic INNER JOIN quiz on topic.CourseID=shortans.CourseID and topic.topic=shortans.Topic WHERE shortans.CourseID= '{$vari2}'AND shortans.Qid NOT IN (SELECT studentshortans.Qid FROM studentshortans WHERE studentshortans.CourseID='{$vari2}' AND studentshortans.RegNo='{$vari}') ORDER BY shortans.Topic,shortans.unit ";
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
                echo "No Data Found";
             }
             
             mysqli_close($conn);
        }
        public function UnAttendedFileQues()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
           $vari= $_SESSION["SID"];
           $vari="$vari";
           $vari2= $_SESSION["CourseID"];
           $vari2="$vari2";
           //echo($vari);
            $sql = "SELECT * FROM assigntopic INNER JOIN filetypequestion on assigntopic.CourseID=filetypequestion.CourseID and assigntopic.topic=filetypequestion.Topic WHERE filetypequestion.CourseID= '{$vari2}'AND filetypequestion.id NOT IN (SELECT studentfiletypeans.id FROM studentfiletypeans WHERE studentfiletypeans.CourseID='{$vari2}' AND studentfiletypeans.RegNo='{$vari}') ORDER BY filetypequestion.Topic,filetypequestion.unit ";
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
                echo "No Data Found";
             }
             
             mysqli_close($conn);
        }
}

$inst = new CourseDetails;
// var_dump($inst->GetCourseDetails());
?>
