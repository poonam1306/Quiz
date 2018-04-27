<?php
session_start()
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Administrative Login - Online Quiz</title>
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

</head>

<body>
<?php
include("header.php");
?>
<center>
<form name="form1" method="post" action="login.php" id="frmLogin">
<h2>Admin Login </h2>

<div class="field-group">
<table width="490" border="0">
  <tr>
    <td width="163" class="style2">Login ID </td>
    <td width="149"><input name="admin_name" type="text" id="admin_name" class="input-field"></td>
  </tr>
  <tr>
    <td class="style2">Password</td>
    <td><input name="password" type="password" id="password" class="input-field"></td>
  </tr>
  </br>
  <tr>
    <td class="style2">&nbsp;</td>
    <td><br><input name="submit" type="submit" id="submit" value="Login" class="form-submit-button"></td>
  </tr>
</table>

</form>
</center>
</body>
</html>
