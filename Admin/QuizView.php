<!DOCTYPE html>
<html lang="en">
<head>
    <title>View MCQ</title>
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

<?php include('./header.html'); ?>

<div class="container-fluid">
<?php
if(isset($_POST['Back']))
{
    header("Location: ./CourseSpecificRedirect.php");
}
?>

<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">VIEW MCQ</h1>
</div>
<?php

include "QuizDetails.php";


    $buttonClick = new QuizDetails;
    $arr=$buttonClick->GetStaffSpecificQuiz();
    global $b;

// }
?>

<form action="" method="post">
<input type="submit" name="PDF" value="Download PDF" class="btn btn-danger">
<button onclick="exportToExcel('tblexportData', 'Spreadsheet')" class="btn btn-success">Download Excel</button>
</form>

<div id="tblexportData">
<br>
<table border="1" id='customers'>
<tr>
    <th>Unit</th>
    <th>Topic</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Options</th>
    <th>Delete</th>
</tr>
<?php
//var_dump($arr);
foreach($arr as $a){
    ?>
     <?php
     if($a['correct']==null){
    echo("<tr>");
    echo("<td>");
    echo($a['Unit']);
    echo("</td>");
    echo("<td>");
    echo($a['topic']);
    echo("</td>");
    echo("<td>");
	echo($a['Qname']);
    echo("<td>");
	echo($a['correct']);
    echo("</td>");
    echo("<td>");
        echo($a['opA']);
        echo("</br>");
        echo($a['opB']);
        echo("</br>");
        echo($a['opC']);
        echo("</br>");
        echo($a['opD']);
    echo("</td>");
     }else{
        echo("<tr>");
        echo("<td>");
        echo($a['Unit']);
        echo("</td>");
        echo("<td>");
        echo($a['topic']);
        echo("</td>");
        echo("<td>");
        echo($a['Qname']);
        echo("<td>");
        echo($a['correct']);
        echo("</br>");
        echo($a['correct2']);
        echo("</br>");
        echo($a['correct3']);
        echo("</td>");
        echo("<td>");
        echo($a['opA']);
        echo("</br>");
        echo($a['opB']);
        echo("</br>");
        echo($a['opC']);
        echo("</br>");
        echo($a['opD']);
        echo("</td>");
        
     }
    ?>
    <form action="" method="post">
    <td>
    <input type='submit' value="Delete" name="<?php echo($a['Qid']);$b=$a['Qid']; ?>" class="btn btn-danger" >
    </td>
    </tr>
    </form>
    <?php

     // echo($row['CourseID']);
      if(isset($_POST[$b]))
     {
      $buttonClick = new QuizDetails;
     $_SESSION['QID']=$b;
     echo( $_SESSION['QID']);
     $ar=$buttonClick->DeleteQuiz();
     //header("Location: ./CourseSpecificRedirect.php");
     echo("<script>location.href = './QuizView.php';</script>");
     }
     ?>
<?php } ?>

</table>

</div>

<?php include('./footer.html'); 

if(isset($_POST['PDF'])){
echo("<script>location.href = './QuizViewPrint.php';</script>");
}
?>

</body>
</html>
