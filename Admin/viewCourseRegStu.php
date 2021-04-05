<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student Details</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/kare_icon.ico" />
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #222d32;
  color: white;
}
table {
  width: 100%;
}

th {
  height: 50px;
}
</style>

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
<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php include('./header.html'); ?>

<div class="container-fluid">
<form action="" method="post">
<br>
<input type="submit" name="PDF" value="Download PDF" class="btn btn-danger">
<button onclick="exportToExcel('tblexportData', 'Spreadsheet')" class="btn btn-success">Download Excel</button>
</form>
</div>
<div id="tblexportData">

<center><h2><b>KARE Registered Student Details</h2></b></h2>
<br>
<table id='customers'>
  <tr>
  <th>Register Number</th>
  <th>Student Name</th>
  <th>College Name</th>
  <th>Department</th>
  <th>Email</th>
  <th>Phone Number</th>
</tr>

<?php
include "CourseDetails.php";
$students= new CourseDetails;
    $studentsDetails=$students->GetStudentDetails();
    foreach($studentsDetails as $stu){
        echo("<tr>");
        echo("<td>");
        echo($stu['RegNo']);
        echo("</td>");
        echo("<td>");
        echo($stu['Name']);
        echo("</td>");
        echo("<td>");
        echo($stu['CLG']);
        echo("</td>");
        echo("<td>");
        echo($stu['Dept']);
        echo("</td>");
        echo("<td>");
        echo($stu['Email']);
        echo("</td>");
        echo("<td>");
        echo($stu['PhoneNo']);
        echo("</td>");
        echo("</tr>");
    }
?>
</table>
</div>

<?php
if(isset($_POST['PDF'])){
echo("<script>location.href = './viewCourseRegStuPrint.php';</script>");
}
?>

<?php include('./footer.html'); ?>

</body>
</html>