	<?php
session_start();
require("../database.php");
require("IOFactory.php");
include("header.php");
?>


<?php
extract($_POST);


if(@$_POST['submit'] && $_POST['submit']=="Save" || strlen(@$_POST['test_id'])>0)
{
extract($_POST);
$inputfilename=$_FILES['file']['tmp_name'];
$exceldata=array();

try
{
	$inputfiletype=PHPExcel_IOFactory::identify[$inputfilename];
	$objReader=PHPExcel_IOFactory::createReader[$inputfiletype];
	$objPHPExcel=$objReader->load($inputfilename);

}
catch(Exception $e)
{
		die('Error Loading File"'.pathinfo($inputfilename,PATHINFO_BASENAME).'":'.$e->getMessage());
}


$sheet=$objPHPExcel->getSheet(0);
$highestRow=$sheet->getHighestRow();
$highestColumn=$sheet->getHighestColumn();

for($row=1;$row<$highestRow;$row++)
{
	$rowData=$sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
	
	$sql="INSERT INTO `question`(`test_id`, `desc`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`) VALUES ('".$rowData[0][0]."','".$rowData[0][1]."','".$rowData[0][2]."','".$rowData[0][3]."','".$rowData[0][4]."','".$rowData[0][5]."','".$rowData[0][6]."') ";
}





mysqli_query($link,"INSERT INTO `question`(`test_id`, `desc`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`) VALUES ('$test_id','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')") or die(mysql_error($link));
echo "<h1 align=center>Question Added Successfully.</h1>";
unset($_POST);
}
?>
