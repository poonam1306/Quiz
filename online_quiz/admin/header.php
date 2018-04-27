
<table border="0" width="100%"  bgcolor="#73C6B6">
  <tr>
  <td align="center">
	<h1>Online Quiz</h1>
	</td>
	</tr>
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="black" >
  <tr>
    <td width="100%" border="0" bgcolor="#0E6251" width="89" height="15"></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td aling=right>
	<?php
	if(isset($_SESSION['login']))
	{
	 echo "<div align=\"right\"><strong><a href=\"login.php\">Admin Home</a>|<a href=\"logout.php\">Logout</a></strong></div>";
	 }
	 else
	 {
	 	echo "&nbsp;";
	 }
	?>
	</td>
  </tr>
</table>
