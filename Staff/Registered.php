<html>
<body>
<?php 
// $rootDir = basename(__DIR__);

include "RegisteredData.php";
if(isset($_POST['Submit'])) { 
    $buttonClick = new RegisteredData;
    $buttonClick->PostData();
} 
?>

<form action="" method="post">
Course ID: <input type="text" name="CourseID"><br>
RegNo: <input type="text" name="RegNo"><br>
<input type="submit" name ="Submit">
</form>

</body>
</html>