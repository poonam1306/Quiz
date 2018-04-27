<?php
session_start();
include("header.php");
?>

<html>
<head>
<style>
#frmLogin { 
	padding: 20px 60px;
	background: #B6E0FF;
	color: #0B5345;
	display: inline-block;
	border-radius: 4px; 
	align:center;
}
.field-group { 
	margin:15px 0px; 
}
.input-field {
	padding: 8px;width: 200px;
	border: #A3C3E7 1px solid;
	border-radius: 4px; 
}
.form-submit-button {
	background: #65C370;
	border: 0;
	padding: 8px 20px;
	border-radius: 4px;
	color: #FFF;
	text-transform: uppercase; 
}
.member-dashboard {
	padding: 40px;
	background: #D2EDD5;
	color: #555;
	border-radius: 4px;
	display: inline-block;
	text-align:center; 
}
.logout-button {
	color: #09F;
	text-decoration: none;
	background: none;
	border: none;
	padding: 0px;
	cursor: pointer;
}
.error-message {
	text-align:center;
	color:#FF0000;
}
.demo-content label{
	width:auto;
}

</style>

<title>Adminstrative AreaOnline Quiz </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?php
include("database.php");
extract($_POST);

if(isset($submit))
{
	
	$rs=mysqli_query($link,"select * from admin where admin_name='$admin_name' and password='$password'") or die(mysql_error());
	if(mysqli_num_rows($rs)<1)
	{
		echo "<BR><BR><BR><BR><div class=head1> Invalid User Name or Password<div>";
		exit;
		
	}
	$_SESSION['login']="true";
	
}
else if(!isset($_SESSION['login']))
{
	echo "<BR><BR><BR><BR><div class=head1> Your are not logged in<br> Please <a href=home.php>Login</a><div>";
		exit;
}
?>

<center>
<div id="frmLogin">
<p class="head1" >Welcome to Admistrative Area </p>
<p align="center" class="style7"><a href="sub_add.php">Add Subject</a></p>
<p align="center" class="style7"><a href="test_add.php">Add Test</a></p>
<p align="center" class="style7"><a href="question_add.php">Add Question </a></p>
<p align="center" class="style7"><a href="sub_display.php">Display Subject </a></p>
<input type="button" onclick="logout.php" value="LogOut" class="form-submit-button">
</div>
</center>
<p align="center" class="head1">&nbsp;</p>
</body>
</html>
