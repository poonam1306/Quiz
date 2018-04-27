<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style>
#frmLogin { 
	padding: 20px 60px;
	background: #16A085;
	color: white;
	display: inline-block;
	border-radius: 4px; 
	align:center;
}
</style>
<title>Online Quiz - Test List</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php
include("header.php");
include("database.php");
extract($_GET);
$rs1=mysqli_query($link,"select * from subject where sub_id=$subid");
$row1=mysqli_fetch_array($rs1);
echo "<h1 align=center><font color=#154360> $row1[1]</font></h1>";
$rs=mysqli_query($link,"select * from test where sub_id=$subid");
if(mysqli_num_rows($rs)<1)
{
	echo "<br><center><div id='frmLogin'><h2 class=head1> No Quiz for this Subject </h2></div></center>";
	exit;
}
echo "<br><center><div id='frmLogin'><h2 class=head1> Select Quiz Name to Give Quiz </h2>";
echo "<table align=center></div></center>";

while($row=mysqli_fetch_row($rs))
{
	echo "<tr><td align=center ><a href=quiz.php?testid=$row[0]&subid=$subid><font size=6>$row[2]</font></a>";
}
echo "</table>";
?>
</body>
</html>
