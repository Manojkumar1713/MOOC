<!DOCTYPE html>
<html lang="en">
<head>
    <title>Annoucement Forum</title>
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

<?php include('./header.html'); ?>

<div class="container-fluid">
<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">ANNOUNCEMENT FORUM</h1>
</div>
<p>Type here...</p>
<div class="form-inline">
<form action="" method="post">
<textarea  type="text" name="Ans" rows="6" cols="150" class="form-control" placeholder="Question"> </textarea>
<input type="submit" name ="PostChat" value="Post" class="btn btn-info">
</form>
</div>
<br>
    <table id="customers">
    <tr>
        <th>Message</th>
        <th>Date & Time</th>
    </tr>
    <?php
    //session_start();
    include "ChatDetails.php";
    $buttonClick = new ChatDetails;
    $arr=$buttonClick->StaffAnnouncementSpecific();
    ?>
    <?php foreach ($arr as $row): array_map('htmlentities', $row); ?>
      <?php
            echo "<tr>";

            echo "<td>";
            echo($row['Ans']);
            echo "</td>";
            echo "<td>";
            echo($row['date1']);
            echo "</td>";
      ?>

    <?php endforeach; ?>

    <?php
    if(isset($_POST['PostChat']))
    {
    $buttonClick->AnnouncementPostData();
    echo("<script>location.href = './AnnouncementForum.php';</script>");
    }
    ?>
    </tr>
    </table>

</div>

<?php include('./footer.html'); ?>

</body>
</html>
