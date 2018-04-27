<?php
session_start();
require("../database.php");
include("header.php");
	
extract($_POST);

echo "<BR>";
if (!isset($_SESSION['login']))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}



if(strlen($subname)>0 )
{
$rs=mysqli_query($link,"select * from subject where sub_name='$subname'");
if (mysqli_num_rows($rs)>0)
{
	echo "<br><br><p class=head1 align='center'>Subject is Already Exists</p>";
	exit;
}
$sql ="insert into subject(sub_name) values ('$subname')";
mysqli_select_db($link,'data');
mysqli_query($link,$sql) or die(mysqli_error($link));
echo "<p align=center>Subject  <b> \"$subname \"</b> Added Successfully.</p>";
$submit=" ";
}


?>

	
