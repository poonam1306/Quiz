<?php
session_start();
require("../database.php");
include("header.php");
?>


<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.addque.value;
if (mt.length<1) {
alert("Please Enter Question");
document.form1.addque.focus();
return false;
}
a1=document.form1.ans1.value;
if(a1.length<1) {
alert("Please Enter Answer1");
document.form1.ans1.focus();
return false;
}
a2=document.form1.ans2.value;
if(a1.length<1) {
alert("Please Enter Answer2");
document.form1.ans2.focus();
return false;
}
a3=document.form1.ans3.value;
if(a3.length<1) {
alert("Please Enter Answer3");
document.form1.ans3.focus();
return false;
}
a4=document.form1.ans4.value;
if(a4.length<1) {
alert("Please Enter Answer4");
document.form1.ans4.focus();
return false;
}
at=document.form1.anstrue.value;
if(at.length<1) {
alert("Please Enter True Answer");
document.form1.anstrue.focus();
return false;
}
return true;
}
</script>
<form name="form1" method="post" onSubmit="return check();" action="question_insert.php" enctype="multipart/form-data">
	<h3 class=head1>Add Question </h3>
  <table width="80%"  border="0" align="center">
  <tr>
      <td width="24%" height="32"><div align="left"><strong>Select Subject Name </strong></div></td>
      <td width="1%" height="5">  
      <td width="75%" height="32">
	  <select name="test_id">
				<?php 
				$res=mysqli_query($link,"select * from subject");
				while($row=mysqli_fetch_array($res))
				{?>
			<option value="<?php echo $row["sub_id"];?>"><?php echo $row["sub_name"];?>		</option>
			<?php
				}
			?>
      </select>
	 </tr>
    <tr>
      <td width="24%" height="32"><div align="left"><strong>Select Test Name </strong></div></td>
      <td width="1%" height="5">  
      <td width="75%" height="32"><select name="test_id">
				<?php 
				$res=mysqli_query($link,"select * from test");
				while($row=mysqli_fetch_array($res))
				{?>
			<option value="<?php echo $row["test_id"];?>"><?php echo $row["test_name"];?>		</option>
			<?php
				}
			?>
      </select>
        
   
    <tr>
      <td height="26"><div align="left"><strong>Import Excel File </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="file" type="file" id="file" ></td>
    </tr>
        <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value="Add" ></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
