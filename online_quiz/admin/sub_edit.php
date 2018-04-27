<?php

include "header.php";
	require("../database.php");


	$sub_id = $_REQUEST['sub_id'];
	$query = "select * from subject where sub_id='$sub_id'";
	$result = mysqli_query($link,$query);
	$row = mysqli_fetch_array($result);
	$sub_name = $row['sub_name'];
	
?>
    
    
                <h2>Subject</h2>
       				<center>
                               <h3>Edit Subject</h3>
                                <form enctype="multipart/form-data" action="sub_update.php" method="post" width="50%" id="sub_add">
                                  <input type="hidden" value="<?php echo $sub_id; ?>" name="sub_id" id="sub_id">
                                  
                                  <p>
                                    <label>Subject Name<span class="required">*</span></label>
                                    <input type="text" value="<?php echo $sub_name; ?>" name="sub_name" id="sub_name">
                                  </p>
                                  <p>
                                    <input type="submit" value="Edit" name="edit">
                                  </p>        
                                </form>
                                                     
                            </center>
    </section>