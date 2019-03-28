<?php
	 
	include "../Controllers/config.php";
	/*$time_now=mktime(date('h')+5,date('i'),date('s'));
	$date=date('d/m/Y h:i:s a',$time_now);
	$qu="insert into deletedClasses values('','$date','$_SESSION[email]')";
	$ress=mysqli_query($con,$qu);
	if($ress>0){
		$q="delete from subjects where subject_id='$_REQUEST[subject_id]'";
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
	}*/
	$q="delete from subjects where subject_id='$_REQUEST[subject_id]'";
		$res=mysqli_query($con,$q);
		if($res>0){
			
			header("location:subjects.php?msg=Subject deleted successfully.");
		}
			
?>