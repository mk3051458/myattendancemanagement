<?php 
	include "Controllers/config.php";
	$id=$_REQUEST['director_id'];
	
	$qu="select * from directors where director_id='$id'";
	$res=mysqli_query($con,$qu);
	if($row=mysqli_fetch_array($res)){
		$q="insert into deleted_directors value('$row[director_id]','$row[block_id]','$row[name]','$row[contact_number]','$row[date_of_birth]','$row[address]','$row[email]','$row[password]')";
		$res=mysqli_query($con,$q);
		if($res>0){
			echo "Success";
			$q1="delete from directors where director_id='$id'";
			$res1=mysqli_query($con,$q1);
			if($res>0){
				echo "Data deleted";
				header("location:director.php?msg=Director deleted successfully.");
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