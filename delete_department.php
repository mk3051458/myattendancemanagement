<?php 
	include "Controllers/config.php";
	
	$q="delete from departments where department_id='$_REQUEST[department_id]'";
	$res=mysqli_query($con,$q);
	if($res>0){
			header("location:departments.php");
			
		}
		else{
			echo "failure";
		}


?>