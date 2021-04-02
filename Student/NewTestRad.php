<!DOCTYPE html>
<html lang="en">
<head>
    <title>Single Choice MCQ</title>
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
$newarray;

$instance = new CourseDetails;
$MCQ=$instance->UnAttendedQuizQues();
//$studentcompleted =$instance->RetriveStudentQuizMark();
 //var_dump($studentcompleted);
// if($studentcompleted!=null){
// foreach($MCQ as $q){
//     foreach($studentcompleted as $new){
//         if($q['Qid']!=$new['Qid']){
//             array_push($newarray,$new);
//         }
//     }
// }
// }
// else{
//     $newarray= $MCQ;
// }
 //var_dump($newarray);
global $testaArray;
$topicname=$MCQ[0]['Topic'];
$topicExpiry=$MCQ[0]['ExpiryTime'];
$ExpiryTimeTopic = date('m/d/Y H:i:s', $topicExpiry);
$CurrentTime=time();
$count=0;

// var_dump($MCQ);
foreach($MCQ as $m){
    if($m['correct2']==null && $m['correct3']==null){
        $beforetime=(int)$m['StartTime'];
        $aftertime=(int)$m['ExpiryTime'];
        if(time()>=$beforetime && time()<=$aftertime){
            
        $count++;
            
        }
        
        }
    }
    if($count==0){
        echo("<script>location.href = './NewTestCheck.php';</script>");
    }
//var_dump($newarray);
?>

<form action="" method="post">

<?php

foreach($MCQ as $m){
    if($m['correct2']==null && $m['correct3']==null){
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
                
        

        // echo($CurrentTime);
        // echo($m['StartTime']);
       
        //var_dump($beforetime);
        //var_dump(time());
        //var_dump($aftertime);
        
        
            
        // if($beforetime>=time()){
        //     echo("1 working");
        // }
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
<label><?php echo($m['Qname']); ?></label>
</div>


<div class="form-group">    
<input type="radio" name="<?php echo($m['Qid']);?>" value="<?php echo($m['opA']);?>" >
<label for="opA"><?php echo($m['opA']);?></label>
</div>

<div class="form-group">    
<input type="radio" name="<?php echo($m['Qid']);?>" value="<?php echo($m['opB']);?>" >
<label for="opB"><?php echo($m['opB']);?></label>
</div>

<div class="form-group">    
<input type="radio" name="<?php echo($m['Qid']);?>" value="<?php echo($m['opC']);?>" >
<label for="opC"><?php echo($m['opC']);?></label>
</div>

<div class="form-group">    
<input type="radio" name="<?php echo($m['Qid']);?>" value="<?php echo($m['opD']);?>" >
<label for="opD"><?php echo($m['opD']);?></label>
</div> 

    <?php
    $_SESSION['SMQid']=$m['Qid'];
    $_SESSION['SMUnit']=$m['Unit'];
    $_SESSION['SMTopic']=$m['Topic'];
    $_SESSION['SMQname']=$m['Qname'];
    $_SESSION['SMAns']=$_POST[$m['Qid']];
    if($m['correct']==$_POST[$m['Qid']]){
        $_SESSION['SMMark']=1;  
    }
    else{
        $_SESSION['SMMark']=0;
    }
    if(isset($_POST['Submit'])){
        $instance->InsertMCQ();
        echo("<script>location.href = './NewTestCheck.php';</script>");
    }
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