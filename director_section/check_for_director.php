<?php 
	session_start();
	include "../Controllers/config.php";
	if(isset($_REQUEST["submit"])){
		$q="select * from directors where email='$_REQUEST[email]' and password='$_REQUEST[password]'";
		$res=mysqli_query($con,$q);
		if($row=mysqli_fetch_array($res)){
			echo "Success";
			$_SESSION['email']=$_REQUEST['email'];
			$_SESSION['director_id']=$row['director_id'];
			header("location:home.php");
		}
		else{
			echo  "<script>window.location.assign('index.php?msg=<strong>Alert! </strong>Wrong email or password.')</script>";
		}
	}
?>