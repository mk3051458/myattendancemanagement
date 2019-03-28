<?php session_start();
	if(isset($_REQUEST['submit'])){
		include "../Controllers/config.php";
		$name=$_REQUEST['name'];		
		$sub_code=$_REQUEST['subject_code'];
		$sem=$_REQUEST['semester'];
		$teacher=$_REQUEST['teacher_id'];
		$q="select * from hods where email='$_SESSION[email]'";
		$res=mysqli_query($con,$q);
		if($row=mysqli_fetch_array($res)){
			$qu="select * from classes where department_id='$row[department_id]' and block_id='$row[block_id]' and semester='$sem'";
			$ress=mysqli_query($con,$qu);
			if($row1=mysqli_fetch_array($ress)){
				if( (strpos($_REQUEST["subject_code"], '(T)') !== false ) || (strpos($_REQUEST["subject_code"], '(t)') !== false )){
    				
				
					$q="insert into tutorialsubjects value('','$name','$sub_code','$row[block_id]','$row[department_id]','$sem','$row1[class_id]','$teacher')";
					$res=mysqli_query($con,$q);
					if($res>0){
						echo "Success subject ";
						header("location:subjects.php?msg=Subject added successfully.");
					}
					else{
						echo "Error subject".mysqli_error($con);
					}
				}
				else{
					$q="insert into subjects value('','$name','$sub_code','$row[block_id]','$row[department_id]','$sem','$row1[class_id]','$teacher')";
					$res=mysqli_query($con,$q);
					if($res>0){
						echo "Success tutorial";
						header("location:subjects.php?msg=Subject added successfully.");
					}
					else{
						echo "Error subject".mysqli_error($con);
					}

				}
				
			}
			else{
					header("location:subjects.php?msg=Please select a valid class.");

			}
		}
	}
?>