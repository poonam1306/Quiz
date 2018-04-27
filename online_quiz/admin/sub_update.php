<?php
	include "header.php";
		require("../database.php");

	
	$sub_id = $_REQUEST['sub_id'];
	$sub_name = $_REQUEST['sub_name'];
	
	$query = "update subject set sub_name='$sub_name' where sub_id='$sub_id'";
	
	$result = mysqli_query($link,$query);
	if(!$result){
		$message = "sub  Is Not Edited!";
	}else{
		$message = "sub is edited!";
	?>
		<script language="javascript">
			window.location='sub_display.php';
		</script>
	<?php
	}
?>

	 
				
							<h3 align="center"><u><b><i><?php echo $message; ?></i></b></u></h3>
				