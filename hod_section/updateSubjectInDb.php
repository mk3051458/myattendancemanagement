<?php 
	if(isset($_REQUEST['submit'])){
			include "../Controllers/config.php";

		$name=$_REQUEST['name'];
		$sub_code=$_REQUEST['subject_code'];
		$block=$_REQUEST['block'];
		$department=$_REQUEST['department'];
		$sem=$_REQUEST['semester'];
		$teacher=$_REQUEST['teacher_id'];
		$qu="select * from classes where department_id='$department' and block_id='$block' and semester='$sem'";
		$ress=mysqli_query($con,$qu);
		if($row1=mysqli_fetch_array($ress)){
			$q="UPDATE subjects set name='$name',subject_code='$sub_code',block_id='$block',department_id='$department',semester='$sem',class_id='$row1[class_id]',teacher_id='$teacher' where subject_id='$_REQUEST[subject_id]'";
			$res=mysqli_query($con,$q);
			if($res>0){
				echo "Success";
				header("location:subjects.php?msg=Subject Updated successfully.");
			}
			else{
				echo "Failure".mysqli_error($con);
			}
			
		}
		else{
				header("location:subjects.php?msg=Please select a valid class.");

		}
	}
?>