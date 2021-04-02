<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "questions";
$connection = mysqli_connect($server,$user,$password,$database);
if(isset($_GET['del']))
{
  $x=$_GET['del'];
  $sql = "delete from question where id =$x";
  $res = mysqli_query($connection,$sql);

}

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>

  <div class ="panel panel-default">
  	<div class ="panel panel-heading">
  		<div class="panel panel-body">
  		<form action = "control.php" method ="POST">
  			<table class = "table table-striped">
  				<tr>
  				<th>ID</th><th>TITLE</th><th>DELETE</th>
  			</tr>
  		<?php $sql="select * from question";

  		 $res = mysqli_query($connection,$sql);
  		$id =0;
  		$count=0;
  		while($row =mysqli_fetch_array($res))
  		{
  			$id++;

  		?>
  		<tr>
  		<td> <?php echo $id; ?> </td>
  		<td> <?php echo $row ['title']; ?>

  		</td>
  		<td>
        <a class="btn btn-info" href="control.php?del=<?php echo $row['id']; ?>">DELETE QUESTION </a>
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



</body>


</html>
