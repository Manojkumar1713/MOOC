<?php

$server = "localhost";
$user = "root";
$pass ="";
$database = "questions";
//$id=$_GET['id'];
$con = mysqli_connect($server,$user,$pass,$database);
$qu="select * from question where id=$id";
$p=mysqli_query($con,$qu);
while ($r=mysqli_fetch_array($p))
 {
	$num = $r['Number'];
	$title=$r['title'];
	$sample_input=$r['input'];
	$sample_output=$r['output'];
	$testcase_input=$r['t1in'];
	$testcase_output=$r['t1out'];
	$testcase_input2=$r['t2in'];
	$testcase_output2=$r['t2out'];
}
	$marks=0;
	$CC="python3";
	//$out="./a.out";
	$code=$_POST["code"];
	$input=$sample_input;
	$input2=$testcase_input;
	$input3=$testcase_input2;
	$filename_code="main.py";
	$filename_in="input.txt";
	$filename_error="error.txt";
	//$executable="a.out";
	$command=$CC." ".$filename_code;
	$command_error=$command." 2>".$filename_error;

	//if(trim($code)=="")
	//die("The code area is empty");

	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	//exec("chmod 777 $executable");
	exec("chmod 777 $filename_error");

	shell_exec($command_error);
	$error=file_get_contents($filename_error);

	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($command);
		}
		else
		{
			$command=$command." < ".$filename_in;
			$output=shell_exec($command);
		}
		echo "<pre>$output</pre>";
	}
	else
	{
		echo "<pre>$error</pre>";
	}
	$sample_output=(int)$sample_output;
	$vl =$sample_output;
	//$output = (string)$output;
	if($output == $vl)
	{

		echo "<br>";
		echo "<pre>your code is correct..!</pre>";
		$marks=$marks+2;
	}
	else{
		echo "<br>";
		echo "<pre>Your code may be wrong..!";
	}
	echo "<pre>checking test cases</pre><br>";

 // checking second test case '':
 $file_code=fopen($filename_code,"w+");
 fwrite($file_code,$code);
 fclose($file_code);
 $file_in=fopen($filename_in,"w+");
 fwrite($file_in,$input2);
 fclose($file_in);
 //exec("chmod 777 $executable");
 exec("chmod 777 $filename_error");

 shell_exec($command_error);
 $error=file_get_contents($filename_error);

 if(trim($error)=="")
 {
	 if(trim($input2)=="")
	 {
		 $output=shell_exec($command);
	 }
	 else
	 {
		 $command=$command." < ".$filename_in;
		 $output=shell_exec($command);
	 }
	 echo "<pre>$output</pre>";
 }
 else
 {
	 echo "<pre>$error</pre>";
 }
 $testcase_output=(int)$testcase_output;
 $vl = $testcase_output;
 if($output == $vl)
 {

	 echo "<br>";
	 echo "<pre style='color:green;'>Test Case-1 : passed</pre>";
	 $marks=$marks+3;
 }
 else{
	 echo "<br>";
	 echo "<pre style='color:red;'>Test case 1-failed</pre> ";
 }


// checkingg test case 3
$file_code=fopen($filename_code,"w+");
fwrite($file_code,$code);
fclose($file_code);
$file_in=fopen($filename_in,"w+");
fwrite($file_in,$input3);
fclose($file_in);
//exec("chmod 777 $executable");
exec("chmod 777 $filename_error");

shell_exec($command_error);
$error=file_get_contents($filename_error);

if(trim($error)=="")
{
	if(trim($input3)=="")
	{
		$output=shell_exec($command);
	}
	else
	{
		$command=$command." < ".$filename_in;
		$output=shell_exec($command);
	}
	echo "<pre>$output</pre>";
}
else
{
	echo "<pre>$error</pre>";
}
$testcase_output2=(int)$testcase_output2;
	$vl = $testcase_output2;
	if($output == $vl)
	{

		echo "<br>";
		echo "<pre style='color:green;'>Test Cases-2 : passed</pre>";
		$marks=$marks+5;
	}
	else{
		echo "<br>";
		echo "<pre style='color:red'>Test case 2-failed</pre> ";
	}


echo "you got $marks out of 10";


echo "</br></br>";




	exec("rm $filename_code");
	exec("rm *.txt");
?>
