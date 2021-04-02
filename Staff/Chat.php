<html>
<body>
<?php 
// $rootDir = basename(__DIR__);

// function SubmitData()
// {
include "ChatDetails.php";
if(isset($_POST['Submit'])) 
{ 
    $buttonClick = new ChatDetails;
    $buttonClick->StaffPostData();
}
// } 
?>

<form action="" method="post">


Question: <input type="text" name="ques" class="form-control"><br>

<input type="submit" name ="Submit">

<?php 
// $rootDir = basename(__DIR__);

// function SubmitData()
// {
if(isset($_POST['RestriveData'])) 
{ 
    $buttonClick = new ChatDetails;
    $buttonClick->StaffChatSpecific();
}
// } 
?>
</form>

<form action="" method="post">
<input type="submit" name ="RestriveData" >
</form>
</body>
</html>