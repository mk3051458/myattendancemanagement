<?php
		include "../Controllers/config.php";

	if(isset($_REQUEST['submit'])){
		$block=$_REQUEST['block'];
		$department=$_REQUEST['department'];
		$sem=$_REQUEST['semester'];
		$teacher=$_REQUEST['teacher_id'];
		echo $block."<br>";
		echo $department."<br>";
		echo $sem."<br>";
		echo $teacher."<br>";
		$q="select class_id from classes where block_id='$block' and department_id='$department' and semester='$sem'";
		$ress=mysqli_query($con,$q);
		$roww=mysqli_fetch_array($ress);
		$q="insert into class_teachers values('','$block','$department','$sem','$teacher','$roww[class_id]')";
		$res=mysqli_query($con,$q);
		if($res>0){
			echo "Success";
			header("location:classTeachers.php?msg=Class Assigned Successfully");
		}
		else{
			echo "Failure";
		}

	}
?>