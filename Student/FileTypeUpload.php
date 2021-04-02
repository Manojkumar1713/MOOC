<!DOCTYPE html>
<html lang="en">
<head>
    <title>Short Answer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/kare_icon.ico" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
</head>
<body>

<?php include('./header.html');
date_default_timezone_set('Asia/Kolkata');  ?>

<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
include "CourseDetails.php";
$instance = new CourseDetails;
$newarray;
$MCQ=$instance->UnAttendedFileQues();
// $studentcompleted =$instance->RetriveFileTypeAnsMark();
// if($studentcompleted!=null){
//     foreach($MCQ as $q){
//         foreach($studentcompleted as $new){
//             if($q['Qid']!=$new['Qid']){
//                 array_push($newarray,$new);
//             }
//         }
//     }
//     }
//     else{
//         $newarray= $MCQ;
//     }
$count=0;
$topicname=$MCQ[0]['Topic'];
$topicExpiry=$MCQ[0]['ExpiryTime'];
$counter=0;
foreach($MCQ  as $m){
    $beforetime=(int)$m['StartTime'];
    $aftertime=(int)$m['ExpiryTime'];
    if(time()>=$beforetime && time()<=$aftertime){
            
        $counter++;
            
        }
    }
    
    if($counter==0){
        echo("<script>location.href = './CourseSpecificRedirect.php';</script>");
    }

// $testaArray = ;
 
//var_dump($MCQ);
?>

<form action="" method="post" enctype="multipart/form-data">
<?php

foreach($MCQ as $m){
    $beforetime=$m['StartTime'];
    //$beforetime=$beforetime-86400;
    echo("\n");
    
    $beforetime = date('m/d/Y H:i:s', $beforetime);
   
    $aftertime=$m['ExpiryTime'];
    //$aftertime=$aftertime-86400;
    echo("\n");
   
    $CurrTime = date('m/d/Y H:i:s', time());
    
    echo("\n");
  
    $aftertime=date('m/d/Y H:i:s', $aftertime);
    
    echo("\n");
    if($beforetime<=$CurrTime){
        
        if($CurrTime<=$aftertime){
            if($topicname!=$m['Topic']){
                $topicname=$m['Topic'];
                    $topicExpiry=$m['ExpiryTime'];
            
        
        ?>
        <div class="form-group">    
        <label><h1><?php echo("Topic:".$topicname); ?></h1></label>
        <br>
        <label><h1><?php echo("Expiry Time:".date('m/d/Y H:i:s',$topicExpiry)); ?></h1></label>
        </div>
        <?php
        }
        ?>
      
       <div class="form-group">    
        <label><?php echo($m['ques']);?></label>
        </div>
        <div class="form-group"> 
        <input type="file" name="file[]" id="file" data-max-file-size="1024M">
        </div>
        
       
    <?php 
    $_SESSION['SMid']=$m['id'];
    $_SESSION['SMUnit']=$m['unit'];
    $_SESSION['SMTopic']=$m['Topic'];
    $_SESSION['SMQname']=$m['ques'];
    $_SESSION['RTest']=$_FILES['file']['name'][$count];
    $file = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $filetype = $_FILES['file']['type'];
    $filetmp = $_FILES['file']['tmp_name']; 
    $file = $_FILES; 
    $count++;
    // var_dump($file);  
    // var_dump($_SESSION['RTest']);
    //var_dump($file); 
      

   if(isset($_POST['Submit'])){

            $vari =$_SESSION['CourseID'];
           $vari="$vari";
           $vari2 =$_SESSION['SID'];
           $vari2="$vari2";
    if (!file_exists('./Staff/uploads/'.$vari.'/'.$vari2)) {
        mkdir('../Staff/uploads/'.$vari);
        mkdir('../Staff/uploads/'.$vari.'/'.$vari2);
        for($i=0;$i<count($_FILES['file']['name']);$i++){
            // $_SESSION['SMid']=$m['id'];
            // $_SESSION['SMUnit']=$m['unit'];
            // $_SESSION['SMTopic']=$m['Topic'];
            // $_SESSION['SMQname']=$m['ques'];
            // $_SESSION['RTest']=$_FILES['file']['name'][$i];
        $files = '../Staff/uploads/'.$vari.'/'.$vari2.'/'.$_FILES['file']['name'][$i];
        $move = move_uploaded_file($filetmp[$i],$files);
        
        }
       
    }
    else{
        for($i=0;$i<count($_FILES['file']['name']);$i++){
            // $_SESSION['SMid']=$m['id'];
            // $_SESSION['SMUnit']=$m['unit'];
            // $_SESSION['SMTopic']=$m['Topic'];
            // $_SESSION['SMQname']=$m['ques'];
            // $_SESSION['RTest']=$_FILES['file']['name'][$i];
        $files = 'Staff/uploads/'.$vari.'/'.$vari2.'/'.$_FILES['file']['name'];
        $move = move_uploaded_file($filetmp,$files);
        // $_SESSION['RTest']=$_FILES['file']['name'];
        }
    }
    //$_SESSION['SMAns']=$_POST[$m['id']];
//     array_push($testaArray,$file);
//    //
//     $_SESSION['RTest']=$testaArray;
//     //var_dump($testaArray[0]['file']['name']);
     $instance->InsertFileType();
    echo("<script>location.href = './CourseSpecificRedirect.php';</script>");
}
    
}
    }
}
?>
<div>
<input type="submit" name="Submit" class="btn btn-success">
</div>
    </form>
    <?php include('./footer.html'); ?>

</body>
</html>
