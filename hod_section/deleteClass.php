<?php
	session_start(); 
	include "../Controllers/config.php";
	$time_now=mktime(date('h')+5,date('i'),date('s'));
	$date=date('d/m/Y h:i:s a',$time_now);
	$qu="insert into deletedClasses values('','$date','$_SESSION[email]')";
	$ress=mysqli_query($con,$qu);
	if($ress>0){
		$q="delete from classes where class_id='$_REQUEST[class_id]'";
		$res=mysqli_query($con,$q);
		if($res>0){
			echo "Success";
			header("location:class.php");
		}
		else{
			echo "Failure";
		}
	}
	else{
		echo "out failure";
	}
?>