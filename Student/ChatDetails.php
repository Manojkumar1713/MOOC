<?php
class ChatDetails{
    public function __construct()
    {
        include "db.php";
        // echo "Connected successfully";
    }
    
    public function StaffPostData(){
        session_start();

        include "db.php";
        // echo "Connected successfully";
         $CompilerRequired=0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $CourseID =$_SESSION['CourseID'];
        $ID=$_SESSION['SID'];
        $Ques=$_POST['ques'];
        $Name=$_SESSION["StudentName"];

        }

        $sql=$conn->prepare("INSERT INTO chat (CourseID,ID,Name,ques)
            VALUES ( ?,?,?,?)");

        $sql->bind_param("ssss",$CourseID,$ID,$Name,$Ques);
        $sql->execute();
        $sql->close();
        $conn->close();
        }

    public function GetChatDetails(){
        $GetChatsDetails=array();

        include "db.php";
        $sql = "SELECT * FROM chat";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetChatsDetails,$row);
            }
        return $GetChatsDetails;
         } else {
            echo "Error retriving Data";
         }
         
         mysqli_close($conn);


    }
    public function StaffChatSpecific(){

        //session_start();
 
        $GetChatDetails=array();
        include "db.php";
        $sql = "SELECT * FROM chat where CourseID = '{$_SESSION['CourseID']}' ORDER BY date1 DESC";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetChatDetails,$row);
            }
            
         //var_dump($GetStaffsDetails);   
        return $GetChatDetails;
    }
}

public function AnnouncementPostData(){
    //session_start();

    include "db.php";
    // echo "Connected successfully";
     $CompilerRequired=0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CourseID =$_SESSION['CourseID'];
    $StaffID=$_SESSION['StaffID'];
    $Ans=$_POST['Ans'];
    }

    $sql=$conn->prepare("INSERT INTO staffannouncement (CourseID,StaffID,Ans)
        VALUES ( ?,?,?)");

    $sql->bind_param("sss",$CourseID,$StaffID,$Ans);
        // if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
        // } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        // }$conn->close();
    $sql->execute();
    $sql->close();
    $conn->close();
    }

    public function StaffAnnouncementSpecific(){

        //session_start();
 
        $GetChatDetails=array();
        include "db.php";
        $sql = "SELECT * FROM staffannouncement where CourseID = '{$_SESSION['CourseID']}' ORDER BY date1 DESC";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetChatDetails,$row);
            }
            
         //var_dump($GetStaffsDetails);   
        return $GetChatDetails;
    }
}
public function StaffPrivatePostData(){
    session_start();

    include "db.php";
    // echo "Connected successfully";
     $CompilerRequired=0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CourseID =$_SESSION['CourseID'];
    $ID=$_SESSION['SID'];
    $StaffID=$_SESSION['ChatStaffid'];

    $Ques=$_POST['ques'];
    $Name=$_SESSION["StudentName"];

    }

    $sql=$conn->prepare("INSERT INTO privatechat (CourseID,RegNo,Name,ques)
        VALUES ( ?,?,?,?)");

    $sql->bind_param("ssss",$CourseID,$ID,$Name,$Ques);
    $sql->execute();
    $sql->close();
    $conn->close();
    }

    public function StaffPrivateChatSpecific(){

        //session_start();
 
        $GetChatDetails=array();
        include "db.php";
        $StaffID=$_SESSION['ChatStaffid'];
        $ID=$_SESSION['SID'];
        $sql = "SELECT * FROM privatechat where CourseID = '{$_SESSION['CourseID']}' AND StaffID='{$StaffID}' AND RegNo='{$ID}'  ORDER BY date1 DESC";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($GetChatDetails,$row);
            }
            
         //var_dump($GetStaffsDetails);   
        return $GetChatDetails;
    }
}
}
$inst = new ChatDetails;
//var_dump($inst->GetChatDetails());
?>
