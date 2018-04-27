<table border="0" width="100%" bgcolor="#73C6B6">
  <tr>
  <td align="center">
	<font color="white"><h1>Online Quiz</h1>
	<table width="100%">
  <tr>
    <td aling=right>
	<?php
	if(isset($_SESSION['login']))
	{
	 echo "<div align=\"left\"><strong><a href=\"index.php\">User Home</a>&nbsp;<a align='right' href=\"signout.php\">Logout&nbsp;</a></strong></div>";
	 }
	 else
	 {
	 	echo "&nbsp;";
	 }
	?>
	</td>
  
</table>
	</td>
	
	<tr>
	
</tr>
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="black" >
  <tr>
    <td width="100%" border="0" bgcolor="#0E6251" width="89" height="15"></td>
  </tr>
</table>

</font>
