<?php
class StudentDetails{
    public function __construct()
    {
        include "db.php";
        // echo "Connected successfully";
    }
    public function PostData(){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $port="3308";
        $db = "klu";

        $conn = new mysqli($servername, $username, $password,$db,$port);
        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        // echo "Connected successfully";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $RegNo =$_POST['RegNo'];
            $Password =$_POST['password'];
            $Name=$_POST['name'];
            $Dept=$_POST['Dept'];
            $Email=$_POST['Email'];
            $PhoneNo=$_POST['PhoneNo'];
            $CourseID =$_POST['CourseID'];
        }

        $sql = $conn->prepare("INSERT INTO student(RegNo,Password,Name,Dept,Email,CourseID,PhoneNo)
         VALUES (?,?,?,?,?,?,?)");
        

        $sql->bind_param("sssssss",$RegNo,$Password,$Name,$Dept,$Email,$CourseID,$PhoneNo);
        $sql->execute();
        $sql->close();
        $conn->close();

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
        $arr = new StudentDetails;
        $RetriveStudentDetails=$arr->GetStudentDetails();
        foreach($RetriveStudentDetails as $file) {
            if(($_POST['RegNo']==$file['RegNo'])&&($_POST['password']==$file['Password'])){
                echo("Login Successful");
                $loc="./GetCourse.php";
                $newloc="Location: ".$loc;
                header($newloc);
                echo($newloc);
            }
        }
        
    }
}
$inst = new StudentDetails;
?>