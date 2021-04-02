<?php
session_start();
$server = "localhost";
$user = "root";
$pass ="";
$database = "questions";
$con = mysqli_connect($server,$user,$pass,$database);
if($_SESSION['register']=="")
{
	echo "<script> location.href = '/login/login/index.php';</script>";
}

 ?>

 <!DOCTYPE html>
 <head>
   <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 <!-- Latest compiled JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title> Assignment </title>
</head>
<div class ="container">
	<div class ="well text-center"> TAKE ASSIGNMENT </div>
</div>
<div class ="panel panel-default">
	<div class ="panel panel-heading">

		<div class="panel panel-body">

			<table class = "table table-striped">
				<tr>
				<th># ID</th> <th> TITLE </th> <th> GO </th>
			</tr>
		<?php
		$res = mysqli_query($con,"select * from question");

		$id =0;

		while($row =mysqli_fetch_array($res))
		{
			$id++;

		?>
	<tr>
		<td> <?php echo $id ?> </td>
		<td> <?php echo $row ['title']; ?> </td>
		<td>
      <?php
        $x=$row['id'];

       ?>
		<a class="btn btn-success" href="compile/index.php?id=<?php echo "$x"; ?>&topic=<?php echo $row ['title']; ?>">SOLVE ASSIGNMENT</a>


	</tr>
		<?php

		}
		?>
	</table>



	</div>
</div>
</div>
