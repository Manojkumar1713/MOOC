<?php
class StaffDetails{
    public function __construct()
    {
        include "db.php";
        // echo "Connected successfully";
    }
    public function PostData(){

        include "db.php";
        // echo "Connected successfully";

         $CompilerRequired=false;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $StaffID =$_POST['StaffID'];
        $Name=$_POST['name'];
        $Password=$_POST['Password'];
        $Dept=$_POST['Dept'];
        $Email=$_POST['Email'];
        $PhoneNo=$_POST['PhoneNo'];

        }
        $sql =$conn->prepare("INSERT INTO staff (StaffID, Name, Password, Dept,Email,PhoneNo)
        VALUES (?,?,?,?,?,?)");
        

        $sql->bind_param("ssssss",$StaffID,$Name,$Password,$Dept,$Email,$PhoneNo);
        $sql->execute();
        $sql->close();
        $conn->close();
    }

    public function GetStaffDetails(){
        $GetStaffsDetails=array();

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
        $sql = "SELECT * FROM staff";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetStaffsDetails,$row);
            }
            
        return $GetStaffsDetails;
         } else {
            echo "Error retriving Data";
         }
         mysqli_close($conn);


    }
    public function StaffLogin(){
        session_start();
        $arr = new StaffDetails;
        $RetriveStaffDetails=$arr->GetStaffDetails();
        //var_dump($RetriveStaffDetails);
        foreach($RetriveStaffDetails as $file) {
            if(($_POST['StaffID']==$file['StaffID'])&&($_POST['Password']==$file['Password'])){
                echo("Login Successful");
                session_start();
                $_SESSION['StaffID'] = $_POST['StaffID'];
                $_SESSION['Name'] = $file['Name'];
                $loc="./StaffHomePage.php";
                $newloc="Location: ".$loc;
                header($newloc);
                echo($newloc);
                exit();
            }
            else{
                echo("<script> alert('Wrong Credentials');</script>");
                echo("<script>location.href = './index.php';</script>");
            }
        }
        
    }
    public function StaffSpecificCourse(){

        session_start();
 
        $GetStaffsDetails=array();
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
        $sql = "SELECT CourseID, Name, ExpiryDate FROM course where StaffID = '{$_SESSION['StaffID']}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetStaffsDetails,$row);
            }
            
         //var_dump($GetStaffsDetails);   
        return $GetStaffsDetails;
    }
}
}
$inst = new StaffDetails;
//var_dump($inst->GetStaffDetails());
?>
