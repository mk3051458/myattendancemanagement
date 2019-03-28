<?php include "Controllers/config.php";
	if(isset($_REQUEST["submit"])){

		$name=$_REQUEST['name'];
		$contact=$_REQUEST['phone'];
		$dob=$_REQUEST['dob'];
		$address=$_REQUEST['address'];
		$email=$_REQUEST['email'];
		$password=$_REQUEST['password'];
		$block=$_REQUEST['block'];
		echo $name."<br>";
		echo $block."<br>";
		echo $contact."<br>";
		echo $dob."<br>";
		echo $address."<br>";
		echo $email."<br>";
		echo $password."<br>";
		$q="UPDATE directors set block_id='$block',name='$name',contact_number='$contact',date_of_birth='$dob',address='$address',email='$email',password='$password' where director_id='$_REQUEST[director_id]'";
		$res=mysqli_query($con,$q);
		if($res>0){
			echo "Success";
			header("location:director.php?msg=Director details updated successfully.");
		}
		else{
			echo "Failure".mysqli_error($con);
		}

	}
?>