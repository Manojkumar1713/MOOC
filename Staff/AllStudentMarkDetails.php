<?php 
 class  AllStudentMarkDetails{
    
    public function RetriveAllMarkDetails(){
        session_start();

        $GetCourseDetails=array();

        include "db.php";
        $vari =$_SESSION['CourseID'];
        $vari="$vari";
        $sql = "SELECT * FROM topic INNER JOIN quiz ON topic.topic=quiz.Topic INNER JOIN shortans ON topic.topic=shortans.Topic INNER JOIN truefalse ON topic.topic=truefalse.Topic INNER JOIN filetypequestion ON topic.topic=filetypequestion.Topic WHERE topic.CourseID = '{$vari}'";
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

}
?>