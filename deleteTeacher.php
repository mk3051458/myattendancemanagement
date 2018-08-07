<?php 
	include "Controllers/config.php";
	$q="delete from teachers where teacher_id='$_REQUEST[teacher_id]'";
	$res=mysqli_query($con,$q);
	if($res>0){
		echo "Success";
		header("location:addteacher.php");
	}
	else{
		echo "Failure";
	}
?>