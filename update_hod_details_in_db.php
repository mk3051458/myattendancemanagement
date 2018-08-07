<?php 
	if(isset($_REQUEST['submit'])){
		include "Controllers/config.php";
		$block=$_REQUEST['block'];
		$department=$_REQUEST['department'];
		$name=$_REQUEST['name'];
		$phone=$_REQUEST['phone'];
		$address=$_REQUEST['address'];
		$dob=$_REQUEST['dob'];
		$email=$_REQUEST['email'];
		$password=$_REQUEST['password'];
		$q="UPDATE hods SET block_id='$block',department_id='$department',name='$name',address='$address',date_of_birth='$dob',phone='$phone',email='$email',password='$password' where hod_id='$_REQUEST[hod_id]'";
		$res=mysqli_query($con,$q);
		if($res>0){
			header("location:hod.php?msg=HOD details updated successfully");
			echo "<script>window.location.assign('hod.php?msg=HOD details updated successfully')/script>";
			
		}
	}
	else{
		echo "<script>wondow.location.assign('hod.php?msg=Please fill this first.')</script>";
		
	}
?>