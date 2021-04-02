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
date_default_timezone_set('Asia/Kolkata'); ?>

<?php
error_reporting(E_ERROR | E_PARSE);

session_start();
include "CourseDetails.php";
$instance = new CourseDetails;
$newarray;
$shortans=$instance->UnAttendedShortQues();
// $studentcompleted =$instance->RetriveStudentShortAnsMark();
// // var_dump($studentcompleted);
// if($studentcompleted!=null){
// foreach($shortans  as $q){
//     foreach($studentcompleted as $new){
//         if($q['Qid']!=$new['Qid']){
//             array_push($newarray,$new);
//         }
//     }
// }
// }
// else{
//     $newarray= $shortans;
// }
global $testaArray;
$topicname=$shortans[0]['Topic'];
$topicExpiry=$shortans[0]['ExpiryTime'];
$count=0;
foreach($shortans  as $m){
    $beforetime=(int)$m['StartTime'];
    $aftertime=(int)$m['ExpiryTime'];
    if(time()>=$beforetime && time()<=$aftertime){
            
        $count++;
            
        }
    }
    
    if($count==0){
        echo("<script>location.href = './CourseSpecificRedirect.php';</script>");
    }
//var_dump($MCQ);
?>


<form action="" method="post">
<?php

foreach($shortans as $m){
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
<textarea type="text" name="<?php echo($m['id']);?>" rows="5" cols="150" style="border-style: outset;"></textarea>
</div>
        
    <?php
    $_SESSION['SMid']=$m['id'];
    $_SESSION['SMUnit']=$m['unit'];
    $_SESSION['SMTopic']=$m['Topic'];
    $_SESSION['SMQname']=$m['ques'];
    // if($m['ans']==$_POST[$m['id']]){
    //     $_SESSION['SMMark']=1;  
    // }
    // else{
    //     $_SESSION['SMMark']=0;
    // }
    if(isset($_POST['Submit'])){
        $_SESSION['SMAns']=$_POST[$m['id']];
        $instance->InsertShortAns();
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