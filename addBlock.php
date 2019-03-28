<?php 
	if(isset($_REQUEST['submit'])){
		include "Controllers/config.php";
		$block=$_REQUEST['block'];
		$q="insert into blocks values('','$block')";
		$res=mysqli_query($con,$q);
		if($res>0){
			header("location:blocks.php");
		}
		else{
			echo "failure";
		}
	}
	else{
		header("location:blocks.php");
	}

?> nbS