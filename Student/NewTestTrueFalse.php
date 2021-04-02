<!DOCTYPE html>
<html lang="en">
<head>
    <title>True/False</title>
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
date_default_timezone_set('Asia/Kolkata');?>

<?php
error_reporting(E_ERROR | E_PARSE);

session_start();
include "CourseDetails.php";
$instance = new CourseDetails;
$newarray;
$trueFalse=$instance->UnAttendedTrueQues();
// $studentcompleted =$instance->RetriveStudentTrueFalseMark();
// // var_dump($studentcompleted);
// if($studentcompleted!=null){
// foreach($trueFalse  as $q){
//     foreach($studentcompleted as $new){
//         if($q['Qid']!=$new['Qid']){
//             array_push($newarray,$new);
//         }
//     }
// }
// }
// else{
//     $newarray=$trueFalse;
// }
global $testaArray;
$topicname=$trueFalse[0]['Topic'];
$topicExpiry=$trueFalse[0]['ExpiryTime'];
$count=0;
foreach($trueFalse as $m){
    $beforetime=(int)$m['StartTime'];
    $aftertime=(int)$m['ExpiryTime'];
    if(time()>=$beforetime && time()<=$aftertime){
            
        $count++;
            
        }
    }
    
    if($count==0){
        echo("<script>location.href = './NewTestShortAns.php';</script>");
    }
 
//var_dump($MCQ);
?>

<form action="" method="post">
<?php

foreach($trueFalse as $m){
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
<label><?php echo($m['ques']); ?></label>
</div>

<div class="form-group">    
<input type="radio" name="<?php echo($m['id']);?>" value="<?php echo($m['opA']);?>" >
<label for="opA"><?php echo($m['opA']);?></label>
</div>

<div class="form-group">    
<input type="radio" name="<?php echo($m['id']);?>" value="<?php echo($m['opB']);?>" >
<label for="opB"><?php echo($m['opB']);?></label>
</div>
   
    <?php
    $_SESSION['SMid']=$m['id'];
    $_SESSION['SMUnit']=$m['unit'];
    $_SESSION['SMTopic']=$m['Topic'];
    $_SESSION['SMQname']=$m['ques'];
    $_SESSION['SMAns']=$_POST[$m['id']];
    if($m['ans']==$_POST[$m['id']]){
        $_SESSION['SMMark']=1;  
    }
    else{
        $_SESSION['SMMark']=0;
    }
    if(isset($_POST['Submit'])){
        $instance->InsertTrueFalse();
        echo("<script>location.href = './NewTestShortAns.php';</script>");
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