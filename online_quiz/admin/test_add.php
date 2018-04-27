<?php
session_start();
require("../database.php");
include("header.php");


?>

<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.testname.value;
if (mt.length<1) {
alert("Please Enter Test Name");
document.form1.testname.focus();
return false;
}
tt=document.form1.totque.value;
if(tt.length<1) {
alert("Please Enter Total Question");
document.form1.totque.value;
return false;
}
return true;
}
</script>
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
<div id="frmLogin">
<form name="form1" method="post" onSubmit="return check();" action="test_insert.php">
	<h2><div class=head1>Add Test</div></h2>
  <table  border="0" align="center">
    <tr>
      <td><strong>Enter Subject ID </strong></td>
      <td >  
      <td width="48%" height="32">
	  <select name="sub_id">
				<?php 
				$res=mysqli_query($link,"select * from subject");
				while($row=mysqli_fetch_array($res))
				{?>
			<option value="<?php echo $row["sub_id"];?>"><?php echo $row["sub_name"];?>		</option>
			<?php
				}
			?>
      </select>
        
    <tr>
        <td height="26"><div align="left"><strong> Enter Test Name </strong></div></td>
        <td>&nbsp;</td>
	  <td><input name="testname" type="text" id="testname"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Enter Total Question </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="totque" type="text" id="totque"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Enter Total Marks </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="totmark" type="text" id="totmark"></td>
    </tr>
	<tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value="Add" class="form-submit-button"></td>
    </tr>
  </table>
</form>
</div>
</center>

