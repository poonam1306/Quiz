	<?php
session_start();
require("../database.php");

include("header.php");
?>


<?php

extract($_POST);

//if(@$_POST['submit'] && $_POST['submit']=="Save" || strlen(@$_POST['test_id'])>0)
//if(isset($_FILES['file']))
if(isset($_FILES))
{
	//echo"hello 0";
	//var_dump($_FILES);
	if($_FILES['file']['name'] != '')
	{
		//echo"hello 1";
		
		$filename=explode(".",$_FILES['file']['name']);
		if(end($filename)=="csv")
			{
				$handle=fopen($_FILES['file']['tmp_name'],"r");
				while($data=fgetcsv($handle))
				{
					$que=mysqli_real_escape_string($link,$data[0]);
					$ans1=mysqli_real_escape_string($link,$data[1]);
					$ans2=mysqli_real_escape_string($link,$data[2]);
					$ans3=mysqli_real_escape_string($link,$data[3]);
					$ans4=mysqli_real_escape_string($link,$data[4]);
					$ans=mysqli_real_escape_string($link,$data[5]);
					
					$query="INSERT INTO `question`(`test_id`, `desc`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`) VALUES ('$test_id','$que','$ans1','$ans2','$ans3','$ans4','$ans')";
					mysqli_query($link,$query)or die(mysql_error($link));
				}
				echo "<h1 align=center>Question Added Successfully.</h1>";
				fclose($handle);
			}
		else
		{
			$message='<label>Please select CSV File Only</label>';
		}
	}
	else
	{
		$message='<label>Please select File </label>';
	}

//mysqli_query($link,"INSERT INTO `question`(`test_id`, `desc`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`) VALUES ('$test_id','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')") or die(mysql_error($link));

unset($_POST);
}
else
{
	echo 'File not found';
}
?>
