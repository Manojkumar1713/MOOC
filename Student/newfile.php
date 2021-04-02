<html>
<body>
<?php 
$beforetime =time()-50;
$aftertime=time()+500;
if($beforetime<=time() && $aftertime>=time()){
    echo("working");
}


?>
</body>
</html>