<?php
class RegisteredData{
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
            $CourseID =$_POST['CourseID'];
        }

        $sql = "INSERT INTO RegisteredCourse VALUES ( '$RegNo', '$CourseID')";
        

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}$conn->close();
    }
}
$inst = new RegisteredData;
?>