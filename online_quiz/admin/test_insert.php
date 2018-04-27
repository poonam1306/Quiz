<?php
require("../database.php");

include("header.php");



if($_POST['submit']=='Save' || strlen($_POST['sub_id'])>0 )
{
extract($_POST);
mysqli_query($link,"insert into test(sub_id,test_name,total_que) values ('$sub_id','$testname','$totque')") or die(mysql_error($link));
echo "<p align=center>Test <b>\"$testname\"</b> Added Successfully.</p>";
unset($_POST);
}
?>