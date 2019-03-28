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

		
		echo $block;
		echo $department;
		echo $name;
		echo $phone;
		echo $address;
		echo $dob;
		echo $email;
		echo $password;

		$q="UPDATE hods SET block_id='$block',department_id='$department',name='$name',address='$address',date_of_birth='$dob',phone='$phone',email='$email',password='$password' where hod_id='$_REQUEST[hod_id]'";
		$res=mysqli_query($con,$q);
		if($res>0){
			echo "Success";
			header("location:hod.php");
		}
		else{
			echo "failure";
		}
	}
	else{
		header("location:blocks.php");
	}
?>