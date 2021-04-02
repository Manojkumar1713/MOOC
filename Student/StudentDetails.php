<?php
class StudentDetails{
    public function __construct()
    {
        include "db.php";
        // echo "Connected successfully";
    }
    public function PostData(){

        include "db.php";
        // echo "Connected successfully";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $RegNo =$_POST['RegNo'];
            $Password =$_POST['password'];
            $CLG=$_POST['CLG'];
            $Name=$_POST['name'];
            $Dept=$_POST['Dept'];
            $Email=$_POST['Email'];
            $PhoneNo=$_POST['PhoneNo'];
            
        }

        $sql = "INSERT INTO student VALUES ( '$RegNo', '$Password','$Name','$CLG','$Dept', '$Email','$CourseID','$PhoneNo')";
      
        
        

            if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }$conn->close();
            
            

    }

    public function GetStudentDetails(){
        $GetStudentsDetails=array();

        include "db.php";
        $sql = "SELECT * FROM student";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetStudentsDetails,$row);
            }
            
        return $GetStudentsDetails;
         } else {
            echo "Error retriving Data";
         }
         mysqli_close($conn);


    }
    public function StudentLogin(){
        session_start();
        $arr = new StudentDetails;
        $RetriveStudentDetails=$arr->GetStudentDetails();
        foreach($RetriveStudentDetails as $file) {
            if(($_POST['RegNo']==$file['RegNo'])&&($_POST['password']==$file['Password'])){
                //echo($file['RegNo']);
                $_SESSION["SID"]=$file['RegNo'];
                $_SESSION["StudentName"]=$file['Name'];
                //var_dump($_SESSION["SID"]);
                $loc="./GetCourse.php";
                $newloc="Location: ".$loc;
                header($newloc);
                echo($newloc);
            }
            else{
                echo("<script> alert('Wrong Credentials');</script>");
                echo("<script>location.href = './index.php';</script>");
            }
        }
        
    }
}
$inst = new StudentDetails;
?>