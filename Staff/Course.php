<html>
<body>
<?php 
// $rootDir = basename(__DIR__);

// function SubmitData()
// {
include "CourseDetails.php";
if(isset($_POST['Submit'])) 
{ 
    $buttonClick = new CourseDetails;
    $buttonClick->PostData();
}
// } 
?>

<form action="" method="post">
Course ID: <input type="text" name="CourseID"><br>
Name: <input type="text" name="name"><br>
Dept: <input type="text" name="Dept"><br>
StaffID: <input type="text" name="StaffID"><br>
Duration: <input type="text" name="Duration"><br>
<label for="ExpiryDate">Expiry Date:</label>
<input type="datetime-local"  name="ExpiryDate"><br>
<label for="CompilerReq">Compiler Required</label><br>
<input type="radio"  name="CompilerReq" value="Yes">
<label for="CompilerReq">Yes</label><br>
<input type="radio"  name="CompilerReq" value="No" checked>
<label for="CompilerReq">No</label><br>
<input type="submit" name ="Submit">

<?php 
// $rootDir = basename(__DIR__);

// function SubmitData()
// {
if(isset($_POST['RestriveData'])) 
{ 
    $buttonClick = new CourseDetails;
    $buttonClick->GetCourseDetails();
}
// } 
?>
</form>

<form action="" method="post">
<input type="submit" name ="RestriveData" >
</form>
</body>
</html>