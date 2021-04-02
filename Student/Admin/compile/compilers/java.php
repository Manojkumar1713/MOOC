<?php

$server = "localhost";
$user = "root";
$pass ="";
$database = "questions";
//$id=$_GET['id'];
$con = mysqli_connect($server,$user,$pass,$database);
$qu="select * from question where id=$id"; // need to be changed
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
echo("Hello I'm here");
	$marks=0;
	$CC="javac";
	$out="timeout 6s java Main";
	$code=$_POST["code"];
	$input=$sample_input;
	$input2=$testcase_input;
	$input3=$testcase_input2;
	$filename_code="Main.java";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$runtime_file="runtime.txt";
	$executable="*.class";
	$command=$CC." ".$filename_code;
	$command_error=$command." 2>".$filename_error;
	$runtime_error_command=$out." 2>".$runtime_file;

	//if(trim($code)=="")
	//die("The code area is empty");

	$file_code=fopen($filename_code,"w+")or die("unable");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("chmod 777 $executable");
	exec("chmod 777 $filename_error");

	shell_exec($command_error);
	$error=file_get_contents($filename_error);
	$executionStartTime = microtime(true);

	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			shell_exec($runtime_error_command);
			$runtime_error=file_get_contents($runtime_file);
			$output=shell_exec($out);
		}
		else
		{
			shell_exec($runtime_error_command);
			$runtime_error=file_get_contents($runtime_file);
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		//echo "<pre>$runtime_error</pre>";
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
		//echo "<pre>$output</pre>";
		  echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
	}
	else
	{
		echo "<pre>$error</pre>";
	}
/////////////////////////////////////Test1///////////////////////////////////////////
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
	fwrite($file_in,$input2);
	fclose($file_in);
	exec("chmod 777 $executable");
	exec("chmod 777 $filename_error");

	shell_exec($command_error);
	$error=file_get_contents($filename_error);
	$executionStartTime = microtime(true);

	if(trim($error)=="")
	{
		if(trim($input2)=="")
		{
			shell_exec($runtime_error_command);
			$runtime_error=file_get_contents($runtime_file);
			$output=shell_exec($out);
		}
		else
		{
			shell_exec($runtime_error_command);
			$runtime_error=file_get_contents($runtime_file);
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		//echo "<pre>$runtime_error</pre>";
		//echo "<pre>$output</pre>";
			//echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
	}
	else if(!strpos($error,"error"))
	{
		echo "<pre>$error</pre>";
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
	else
	{
		echo "<pre>$error</pre>";
	}
  /////////////////////////////////////////Test2///////////////////////////////
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
	fwrite($file_in,$input3);
	fclose($file_in);
	exec("chmod 777 $executable");
	exec("chmod 777 $filename_error");

	shell_exec($command_error);
	$error=file_get_contents($filename_error);
	$executionStartTime = microtime(true);

	if(trim($error)=="")
	{
		if(trim($input3)=="")
		{
			shell_exec($runtime_error_command);
			$runtime_error=file_get_contents($runtime_file);
			$output=shell_exec($out);
		}
		else
		{
			shell_exec($runtime_error_command);
			$runtime_error=file_get_contents($runtime_file);
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		//echo "<pre>$runtime_error</pre>";
		//echo "<pre>$output</pre>";
			//echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
	}
	else if(!strpos($error,"error"))
	{
		echo "<pre>$error</pre>";
		if(trim($input3)=="")
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
	else
	{
		echo "<pre>$error</pre>";
	}
  //////////////////////////////////Test3////////////////////////
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

echo "you got $marks out of 10";


echo "</br></br>";







	$executionEndTime = microtime(true);
	$seconds = $executionEndTime - $executionStartTime;
	$seconds = sprintf('%0.2f', $seconds);
	echo "<pre>Compiled And Executed In: $seconds s</pre>";
	if($seconds>5)
	{
		echo "<pre>Verdict : Time out</pre>";
	}
	else
	{
		echo "<pre>Verdict : Good</pre>";
	}

	exec("rm $filename_code");
	exec("rm *.txt");
	exec("rm $executable");
?>
