<?php
$server = "localhost";
$user = "root";
$pass ="";
$database = "questions";
$con = mysqli_connect($server,$user,$pass,$database);
?>

<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div class ="container">
	<div class ="well text-center">KALASALINGAM ACADEMY OF RESEARCH AND EDUCATION</div>
</div>
</html>
<div class ="panel panel-default">
	<div class ="panel panel-heading">
		<h2>
			<a class ="btn btn-success" href="questions.php">Add Question for Assignment </a>
			<a class ="btn btn-info pull-right" href="#">Add Question for Quiz </a>
		</h2>


			<h2><div class = "well text-center"> Date: <?php echo date("Y-m-d"); ?> </div></h2>

		<div class="panel panel-body">
		<form action = "" method ="POST">
			<table class = "table table-striped">
				<tr>
				<th># ID</th><th>Register Number</th><th>Assignment Marks</th>
			</tr>
		<?php $res = mysqli_query($con,"SELECT user,SUM(marks) AS total FROM marks GROUP BY user");
		$id =0;
		$count=0;
		while($row =mysqli_fetch_array($res))
		{
			$id++;

		?>
		<tr>
		<td> <?php echo $id; ?> </td>
		<td> <?php echo $row ['user']; ?>
 </td>
		<td> <?php echo $row ['total']; ?>
			</td>
	</tr>
		<?php
		$count++;
		}
		?>
	</table>


</form>
	</div>
</div>
</div>
