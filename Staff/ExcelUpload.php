<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload CSV for MCQ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/kare_icon.ico" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
</head>
<body>

<?php include('./header.html'); ?>

<?php
//session_start();
include "QuizDetails.php";
if(isset($_POST["submit"]))
{
    
    include "db.php";
            $QuestionType="mcq";
            $CourseID =$_SESSION['CourseID'];
            $StaffID=$_SESSION['StaffID'];
            $topic=$_POST['topicSel'];
            $file = $_FILES['file']['tmp_name'];
            $handle = fopen($file, "r");
            $c = 0;
        var_dump($handle);
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    {
          
          $unit=$filesop[0];
          $question=$filesop[2];
          $opA=$filesop[3];
          $opB=$filesop[4];
          $opC=$filesop[5];
          $opD=$filesop[6];
          $correct=$filesop[7];
          
          
          $sql=$conn->prepare("INSERT INTO quiz ( Unit,Topic,FilePath,Qname,opA,opB,opC,opD,correct,QuestionType,CourseID,StaffID)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
           $sql->bind_param("ssssssssssss",$unit,$topic,$file,$question,$opA,$opB,$opC,$opD,$correct,$QuestionType,$CourseID,$StaffID);
           $sql->execute();
           
           

         $c = $c + 1;
           }

            if($sql){
               echo "sucess";
             } 
		 else
		 {
            echo "Sorry! Unable to impo.";
          }
          $sql->close();
          $conn->close();

}
?>

<div class="container-fluid">

<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">IMPORT CSV FILES</h1>
</div>

<form enctype="multipart/form-data" method="post" role="form">

<div class="form-group">
<?php
    $butt = new QuizDetails;
$topicArr=$butt->GetTopicDetails();
?>
<label>Select Topic</label>
<select name="topicSel" class="form-control">

<?php
foreach($topicArr as $ta){
    ?>
    
    <option >
    <?php
    echo($ta['topic']);
    ?>
    </option>
    
<?php
}
?>
</select>
</div>
        <label for="exampleInputFile">Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Import CSV File Only</p>
 
    <button type="submit" class="btn btn-success" name="submit" value="submit">Upload</button>
</form>
   </div>
   
<?php include('./footer.html'); ?>

</body>
</html>