<?php
$ques =$_POST['question'];
$sample = $_POST['sample'];
$output = $_POST['output'];
$test1  = $_POST['testcase1'];
$tout = $_POST['t1out'];
$test2= $_POST['testcase2'];
$tout2 = $_POST['t2out'];
$title = $_POST['title'];
$server = "localhost";
$user = "root";
$pass ="";
$database = "questions";
$con = mysqli_connect($server,$user,$pass,$database);
$flag = 0;
if(isset($_POST['submit']))
{
  $query = "insert into question(input,output,t1in,t1out,t2in,t2out,ques,title)values('$sample','$output','$test1','$tout','$test2','$tout2','$ques','$title')";
  $sql= mysqli_query($con,$query);
}
if($sql)
{
  $flag=1;
}






?>






<!DOCTYPE html>

<html>
<head>
  <title>ADmin Page</title>

  <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 <!-- Latest compiled JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



  </head>

<body>
  <div class ="container">
  	<div class ="well text-center"> ADD ASSIGNMENT QUESTIONS</div>
  </div>

<div style='margin:auto;'>

  <form class="form-horizontal" action="questions.php" method="POST">
	<div>
    <?php if($flag) { ?>
	<div class="alert  alert-success">
		<strong> Success..!</strong> data successfully inserted;
	</div>
<?php } ?>

<h2>
			<a class ="btn btn-info" href="control.php">Delete Question </a>
    </h2>
    	<h2><div class = "well text-center"> Date: <?php echo date("Y-m-d"); ?> </div></h2>
</div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="title" placeholder="Enter question title">
      </div>
    </div>
   <div class="form-group">
     <label class="control-label col-sm-2" >Question</label>
     <div class="col-sm-10">
       <input type="text" class="form-control" name="question" placeholder="Enter question">
     </div>
   </div>
   <div class="form-group">
     <label class="control-label col-sm-2">Sample Input</label>
     <div class="col-sm-10">
       <input type="text" class="form-control" name="sample" placeholder="Enter sample input">
     </div>
   </div>
   <div class="form-group">
     <label class="control-label col-sm-2" >Sample Output</label>
     <div class="col-sm-10">
       <input type="text" class="form-control" name="output" placeholder="Enter sample output">
     </div>
   </div>
   <div class="form-group">
     <label class="control-label col-sm-2" >Testcase1 Input</label>
     <div class="col-sm-10">
       <input type="text" class="form-control" name="testcase1" placeholder="Enter Testcase1 Input">
     </div>
   </div>
   <div class="form-group">
     <label class="control-label col-sm-2" >Testcase1 output</label>
     <div class="col-sm-10">
       <input type="text" class="form-control" name="t1out" placeholder="Enter Testcase1 output">
     </div>
   </div>
   <div class="form-group">
     <label class="control-label col-sm-2" >Testcase2 Ipput</label>
     <div class="col-sm-10">
       <input type="text" class="form-control" name="testcase2" placeholder="Enter Testcase2 Input">
     </div>
   </div>
   <div class="form-group">
     <label class="control-label col-sm-2" >Testcase2 output</label>
     <div class="col-sm-10">
       <input type="text" class="form-control" name="t2out" placeholder="Enter testcase2 output">
     </div>
   </div>
   <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
       <button type="submit" class="btn btn-default" name="submit">Submit</button>
     </div>
   </div>
 </form>

</div>



</body>
</html>
