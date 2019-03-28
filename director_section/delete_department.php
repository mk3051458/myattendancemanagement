<?php session_start();
	include "../Controllers/config.php";
	$date=date("Y:m:d");
	echo $date;
	$qu="select * from departments where department_id='$_REQUEST[department_id]'";
	$res=mysqli_query($con,$qu);
	$row=mysqli_fetch_array($res);
	$q="insert into deleted_departments value('','$row[department_id]','$row[department_name]','$_SESSION[email]',now())";
	$ress=mysqli_query($con,$q);

	$q="delete from departments where department_id='$_REQUEST[department_id]'";
	$res=mysqli_query($con,$q);
	if($res>0){
			header("location:departments.php?msg=Department deleted successfully.");
			
	}
	else{
		echo "failure";
	}


?>