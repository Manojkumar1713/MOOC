<!DOCTYPE html>
<html lang="en">
<head>
<title>Chat Home Page</title>
  <meta charset="UTF-8">
  <link rel="icon" href="images/kare_icon.ico" />
  <!--
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css' />
-->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="./css/staff.css">
<style>
	body{
	background-image: url('kare_background.jpeg');
	background-repeat: no-repeat;
	background-size: cover;

}
#didid {
  border-radius: 25px;
  background: #b7b7b7;
  padding: 20px; 
  width: 200px;
  height: 150px;  
  
}

</style>
</head>
<body>
<?php 
// $rootDir = basename(__DIR__);


include "ChatDetails.php";

     $buttonClick = new ChatDetails;
     $arr=$buttonClick->StaffChatSpecific(); 

     global $a;

?>

<form action="" method="post">
<!--<div class="w3-container" style="width: 10rem; height: 20rem; display: inline-block">-->
    <?php foreach ($arr as $row): array_map('htmlentities', $row); ?>

      <div id="didid" class="w3-panel w3-card" style="margin: 50px; display: inline-block;">
      <center>
      <?php
			echo($row['StaffID']);
			echo "<br>";
			echo("(".$row['ques'].")");
            echo "<br>";
            echo("(".$row['date1'].")");
	
		?>
      
      </center>
      </div>
      </div>
      
   
<?php endforeach; ?>
</form>
</body>
</html>
