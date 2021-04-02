<!DOCTYPE html>
<html lang="en">
<head>
    <title>Discussion Forum</title>
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

#buttonPost{
    background-color: #792fac;
}
</style>
</head>
<body>

<?php
error_reporting(E_ERROR | E_PARSE);
 include('./header.html'); ?>

<div class="container-fluid">
<div class="jumbotron" style="background-color: #2a103c; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #2a103c;">DISCUSSION FORUM</h1>
</div>
<p>Type here...</p>
<div class="form-inline">    
<form action="" method="post">
<textarea  type="text" name="ques" rows="6" cols="150" class="form-control" placeholder="Question"> </textarea>
<input type="submit" name ="PostChat" value="Post" class="btn btn-info" id="buttonPost">
</form>
</div>
<br>
    <table id="customers">
    <tr>
        <th>Sender ID</th>
        <th>Sender Name</th>
        <th>Message</th>
        <th>Date & Time</th>
    </tr>
    <?php
    //session_start();
    include "ChatDetails.php";
    $buttonClick = new ChatDetails;
    $arr=$buttonClick->StaffChatSpecific(); 
    ?>
    <?php foreach ($arr as $row): array_map('htmlentities', $row); ?>
      <?php  
            echo "<tr>";
            echo "<td>";
            echo($row['ID']);
            echo "</td>";
            echo "<td>";
            echo $row['Name'];
            echo "</td>";
            echo "<td>";
            echo($row['ques']);
            echo "</td>";
            echo "<td>";
            echo($row['date1']);
            echo "</td>";
      ?>
    
    <?php endforeach; ?>

    <?php 
    if(isset($_POST['PostChat'])) 
    { 
    $buttonClick->StaffPostData();
    echo("<script>location.href = './DiscussionForum.php';</script>");
    }
    ?>
    </tr>
    </table>

</div>

<?php include('./footer.html'); ?>

</body>
</html>