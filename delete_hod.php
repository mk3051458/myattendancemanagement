<?php 

	include "Controllers/config.php";
	$hod=$_REQUEST['hod_id'];
	$q="delete from hods where hod_id='$hod'";
	$res=mysqli_query($con,$q);
	if($res>0){
		echo "Success";
		header("location:hod.php?msg=HOD deleted successfully.");
		echo "<script>window.location.assign('hod.php?msg=HOD deleted successfully.')</script>";
	}
	else{
		echo "Failure";
	}

?>