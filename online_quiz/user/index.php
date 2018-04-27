<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Welcome to Online Exam</title>
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

<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
include("database.php");
extract($_POST);

if(isset($submit))
{
	$rs=mysqli_query($link,"select * from user where login='$loginid' and password='$pass'");
	if(mysqli_num_rows($rs)<1)
	{
		$found="N";
	}
	else
	{
		$_SESSION['login']=$loginid;
	}
}
if (isset($_SESSION['login']))
{
echo "</br><center><div id='frmLogin'><h1>Welcome to Online Exam</h1>";
echo '<a href="subject_list.php" class="style4">Subject for Quiz </a></br>
	<a href="result.php" class="style4">Result </a></center>';
   
		exit;
}
?>
<div align=center>

  <tr>
    <td valign="top">
	<form name="form1" method="post" action="" id="frmLogin">
      <div class="field-group">
	  <table width="200" border="0">
        <tr>
          <td><span class="style2">Login ID </span></td>
          <td><input name="loginid" type="text" id="loginid2" class="input-field"></td>
        </tr>
        <tr>
          <td><span class="style2">Password</span></td>
          <td><input name="pass" type="password" id="pass2" class="input-field"></td>
        </tr>
        <tr>
          <td colspan="2"><span class="errors">
            <?php
		  if(isset($found))
		  {
		  	echo "Invalid Username or Password";
		  }
		  ?>
          </span></td>
          </tr>
        <tr>
          <td colspan=2 align=center class="errors">
		  <input name="submit" type="submit" id="submit" value="Login" class="form-submit-button">		  </td>
        </tr>
        <tr>
		
          <td colspan="2" >		</br>
<div align="center"><span class="style4">New User ? <a href="signup.php">Signup Free</a></span></div></td>
          </tr>
      </table>
	  </div>
     
    </form></td>
  </tr>
</div>
</body>
</html>
