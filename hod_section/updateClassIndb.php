<?php 
	include "../Controllers/config.php";
	echo $_REQUEST['block']."<br>";
	echo $_REQUEST['department']."<br>";
	echo $_REQUEST['semester']."<br>";
	echo $_REQUEST['class_id']."<br>";


	$q="UPDATE classes SET block_id='$_REQUEST[block]',department_id='$_REQUEST[department]',semester='$_REQUEST[semester]' WHERE class_id='$_REQUEST[class_id]'";
	$res=mysqli_query($con,$q);
	if($res>0){
		echo "Success";
		header("location:class.php?msg=Details updated successfully.");
	}
	else{
		echo "Failure".mysqli_error($con);
	}
?>