<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assignment Topic Report</title>
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
$arr4= $studentmark->RetriveStudentTopicfileMark();
//global $b;
$radTopic;
$checkTopic;
$totalRad=0;
$truefalse;
$totaltrue=0;
$shortans;
$totalshort=0;
$filetype;
$totalfile=0;
$StudentRegNo;
// array_push($StudentDetails,$arr);
// array_push($StudentDetails,$arr2);
// array_push($StudentDetails,$arr3);
//var_dump($StudentDetails);
?>
<div class="container-fluid">
<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">ASSIGNMENT TOPIC REPORT</h1>
</div>
<form action="" method="post">
<input type="submit" name="PDF" value="Download PDF" class="btn btn-danger">
<button onclick="exportToExcel('tblexportData', 'Spreadsheet')" class="btn btn-success">Download Excel</button>
</form>
<div id="tblexportData">
<?php

$filetype=$arr4[0]['Topic'];
$StudentRegNo=$arr4[0]['RegNo'];
echo("<center><h3>".$filetype."</h3></center>");
foreach($arr4 as $a){
    if($filetype==$a['topic']){
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
    ?>
<?php }

else{
    $totalfile=0;
    echo("</table>");
    $filetype=$a['topic'];
    echo("<center><h3>Topic: ".$filetype."</h3></center>");
    ?>
    <table border="1" id='customers'>
<tr>
    <th>Register Number</th>
    <th>Name</th>
    <th>Total</th>

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
echo("</table>");
}
echo("</table>");

}?>
</div>
</div>
	</div>
        </div>

<?php include('./footer.html');
if(isset($_POST['PDF'])){
echo("<script>location.href = './StudentAssignmentResultPrint.php';</script>");
}
 ?>

</body>

</html>
