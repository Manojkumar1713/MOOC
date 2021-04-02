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
   $author = $r['author'];
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
	$CC="g++";
	$out="timeout 5s ./a.out";
	$code=$_POST["code"];
	$input=$sample_input;
	$input1 = $testcase_input;
	$input2 = $testcase_input2;
	$filename_code="main.cpp";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a.out";
	$command=$CC." -lm ".$filename_code;
	$command_error=$command." 2>".$filename_error;
	$check=0;

	//if(trim($code)=="")
	//die("The code area is empty");

	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("chmod -R 777 $filename_in");
	exec("chmod -R 777 $filename_code");
	exec("chmod 777 $filename_error");

	shell_exec($command_error);
	exec("chmod -R 777 $executable");
	$error=file_get_contents($filename_error);
	$executionStartTime = microtime(true);

	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);


		}
		//echo "<pre>$output</pre>";
              echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
	}
	else if(!strpos($error,"error"))
	{
		echo "<pre>$error</pre>";
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		                echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
	}
	else
	{
		echo "<pre>$error</pre>";
		$check=1;
	}
echo "</br></br>";
/////////////////////////////Tes1/////////////////////////////
$output = (string)$output;
$output = trim($output);
if($output != null){
$sample_output = trim($sample_output);

$output = explode("\n",$output);
$sample_output = explode("\n",$sample_output);
if (count($output) == count($sample_output)){
  $c = 0;
  for($i =0;$i<count($output);$i++)
  {
    if(strcmp($output[$i],$sample_output) == 0)
    {
      $c++;
    }
  }
}
if($c == count($output))
{
  echo "<br>";
  echo "<pre>your code is correct..!</pre>";
  $marks=$marks+2;
}
else{
  echo "<br>";
  echo "<pre>Your code may be wrong..!";
}
}
else{
echo "<br>";
echo "<pre>Your code may be wrong..!";
}
echo "<pre>checking test cases</pre><br>";



  $file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input1);
	fclose($file_in);
	exec("chmod -R 777 $filename_in");
	exec("chmod -R 777 $filename_code");
	exec("chmod 777 $filename_error");

	shell_exec($command_error);
	exec("chmod -R 777 $executable");
	$error=file_get_contents($filename_error);
	$executionStartTime = microtime(true);

	if(trim($error)=="")
	{
		if(trim($input1)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);


		}
		//echo "<pre>$output</pre>";
              //echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
	}
	else if(!strpos($error,"error"))
	{
		//echo "<pre>$error</pre>";
		if(trim($input1)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		                //echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
	}
	else
	{
		//echo "<pre>$error</pre>";
		$check=1;
	}
echo "</br></br>";
////////////////////////////Test2//////////////////////////
$output = (string)$output;
$output = trim($output);
if($output != null){
$sample_output = trim($testcase_output);
$output = explode("\n",$output);
$sample_output = explode("\n",$sample_output);
if (count($output) == count($sample_output)){
  $c = 0;
  for($i =0;$i<count($output);$i++)
  {
    if(strcmp($output[$i],$sample_output) == 0)
    {
      $c++;
    }
  }
}
if($c == count($output))
{
  echo "<br>";
  echo "<pre style='color:green;'>Test Case-1 : passed</pre>";
  $marks=$marks+3;
}
else{
  echo "<br>";
  echo "<pre style='color:red;'>Test case 1-failed</pre> ";
}
}
else{
echo "<br>";
echo "<pre style='color:red;'>Test case 1-failed</pre> ";
}
  $file_code=fopen($filename_code,"w+");
  fwrite($file_code,$code);
  fclose($file_code);
  $file_in=fopen($filename_in,"w+");
  fwrite($file_in,$input2);
  fclose($file_in);
  exec("chmod -R 777 $filename_in");
  exec("chmod -R 777 $filename_code");
  exec("chmod 777 $filename_error");

  shell_exec($command_error);
  exec("chmod -R 777 $executable");
  $error=file_get_contents($filename_error);
  $executionStartTime = microtime(true);

  if(trim($error)=="")
  {
    if(trim($input2)=="")
    {
      $output=shell_exec($out);
    }
    else
    {
      $out=$out." < ".$filename_in;
      $output=shell_exec($out);


    }
    //echo "<pre>$output</pre>";
              //echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
  }
  else if(!strpos($error,"error"))
  {
    //echo "<pre>$error</pre>";
    if(trim($input2)=="")
    {
      $output=shell_exec($out);
    }
    else
    {
      $out=$out." < ".$filename_in;
      $output=shell_exec($out);
    }
                    //echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
  }
  else
  {
    //echo "<pre>$error</pre>";
    $check=1;
  }
  echo "</br></br>";
  ///////////////////////Test3//////////////////////
  $output = (string)$output;
  $output = trim($output);
    if($output != null){
  $sample_output = trim($testcase_output2);
  $output = explode("\n",$output);
  $sample_output = explode("\n",$sample_output);
  if (count($output) == count($sample_output)){
    $c = 0;
    for($i =0;$i<count($output);$i++)
    {
      if(strcmp($output[$i],$sample_output) == 0)
      {
        $c++;
      }
    }
  }
  if($c == count($output))
  {
    echo "<br>";
    echo "<pre style='color:green;'>Test Case-2 : passed</pre>";
    $marks=$marks+5;
  }
  else{
    echo "<br>";
    echo "<pre style='color:red;'>Test case 2-failed</pre> ";
  }
}
else{
  echo "<br>";
  echo "<pre style='color:red;'>Test case 2-failed</pre> ";
}

echo "You got $marks Out of 10";

echo "</br></br>";
	$executionEndTime = microtime(true);
	$seconds = $executionEndTime - $executionStartTime;
	$seconds = sprintf('%0.2f', $seconds);
	echo "<pre>Compiled And Executed In: $seconds s</pre>";


	if($check==1)
	{
		echo "<pre>Verdict : CE</pre>";
	}
	else if($check==0 && $seconds>3)
	{
		echo "<pre>Verdict : TLE</pre>";
	}
	else if(trim($output)=="")
	{
		echo "<pre>Verdict : WA</pre>";
	}
	else if($check==0)
	{
		echo "<pre>Verdict : AC</pre>";
	}

    exec("rm $filename_code");
	exec("rm *.o");
	exec("rm *.txt");
	exec("rm $executable");
?>
