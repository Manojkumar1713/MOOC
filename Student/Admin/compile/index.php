<?php
session_start();
if($_SESSION['register']=="")
{
	echo "<script> location.href = '/login/login/index.php';</script>";
}

$server = "localhost";
$user = "root";
$pass ="";
$database = "questions";
$id=$_GET['id'];
$con = mysqli_connect($server,$user,$pass,$database);
$topic=$_GET['topic'];
	$qu="select * from question where id=$id";
	$p=mysqli_query($con,$qu);
	while ($r=mysqli_fetch_array($p))
 {
  $ques=$r['ques'];
  $input=$r['input'];
  $output=$r['output'];
	$title = $r['title'];
}

//$option ='';
//$s ="select * from question";
//$d = mysqli_query($con,$s);
//while ($p = mysqli_fetch_array($d))
//{
	//  $x=$p['id'];

	 //$option .= '<option value ="index.php?id=">'.$p['title'].'</option>';

//}

?>

<!DOCTYPE html>
<html>
<head>


        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>KARE</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap.js"></script>








</head>
<body>
<div class="main">

<div class="row">
  <div class="col-sm-12">
  <nav class="shadow navbar navbar-inverse navbar-fixed-top nbar">
    <div class="navbar-header">
      <a class="navbar-brand lspace" href="index.php"> Kalasalingam Academy Of Research And Education </a>
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
    </div>
   <div class="collapse navbar-collapse navbar-menubuilder">
    <ul class="nav navbar-nav">
      <li class="space"><a href="compiler.php"><i class="fa fa-code ispace"></i>Compiler</a></li>
      <!--<li class="space"><a href="archive.php"><i class="fa fa-archive ispace"></i>Problem Archive</a></li>
      <li class="space"><a href="contest.php"><i class="fa fa-cogs ispace"></i>Contests</a></li>
      <li class="space"><a href="#"><i class="fa fa-check-square ispace"></i>Debug</a></li>-->


    </ul>
    </div>
</nav>
</div>
</div>


<div class="row log">
<div class="col-sm-10">
<div class=""><h3 style="text-align:center;">KLU Practicing Area</h3><br><br>
   <?php echo $x;  ?>
  <h4><strong>Objective</strong></h4>
<h4><?php echo $ques; ?></h4><br>

<h4><strong>sample Input:</strong></h4>
<pre><?php echo $input; ?></pre><br>
<h4><strong>sample output:</strong></h4>
<pre><?php echo $output; ?></pre>
</div>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">

</div>

</div>




<div class="row cspace">
<div class="col-sm-8">
<div class="form-group">

<form action="compile.php" name="f2" method="POST">
   <label for="lang">Choose Language</label>

  <select class="form-control" name="language">
  <option value="c">C</option>
  <option value="cpp">C++</option>
  <!--<option value="cpp11">C++11</option>-->
  <option value="java">Java</option>
  <!--<option value="python2.7">Python2</option>
  <option value="python3.2">Python2</option>-->


  </select><br><br>

  <label for="ta">Write Your Code</label>
  <textarea class="form-control" name="code" rows="10" cols="50"></textarea><br><br>
  <!--<label for="in">Enter Your Input</label>
  <textarea class="form-control" name="input" rows="10" cols="50"></textarea><br><br>-->
  <input type="text" value="<?php echo $id; ?>" style="display:none;" name="id">
  <input type="submit" class="btn btn-success" value="Submit Code"><br><br><br>


</form>

						<div class="form-group" >
							<header class="header">
								 <h1>Start Discussion for <?php echo $title; ?></h1>
						 </header>
						 <main>
								 <div class="userSettings">
										 <label for="userName">Username:</label>
										 <?php echo $_SESSION['register']; ?>
										 <input id="userName" type="text" placeholder="Username" maxlength="32" value="<?php echo $_SESSION['register']; ?>" style="display:none;">
										 <input id="title" type="text" placeholder="Username" maxlength="32" value="<?php echo $title; ?>" style="display:none;">

								 </div>
								 <div class="chat">
										 <div id="chatOutput"></div>
										 <input id="chatInput" type="text" placeholder="Input Text here" maxlength="128">
										 <button id="chatSend">POST</button>
								 </div>
						 </main>
						 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
						<script src="chat.js"></script>
						</div>


</div>
</div>
</div>



</div>


<br><br><br>
<div class="area">
<div class="well foot">
<div class="row area">
<div class="col-sm-3">
<!--BEGIN: Powered by Supercounters.com -->
<!--<center><script type="text/javascript" src="http://widget.supercounters.com/online_i.js"></script><script type="text/javascript">sc_online_i(1360839,"ffffff","e61c1c");</script><br><noscript><a href="http://www.supercounters.com/">Free Online Counter</a></noscript>
</center>-->
<!-- END: Powered by Supercounters.com -->

</div>

<div class="col-sm-5">


<div class="fm">

<b>Version-2.13</b><br>
<b>Developed By <a href="http://kalasalingam.ac.in/site/">Kalasalingam university</a></b>

</div>
</div>


<div class="col-sm-4">
<?php
date_default_timezone_set("Asia/Dhaka");
 $t=date("H:i:s");
?>
</div>
</div>
</div>
</div>
</body>
</html>
<?php  ?>
