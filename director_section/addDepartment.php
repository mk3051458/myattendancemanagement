<?php session_start();
	if(isset($_REQUEST['submit'])){
		include "../Controllers/config.php";
		$qu="select block_id from directors where director_id='$_SESSION[director_id]'";
		$ress=mysqli_query($con,$qu);
		$row1=mysqli_fetch_array($ress);
		$block=$row1['block_id'];
		$department=$_REQUEST['department'];

		$q="insert into departments values('','$block','$department','$_SESSION[email]')";
		$res=mysqli_query($con,$q);
		if($res>0){
		   
		    echo "<script>window.location.assign('departments.php?msg=Department added successfully.')</script>";
		}
		
	}

	else{
		echo "<script>window.location.assign('departments.php')</script>";

		
	}


?>