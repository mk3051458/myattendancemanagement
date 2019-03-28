<?php session_start();																							
	include "../Controllers/config.php";
	
	
	$qu="select * from hods where hod_id='$_REQUEST[hod_id]'";
	$res=mysqli_query($con,$qu);
	if($row=mysqli_fetch_array($res)){
		$q="insert into deleted_hods value('','$row[hod_id]','$row[block_id]','$row[department_id]','$row[name]','$row[phone]','$row[date_of_birth]','$row[address]','$row[email]','$_SESSION[email]',now())";
		$res=mysqli_query($con,$q);
		if($res>0){
			echo "Success";
			$q1="delete from hods where hod_id='$_REQUEST[hod_id]'";
			$res1=mysqli_query($con,$q1);
			if($res>0){
				echo "Data deleted";
				header("location:hod.php?msg=HOD deleted successfully.");
			}
		}

		else{
			echo "Failure".mysqli_error($con);
		}
	}
	else{
		echo "Out Failure".mysqli_error($con);
	}
?>