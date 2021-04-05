<?php
class ResourceDetails{
    public function __construct()
    {
        include "db.php";
        // echo "Connected successfully";
    }
    public function PostData(){

        include "db.php";
        
    

       
         if ($_SERVER["REQUEST_METHOD"] == "POST") { 
             session_start();
             echo("Connection Successful");
             

             $unit=$_POST['unit'];
            //  $CourseID=$_POST['CourseID'];
            //  echo($CourseID);
             //echo($unit);
            echo( $_FILES['file']['name']);
            $file = $_FILES['file']['name'];
            $filesize = $_FILES['file']['size'];
            $filetype = $_FILES['file']['type'];
            $filetmp = $_FILES['file']['tmp_name'];
            
            $arra=$_SESSION['array'];
            $arrayCourseID= $arra[0]['CourseID'];
            if (!file_exists('./uploads/'.$arrayCourseID)) {
                mkdir('./uploads/'.$arrayCourseID);
                $files = 'uploads/'.$arrayCourseID.'/'.$_FILES['file']['name'];
                $move = move_uploaded_file($filetmp,$files);
            }
            else{
                $files = 'uploads/'.$arrayCourseID.'/'.$_FILES['file']['name'];
                $move = move_uploaded_file($filetmp,$files);
            }

            
            $arra=$_SESSION['array'];
            $link=$_POST['link'];
            $Extlink=$_POST['ExternalLink'];
            $topic=$_POST['Topic'];
            $arrayCourseID= $arra[0]['CourseID'];
            $query = "INSERT INTO resources(FilePath,VideoLink,Extlink,Unit,Topic,CourseID) values('$file','$link','$Extlink','$unit','$topic','$arrayCourseID')";
            
            //	mysqli_query($con,$query);
            if ($conn->query($query) === TRUE) {
                // echo "New record created successfully";
                 } else {
                 //echo "Error: " . $sql . "<br>" . $conn->error;
                 }$conn->close();
                }
            }



        

    public function GetResourceDetails(){
        $GetResource=array();
        include "db.php";
        $sql = "SELECT * FROM resources";
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
    public function DeleteRes()
    {
        session_start();
        $GetStudents=array();

        include "db.php";
       $vari =$_SESSION['RID'];
       $vari="$vari";
       //echo($vari);
        $sql = "DELETE FROM resources WHERE ResourceID = '{$vari}'";
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
    
}
// $inst = new ResourceDetails;
// var_dump($inst->GetResourceDetails());
?>
