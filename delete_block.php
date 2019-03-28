<?php 
	include "Controllers/config.php";
	$q="select * from blocks where block_id='$_REQUEST[block_id]'";
	$res=mysqli_query($q);
	
	$q1="delete from blocks where block_id='$_REQUEST[block_id]'";
	$res1=mysqli_query($con,$q1);
	if($res1>0){
			header("location:blocks.php");
			
		}
		else{
			echo "failure";
		}
?>