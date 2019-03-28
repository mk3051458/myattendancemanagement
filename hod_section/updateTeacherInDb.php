<?php session_start();
	if(isset($_REQUEST['submit'])){
		
		include "../Controllers/config.php";
		$name=$_REQUEST['name'];
		$address=$_REQUEST['address'];
		$phone=$_REQUEST['contact'];
		$dob=$_REQUEST['dob'];
		$email=$_REQUEST['email'];
		$password=$_REQUEST['Password'];
		
		$q="UPDATE teachers SET name='$name',address='$address',contact_number='$phone',dob='$dob',email='$email',
		password='$password',added_by='$_SESSION[email]' where teacher_id='$_REQUEST[teacher_id]'";
		$res=mysqli_query($con,$q);
		if($res>0){
			header("location:addteacher.php?msg=Teacher's details updated successfully");
		}
		else{
			echo "Failure".mysqli_error($con);
		}
	}

?>