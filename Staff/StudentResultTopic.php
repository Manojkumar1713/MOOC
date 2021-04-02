<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assessment Topic Report</title>
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
    <script type="text/javascript">
function exportToExcel(tableID, filename = ''){
    var downloadurl;
    var dataFileType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'export_excel_data.xls';
    
    // Create download link element
    downloadurl = document.createElement("a");
    
    document.body.appendChild(downloadurl);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTMLData], {
            type: dataFileType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;
    
        // Setting the file name
        downloadurl.download = filename;
        
        //triggering the function
        downloadurl.click();
    }
}
 
</script>
</head>
<body>

<?php error_reporting(E_ERROR | E_PARSE);
include('./header.html'); ?>



<?php
include "CourseDetails.php";
$StudentDetails=array();
$studentmark = new CourseDetails;
$arr= $studentmark->RetriveStudentTopicQuizMark();
$arr2= $studentmark->RetriveStudentTopicTrueMark();
$arr3= $studentmark->RetriveStudentTopicShortMark();
//global $b;
$radTopic;
$checkTopic;
$totalRad=0;
$truefalse;
$totaltrue=0;
$shortans;
$totalshort=0;
$StudentRegNo;
// array_push($StudentDetails,$arr);
// array_push($StudentDetails,$arr2);
// array_push($StudentDetails,$arr3);
//var_dump($StudentDetails);
?>
<div class="container-fluid">
<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">ASSESSMENT TOPIC REPORT</h1>
</div>
<form action="" method="post">
<input type="submit" name="PDF" value="Download PDF" class="btn btn-danger">
<button onclick="exportToExcel('tblexportData', 'Spreadsheet')" class="btn btn-success">Download Excel</button>
</form>

<div id="tblexportData">
<h1>MCQ</h1>
<table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Name</th>
    <th>Total Mark</th>
</tr>
<?php
$radTopic=$arr[0]['topic'];
$StudentRegNo=$arr[0]['RegNo'];
echo("<center><h3>Topic Name: ".$radTopic."</h3></center>");
foreach($arr as $a){
    if($radTopic==$a['topic']){
    ?>
     <?php
    echo("<tr>");
    echo("<td>");
    echo($a['RegNo']);
    echo("</td>");
    echo("<td>");
    echo($a['Name']);
    echo("</td>");
    echo("<td>");
    echo($a['total']);
    echo("</td>");
    echo("</tr>");
    echo("</table>")
    ?>


<?php }

else{
    $totalRad=0;
    echo("</table>");
    $radTopic=$a['topic'];
    echo("<center><h3>Topic Name:".$radTopic."</h3></center>");
    ?>
<table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Name</th>
    <th>Total Mark</th>
</tr>
<?php
echo("<tr>");
echo("<td>");
echo($a['RegNo']);
echo("</td>");
echo("<td>");
echo($a['Name']);
echo("</td>");
echo("<td>");
echo($a['total']);
echo("</td>");

}

}?>
</table>

<h1>True/False</h1>
<table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Name</th>
    <th>Total Mark</th>
</tr>
<?php
$truefalse=$arr2[0]['topic'];
$StudentRegNo=$arr2[0]['RegNo'];
echo("<center><h3>Topic Name: ".$truefalse."</h3></center>");
foreach($arr2 as $a){
    if($truefalse==$a['topic']){
    ?>


     <?php
    echo("<tr>");
    echo("<td>");
    echo($a['RegNo']);
    echo("</td>");
    echo("<td>");
    echo($a['Name']);
    echo("</td>");
    echo("<td>");
    echo($a['total']);
    echo("</td>");
    echo("</tr>");
    echo("</table>");
    ?>
<?php }

else{
    $totaltrue=0;
    echo("</table>");
    $truefalse=$a['topic'];
    echo("<center><h3>Topic Name: ".$truefalse."</h3></center>");
    ?>
<table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Name</th>
    <th>Total Mark</th>
</tr>
<?php
echo("<tr>");
echo("<td>");
echo($a['RegNo']);
echo("</td>");
echo("<td>");
echo($a['Name']);
echo("</td>");
echo("<td>");
echo($a['total']);
echo("</td>");
echo("</tr>");

}

}?>
</table>

<h1>Short Answer</h1>
<table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Name</th>
    <th>Total Mark</th>
</tr>
<?php
$shortans=$arr3[0]['Topic'];
$StudentRegNo=$arr3[0]['RegNo'];
echo("<h3>".$shortans."</h3>");
foreach($arr3 as $a){
    if($shortans==$a['topic']){
    ?>

     <?php
    echo("<tr>");
    echo("<td>");
    echo($a['RegNo']);
    echo("</td>");
    echo("<td>");
    echo($a['Name']);
    echo("</td>");
    echo("<td>");
    echo($a['total']);
    echo("</td>");
    echo("</tr>");
    echo("</table>");
    ?>
<?php }

else{
    $totalshort=0;
    echo("</table>");
    $shortans=$a['topic'];
    echo("<center><h3>Topic Name: ".$shortans."</h3></center>");
    ?>

<table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Name</th>
    <th>Total Mark</th>
</tr>

<?php
echo("<tr>");
echo("<td>");
echo($a['RegNo']);
echo("</td>");
echo("<td>");
echo($a['Name']);
echo("</td>");
echo("<td>");
echo($a['total']);
echo("</td>");
echo("</tr>");

}

}?>
</table>
</div>
</div>
	</div>
        </div></div>

<?php include('./footer.html');
if(isset($_POST['PDF'])){
echo("<script>location.href = './StudentResultTopicPrint.php';</script>");
}
 ?>

</body>
</html>
