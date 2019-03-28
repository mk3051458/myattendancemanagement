<?php 
	$con=mysqli_connect("localhost","root","","attendance_management");
	$q="delete from class_teachers where classTeacher_id='$_REQUEST[classTeacher_id]'";
	$res=mysqli_query($con,$q);
	if($res>0){
		echo "Success";
		header("location:classTeachers.php?msg=Record deleted successfully.");
	}
	else{
		echo "Failure";
	}
?>