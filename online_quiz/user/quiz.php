<?php
session_start();
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
/*$rs=mysqli_query("select * from mst_question where test_id=$tid",$cn) or die(mysqli_error());
if($_SESSION[qn]>mysqli_num_rows($rs))
{
unset($_SESSION[qn]);
exit;
}*/
if(isset($subid) && isset($testid))
{
$_SESSION[sid]=$subid;
$_SESSION[tid]=$testid;
header("location:quiz.php");
}
if(!isset($_SESSION[sid]) || !isset($_SESSION['tid']))
{
	header("location: index.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
</style>
<title>Online Quiz</title>
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>

<script>
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        display.textContent = minutes + ":" + seconds;
		 if (--timer < 0) {
            timer = window.location="result.php";
        }
		
    }, 1000);
}
  window .onload = function () {
	var Minutes = 60 * 0.5,
        display = document.querySelector('#time');
    startTimer(Minutes, display);	
};
</script>
<?php
include("header.php");


$query="select * from question";

$rs=mysqli_query($link,"select * from question where test_id=$tid ORDER BY rand()") or die(mysqli_error($link));
if(!isset($_SESSION['qn']))
{
	$_SESSION['qn']=0;
	mysqli_query($link,"delete from useranswer where sess_id='" . session_id() ."'") or die(mysqli_error($link));
	$_SESSION['trueans']=0;
	
}
else
{	
		if(@$submit=='Next Question' && isset($ans))
		{
				mysqli_data_seek($rs,$_SESSION['qn']);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($link,"INSERT INTO `useranswer`(`sess_id`, `test_id`, `desc`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`, `your_ans`) VALUES 	('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error($link));
				if($ans==$row[7])
				{
							$_SESSION['trueans']=$_SESSION['trueans']+1;
				}
				$_SESSION['qn']=$_SESSION['qn']+1;
		}
		else if(@$submit=='Get Result' && isset($ans))
		{
				mysqli_data_seek($rs,$_SESSION['qn']);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($link,"INSERT INTO `useranswer`(`test_id`, `desc`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`, `your_ans`) VALUES ($tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error($link));
				if($ans==$row[7])
				{
							$_SESSION['trueans']=$_SESSION['trueans']+1;
				}
				echo "</br></br><center><div id='frmLogin'><h1 class=head1> Result</h1>";
				$_SESSION['qn']=$_SESSION['qn']+1;
				echo "</br><center><div id='frmLogin'><Table align='center'><tr class=tot><td>Total Question $_SESSION[qn]";
				echo "<tr class=tans><td>True Answer<td>".$_SESSION['trueans'];
				$w=$_SESSION['qn']-$_SESSION['trueans'];
				echo "<tr class=fans><td>Wrong Answer<td> ". $w;
				echo "</table></div></center>";
				mysqli_query($link,"INSERT INTO `result`(`username`, `test_id`, `test_date`, `score`) VALUES('$login',$tid,'".date("d/m/Y")."',$_SESSION[trueans])") or die(mysqli_error($link));
				
				unset($_SESSION['qn']);
				unset($_SESSION['sid']);
				unset($_SESSION['tid']);
				unset($_SESSION['trueans']);
				exit;
		}
}
$rs=mysqli_query($link,"select * from question where test_id=$tid order by rand()") or die(mysqli_error($link));
if($_SESSION['qn']>mysqli_num_rows($rs)-1)
{
unset($_SESSION['qn']);
echo "<h1 class=head1>Some Error  Occured</h1>";
session_destroy();
echo "Please <a href=index.php> Start Again</a>";

exit;
}
mysqli_data_seek($rs,$_SESSION['qn']);
$row= mysqli_fetch_row($rs);
echo "</br></br><center><div id='frmLogin'><form name=myfm method=post action=quiz.php>";
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
$n=$_SESSION['qn']+1;
echo "<tR><td><span class=style2>Que ".  $n .": $row[2]</style>";
echo "<tr><td class=style8><input type=radio name=ans value=1>$row[3]";
echo "<tr><td class=style8> <input type=radio name=ans value=2>$row[4]";
echo "<tr><td class=style8><input type=radio name=ans value=3>$row[5]";
echo "<tr><td class=style8><input type=radio name=ans value=4>$row[6]";

if($_SESSION['qn']<mysqli_num_rows($rs)-1)
echo "<tr><td><input type=submit name=submit value='Next Question'></form>";
else
echo "<tr><td><input type=submit name=submit value='Get Result'></form>";
echo "</table></table></div></center>";
?>
<div align="right">Remaining Time <span id="time"></span> </div>    
</body>
</html>