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

        $sql =$conn->prepare("INSERT INTO course (CourseID, Name, Dept,StaffID,Duration,ExpiryDate,CompilerRequired)
            VALUES (?,?,?,?,?,?,?)");

            $sql->bind_param("sssssss",$CourseID,$Name,$Dept,$StaffID,$Duration,$ExpiryDate,$CompilerRequired);
            $sql->execute();
            $sql->close();
            $conn->close();
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
        public function GetStudentDetails(){
            session_start();
            $GetStudents=array();
    
            include "db.php";
           $vari =$_SESSION['CourseID'];
           $vari="$vari";
           //echo($vari);
            $sql = "SELECT student.RegNo,student.Name,student.CLG,student.Dept,student.Email,student.PhoneNo FROM student INNER JOIN registeredcourse on student.RegNo=registeredcourse.RegNo WHERE registeredcourse.CourseID = '{$vari}' ORDER BY student.RegNo";
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
    
        public function RetriveStudentQuizMark()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
           $vari="$vari";
           //echo($vari);
            $sql = "SELECT * FROM studentquizans  WHERE CourseID = '{$vari}' ORDER BY unit ASC, topic;";
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
           //echo($vari);
            $sql = "SELECT * FROM studenttruefalse WHERE CourseID = '{$vari}'ORDER BY unit ASC, topic;";
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
           //echo($vari);
            $sql = "SELECT * FROM studentshortans  WHERE CourseID = '{$vari}' ORDER BY unit ASC, topic;";
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
            $sql = "SELECT * FROM studentfiletypeans WHERE CourseID = '{$vari}' ORDER BY unit ASC, topic;";
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
            $sql = "SELECT * FROM assignstudentquizans  WHERE CourseID = '{$vari}' ORDER BY topic;";
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
            $sql = "SELECT * FROM assignstudenttruefalse WHERE CourseID = '{$vari}' ORDER BY topic ;";
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
            $sql = "SELECT * FROM assignstudentshortans  WHERE CourseID = '{$vari}' ORDER BY topic ;";
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
            $sql = "SELECT * FROM assignstudentfiletypeans WHERE CourseID = '{$vari}' ORDER BY topic ;";
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
        public function assignMarkShortStudent(){
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['ID'];
            $vari2=$_SESSION['RecordID'];
         
        $sql = "UPDATE studentshortans SET Mark={$vari} WHERE studentMarkId={$vari2} ORDER BY topic";
            
           if ($conn->query($sql) === TRUE) {
             echo "Record updated successfully";
           } else {
             echo "Error updating record: " . $conn->error;
           }
           
           $conn->close();
        }
        public function assignMarkFileType(){
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['ID'];
            $vari2=$_SESSION['RecordID'];
         
        $sql = "UPDATE studentfiletypeans SET Mark={$vari} WHERE studentMarkId={$vari2}";
            
           if ($conn->query($sql) === TRUE) {
             echo "Record updated successfully";
           } else {
             echo "Error updating record: " . $conn->error;
           }
           
           $conn->close();
        }

        public function assignMarkShortStudentAM(){
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['ID'];
            $vari2=$_SESSION['RecordID'];
         
        $sql = "UPDATE assignstudentshortans SET Mark={$vari} WHERE studentMarkId={$vari2}";
            
           if ($conn->query($sql) === TRUE) {
             echo "Record updated successfully";
           } else {
             echo "Error updating record: " . $conn->error;
           }
           
           $conn->close();
        }

        public function assignMarkFileTypeAM(){
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['ID'];
            $vari2=$_SESSION['RecordID'];
         
        $sql = "UPDATE assignstudentfiletypeans SET Mark={$vari} WHERE studentMarkId={$vari2}";
            
           if ($conn->query($sql) === TRUE) {
             echo "Record updated successfully";
           } else {
             echo "Error updating record: " . $conn->error;
           }
           
           $conn->close();
        }
        public function RetriveTotalMarkForquiz(){
            $GetCourseDetails=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
            $vari="$vari";
            $sql = "SELECT studentquizans.RegNo,student.Name,sum(studentquizans.Mark) as Total_Mark FROM student INNER JOIN studentquizans on student.RegNo=studentquizans.RegNo WHERE studentquizans.CourseID='{$vari}' group by studentquizans.RegNo order by sum(studentquizans.Mark) DESC";
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
        public function RetriveTotalMarkForTrue(){
            $GetCourseDetails=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
            $vari="$vari";
            $sql = "SELECT studenttruefalse.RegNo,student.Name,sum(studenttruefalse.Mark) as Total_Mark FROM student INNER JOIN studenttruefalse on student.RegNo=studenttruefalse.RegNo WHERE studenttruefalse.CourseID='{$vari}' group by studenttruefalse.RegNo order by sum(studenttruefalse.Mark) DESC";
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
        public function RetriveTotalMarkForShort(){
            $GetCourseDetails=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
            $vari="$vari";
            $sql = "SELECT studentshortans.RegNo,student.Name,sum(studentshortans.Mark) as Total_Mark FROM student INNER JOIN studentshortans on student.RegNo=studentshortans.RegNo WHERE studentshortans.CourseID='{$vari}' group by studentshortans.RegNo order by sum(studentshortans.Mark) DESC";
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
        public function SummaryReport(){
            $GetCourseDetails=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
            $vari="$vari";
            $sql = "SELECT stu.RegNo,stu.CourseID,Name, SUM(stu.Mark) as total FROM (SELECT studentquizans.RegNo,studentquizans.Mark,studentquizans.CourseID FROM studentquizans UNION ALL SELECT studenttruefalse.RegNo,studenttruefalse.Mark,studenttruefalse.CourseID FROM studenttruefalse UNION ALL SELECT studentshortans.RegNo,studentshortans.Mark,studentshortans.CourseID FROM studentshortans) stu INNER JOIN student on stu.RegNo=student.RegNo WHERE stu.CourseID='{$vari}' GROUP BY stu.RegNo ORDER BY SUM(stu.Mark) DESC";
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
        public function AssignmentSummaryReport(){
            $GetCourseDetails=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
            $vari="$vari";
            $sql = "SELECT *,SUM(studentfiletypeans.Mark) as total FROM studentfiletypeans INNER JOIN student on studentfiletypeans.RegNo=student.RegNo WHERE studentfiletypeans.CourseID='{$vari}' GROUP BY studentfiletypeans.RegNo ORDER BY SUM(studentfiletypeans.Mark) DESC;";
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
        public function RetriveStudentTopicQuizMark()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
           $vari="$vari";
           //echo($vari);
            $sql = "SELECT studentquizans.RegNo,studentquizans.topic,student.Name ,sum(studentquizans.Mark) as total FROM studentquizans INNER JOIN student ON studentquizans.RegNo=student.RegNo WHERE studentquizans.CourseID='{$vari}' GROUP by studentquizans.RegNo,studentquizans.topic ORDER by sum(studentquizans.Mark) DESC, studentquizans.topic";
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
        public function RetriveStudentTopicTrueMark()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
           $vari="$vari";
           //echo($vari);
            $sql = "SELECT studenttruefalse.RegNo,studenttruefalse.topic,student.Name,sum(studenttruefalse.Mark) as total FROM studenttruefalse INNER JOIN student ON studenttruefalse.RegNo=student.RegNo WHERE studenttruefalse.CourseID='{$vari}' GROUP by studenttruefalse.RegNo,studenttruefalse.topic ORDER by sum(studenttruefalse.Mark) DESC, studenttruefalse.topic";
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
        public function RetriveStudentTopicShortMark()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
           $vari="$vari";
           //echo($vari);
            $sql = "SELECT studentshortans.RegNo,studentshortans.topic,student.Name,sum(studentshortans.Mark) as total FROM studentshortans INNER JOIN student ON studentshortans.RegNo=student.RegNo WHERE studentshortans.CourseID='{$vari}' GROUP by studentshortans.RegNo,studentshortans.topic ORDER by sum(studentshortans.Mark) DESC, studentshortans.topic";
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
        public function RetriveStudentTopicfileMark()
        {
            session_start();
            $GetStudents=array();
    
            include "db.php";
            $vari =$_SESSION['CourseID'];
           $vari="$vari";
           //echo($vari);
            $sql = "SELECT studentfiletypeans.RegNo,studentfiletypeans.topic,student.Name,sum(studentfiletypeans.Mark) as total FROM studentfiletypeans INNER JOIN student ON studentfiletypeans.RegNo=student.RegNo WHERE studentfiletypeans.CourseID='{$vari}' GROUP by studentfiletypeans.RegNo,studentfiletypeans.topic ORDER by sum(studentfiletypeans.Mark) DESC, studentfiletypeans.topic";
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
        public function TopicSummaryReport(){
         $GetCourseDetails=array();
 
         include "db.php";
         $vari =$_SESSION['CourseID'];
         $vari="$vari";
         $sql = "SELECT stu.RegNo,stu.topic,stu.CourseID,Name, SUM(stu.Mark) as total FROM (SELECT studentquizans.RegNo,studentquizans.topic,studentquizans.Mark,studentquizans.CourseID FROM studentquizans UNION ALL SELECT studenttruefalse.RegNo,studenttruefalse.topic,studenttruefalse.Mark,studenttruefalse.CourseID FROM studenttruefalse UNION ALL SELECT studentshortans.RegNo,studentshortans.Topic,studentshortans.Mark,studentshortans.CourseID FROM studentshortans) stu INNER JOIN student on stu.RegNo=student.RegNo WHERE stu.CourseID='{$vari}' GROUP BY stu.RegNo,stu.topic ORDER BY SUM(stu.Mark) DESC";
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
     public function AboutPostData(){
      session_start();

      include "db.php";
      // echo "Connected successfully";
       $CompilerRequired=0;
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $CourseID =$_SESSION['CourseID'];
      $ID=$_SESSION['StaffID'];
      $Ques=$_POST['ques'];
      $Name=$_SESSION["Name"];
      //echo( $_FILES['file1']['name']);
            $file = $_FILES['file1']['name'];
            $filesize = $_FILES['file1']['size'];
            $filetype = $_FILES['file1']['type'];
            $filetmp = $_FILES['file1']['tmp_name'];

            $file2 = $_FILES['file2']['name'];
            $filesize2 = $_FILES['file2']['size'];
            $filetype2 = $_FILES['file2']['type'];
            $filetmp2 = $_FILES['file2']['tmp_name'];
            
            //$arra=$_SESSION['array'];
            //$arrayCourseID= $arra[0]['CourseID'];
            if (!file_exists('./uploads/'.$CourseID)) {
                mkdir('./uploads/'.$CourseID);
                $files = 'uploads/'.$CourseID.'/'.$_FILES['file1']['name'];
                $move = move_uploaded_file($filetmp,$files);
                $files2 = 'uploads/'.$CourseID.'/'.$_FILES['file2']['name'];
                $move = move_uploaded_file($filetmp2,$files2);
            }
            else{
                $files = 'uploads/'.$CourseID.'/'.$_FILES['file1']['name'];
                $move = move_uploaded_file($filetmp,$files);
                $files2 = 'uploads/'.$CourseID.'/'.$_FILES['file2']['name'];
                $move = move_uploaded_file($filetmp2,$files2);
            }


      }

      $sql=$conn->prepare("INSERT INTO about (CourseID,StaffID,Ans,Link1,Link2)
          VALUES ( ?,?,?,?,?)");

      $sql->bind_param("sssss",$CourseID,$ID,$Ques,$file,$file2);
          // if ($conn->query($sql) === TRUE) {
          // echo "New record created successfully";
          // } else {
          // echo "Error: " . $sql . "<br>" . $conn->error;
          // }$conn->close();
      $sql->execute();
      $sql->close();
      $conn->close();
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
}
$inst = new CourseDetails;
// var_dump($inst->GetCourseDetails());
?>