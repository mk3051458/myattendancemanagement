<?php 
	 
	if(isset($_REQUEST['submit'])){
		include "Controllers/config.php";
		$block=$_REQUEST['block'];
		$department=$_REQUEST['department'];
		
		
		echo $block;
		echo $department;
		
		$q="UPDATE departments SET block_id='$block',department_name='$department' where department_id='$_REQUEST[department_id]'";
		$res=mysqli_query($con,$q);
		if($res>0){
			echo "Success";
			header("location:departments.php");
		}
		else{
			echo "failure";
		}
	}
	else{
		header("location:blocks.php");
	}
?>