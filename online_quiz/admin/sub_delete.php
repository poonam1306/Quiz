<?php
	include "header.php";
	require("../database.php");
	
	$sub_id = $_REQUEST['sub_id'];
	
	$query = "DELETE FROM subject WHERE 'sub_id'=$sub_id";
	
	$result = mysqli_query($link,$query);
	if(!$result){
		$message = "Subject  Is Not Deleted!";
	}else{
		$message = "Subject is Deleted!";
	?>
		
	<?php
	}
?>
	<h3 align="center"><u><b><i><?php echo $message; ?></i></b></u></h3>
				</section>

