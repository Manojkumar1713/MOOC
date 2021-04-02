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

        include "db.php";
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
        include "db.php";
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
public function GetAdminDetails(){
    $GetStaffsDetails=array();

    include "db.php";
    $sql = "SELECT * FROM administrator";
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
public function GetCourseDetails(){
    $GetStaffsDetails=array();

    include "db.php";
    $sql = "SELECT course.CourseID,course.Name,course.Dept,course.StaffID,course.Duration,course.ExpiryDate,staff.Name as staffName from course INNER JOIN staff ON course.StaffID=staff.StaffID";
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

public function AdminLogin(){
    session_start();
    $arr = new StaffDetails;
    $RetriveStaffDetails=$arr->GetAdminDetails();
    //var_dump($RetriveStaffDetails);
    foreach($RetriveStaffDetails as $file) {
        if(($_POST['ID']==$file['ID'])&&($_POST['Password']==$file['Password'])){
            echo("Login Successful");
            session_start();
            $_SESSION['ID'] = $_POST['ID'];
            $_SESSION['Name'] = $file['Name'];
            $loc="./CourseSpecificRedirect.php";
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
public function ChangePassword(){
    session_start();
    $GetStudents=array();

    include "db.php";
    $vari =$_SESSION['Password'];
    

 
$sql = "UPDATE administrator SET Password={$vari} WHERE ID='1'";
    
   if ($conn->query($sql) === TRUE) {
     echo "Record updated successfully";
   } else {
     echo "Error updating record: " . $conn->error;
   }
   
   $conn->close();
}
}
$inst = new StaffDetails;
//var_dump($inst->GetStaffDetails());
?>
