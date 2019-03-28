<?php 
	if(isset($_REQUEST['submit'])){
		include "Controllers/config.php";
		$block=$_REQUEST['block'];
		echo $block;
		
		$q="UPDATE blocks SET block_name='$block' where block_id='$_REQUEST[block_id]'";
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
?>