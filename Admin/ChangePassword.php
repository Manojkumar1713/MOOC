<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assign Short Answer Mark</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/kare_icon.ico" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/table.css">

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
</head>
<body>

<?php error_reporting(E_ERROR | E_PARSE);
include('./header.html'); ?>

<?php
include "StaffDetails.php";
$StudentDetails=array();
$studentmark = new StaffDetails;
$arr3= $studentmark->GetAdminDetails();
//global $b;
// array_push($StudentDetails,$arr);
// array_push($StudentDetails,$arr2);
// array_push($StudentDetails,$arr3);
//var_dump($StudentDetails);
?>
<div class="container-fluid">
<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">ASSIGN SHORT ANSWER MARK</h1>
</div>

<div align="center">
    <input type="text" name="search" id="search" class="form-control" placeholder="Search here...">
</div>
<br>
<table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Question ID</th>
    <th>Unit</th>
    <th>Topic</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Mark</th>
</tr>
<?php
foreach($arr3 as $a){
    ?>
    <div id="customers">
     <?php

    ?>
    <form action="" method="post">
    <input type="text" name="<?php echo($a['ID']); ?>">
    <input type="hidden" name="id" value="<?php echo($a['ID']); ?>">
    <input type="submit" name="Submit">
    </form>
    <?php
    echo("<td>");
    echo("</tr>");
    ?>
<?php

if(isset($_POST['Submit'])){
    $_SESSION['Password']=$_POST[$a['ID']];
    echo("test");
    echo($_SESSION['ID']);
    $studentmark->ChangePassword();
}
 }?>
</table>

</div>
	</div>
        </div>

<?php include('./footer.html'); ?>

</body>
</html>

 <script>
      $(document).ready(function(){
           $('#search').keyup(function(){
                search_table($(this).val());
           });
           function search_table(value){
                $('#customers tr').each(function(){
                     var found = 'false';
                     $(this).each(function(){
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                          {
                               found = 'true';
                          }
                     });
                     if(found == 'true')
                     {
                          $(this).show();
                     }
                     else
                     {
                          $(this).hide();
                     }
                });
           }
      });
 </script>