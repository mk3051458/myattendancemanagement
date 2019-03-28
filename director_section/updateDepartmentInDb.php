<?php 
	 
	if(isset($_REQUEST['submit'])){
		include "../Controllers/config.php";
		
		$department=$_REQUEST['department'];
		
		
		
		echo $department;
		
		$q="UPDATE departments SET department_name='$department' where department_id='$_REQUEST[department_id]'";
		$res=mysqli_query($con,$q);
		if($res>0){
			
			header("location:departments.php?msg=Department details updated successfully.");
		}
		else{
			echo "failure";
		}
	}
	else{
		header("location:blocks.php");
	}
?>