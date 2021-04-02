<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reply</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/kare_icon.ico" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<style>
    .form-inline {
  display: flex;
  flex-flow: row wrap;
  align-items: center;
}
</style>
</head>
<body>

<?php include('./header.html');
 include "ChatDetails.php";
 $buttonClick = new ChatDetails; ?>

<div class="container-fluid">
<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">REPLY</h1>
</div>
<p>Type here...</p>
<div class="form-inline">    
<form action="" method="post">
<textarea  type="text" name="ques" rows="6" cols="150" class="form-control" placeholder="Question"> </textarea>
<input type="submit" name ="PostChat" value="Post" class="btn btn-info">
</form>
</div>
<br>
    
    <?php 
    
    if(isset($_POST['PostChat'])) 
    { 
    $buttonClick->ReplyPrivatePostData();
    echo("<script>location.href = './PrivateForum.php';</script>");
    }
    ?>
    

</div>

<?php include('./footer.html'); ?>

</body>
</html>