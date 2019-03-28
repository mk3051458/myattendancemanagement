<?php session_start();
	if(isset($_REQUEST['submit'])){
		include "../Controllers/config.php";
		$block=$_REQUEST['block_id'];
		$department=$_REQUEST['department'];
		$name=$_REQUEST['name'];
		$address=$_REQUEST['address'];
		$phone=$_REQUEST['phone'];
		
		$email=$_REQUEST['email'];
		$password=$_REQUEST['password'];
		$dob=$_REQUEST['dob']	;																																											
		

		$q="insert into hods values('','$block','$department','$name','$address','$dob','$phone','$email','$password','$_SESSION[email]')";
		$res=mysqli_query($con,$q);
		if($res>0){
			
		   echo "<script>window.location.assign('hod.php?msg=HOD added successfully.')</script>";

		}
		
	}
	else{
		echo "<script>window.location.assign('hod.php')</script>";

	
	}	
?>