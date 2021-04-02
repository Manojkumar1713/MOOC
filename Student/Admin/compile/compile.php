<?php

session_start();
// if($_SESSION['register']=="")
// {
// 	echo "<script> location.href = '/login/login/index.php';</script>";
// }

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
?>

<!DOCTYPE html>
<html>
<head>


        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
				<link rel="icon" type="image/png" href="/login/login/images/icons/klu.png"/>
        <title>KARE</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>







</head>
<body>
<div class="main">
<div class="row">
<div class="col-sm-12">
<nav class="navbar navbar-inverse navbar-fixed-top nbar">
    <div class="navbar-header">
      <a class="navbar-brand lspace" href="/elearn/Assignment/index4.php">Kalasalingam university</a>
    </div>
    <ul class="nav navbar-nav">
    <!--  <li class="space"><a href="compiler.php"><i class="fa fa-code ispace"></i>Compiler</a></li>-->
      <!--<li class="space"><a href="archive.php"><i class="fa fa-archive ispace"></i>Problem Archive</a></li>
      <li class="space"><a href="contest.php"><i class="fa fa-cogs ispace"></i>Contests</a></li>
      <li class="space"><a href="debug.php"><i class="fa fa-check-square ispace"></i>Debug</a></li>-->


    </ul>

</nav>
</div>
</div>


<div class="row log">
<div class="col-sm-10">
<div class=""><h3 style="text-align:center;">Output</h3>
</div>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">

</div>

</div>




<div class="row cspace">
<div class="col-sm-1">
</div>
<div class="col-sm-8">






<?php
$CID=$_SESSION['CourseID'];
$RID=$_SESSION['SID'];
  $id=$_POST['labid'];  // need to be changed
	$code = $_POST['ans']; // need to be changed
	echo($id);
	echo($code);
	echo "<script> var ele = $code; ele.select(); document.execCommand('copy'); alert('Text copied'); </script>";
	$languageID=$_POST['language']; // need to be changed
	echo($languageID);
        error_reporting(0);
	if($_FILES["file"]["name"]!="")
	{
		include "compilers/make.php";
	}
	else
	{
		switch($languageID) 
			{
				case "c":
				{
					include("compilers/c.php");
					break;
				}
				case "cpp":
				{
					include("compilers/cpp.php");
					break;
				}
				case "Java":
				{
					include("compilers/java.php");
					break;
				}
				case "python":
				{
					include("compilers/python32.php");
					break;
				}
			}
	}
?>

</div>

<div class="col-sm-3">

</div>
</div>
</div>
</div><br><br><br>
<?php
// $user1 = $_SESSION['register'];  // need to be changed
$sql="INSERT INTO studentlabresponse (CourseID,RegNo,id,Ans)
VALUES ('$CID','$RID','$id','$marks');";
echo($marks);
echo($sql);
if ($conn->query($sql) === TRUE) {
	//echo "New record created successfully";
	} else {
	//echo "Error: " . $sql . "<br>" . $conn->error;
	}$conn->close();
 ?>

<div class="area">
<div class="well foot">
<div class="row area">
<div class="col-sm-3">
</div>




<div class="col-sm-4">

</div>
</div>
</div>
</div>



</body>
</html>
