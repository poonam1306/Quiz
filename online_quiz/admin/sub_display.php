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
$query = "select * from subject";
	
	$result = mysqli_query($link,$query);
	
?>
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

<center>
<div id="frmLogin" width="500%">
<h3 align="center"><u><b><i>Display Subject Details </i></b></u></h3>
					<center>
						<table  border="2">
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							<?php while($row = mysqli_fetch_array($result)){ ?>
							<tr>
								<td><?php echo $row['sub_id']; ?></td>
								<td><?php echo $row['sub_name']; ?></td>
								<td><a href="sub_edit.php?id=<?php echo $row['sub_id']; ?>">Edit</a></td>
								<td><a href="sub_delete.php?id=<?php echo $row['sub_id']; ?>">Delete</a></td>
							</tr>
							<?php } ?>
						</table>
					</center>
					</div>
					</center>
