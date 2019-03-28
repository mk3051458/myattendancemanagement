<?php 
	include "Controllers/config.php";
	if(isset($_REQUEST['submit'])){
		session_start();
		$cur=$_REQUEST['current_password'];
		$new=$_REQUEST['new_password'];
		$re_new=$_REQUEST['re_enter_new_password'];
		echo $cur."<br>";
		echo $new."<br>";
		echo $re_new."<br>";

		$q="select * from admin";
		$res=mysqli_query($con,$q);
		if($row=mysqli_fetch_array($res)){
			if($row['password']!=$cur){
				header("location:changePassword.php?msg=Please enter current password correctly.");
			}
			elseif($new!=$re_new){
				header("location:changePassword.php?msg=New Passsword and re-entry of new password mismatched.");
			}
			else{
				$qu="UPDATE admin SET password='$new'";
				$res1=mysqli_query($con,$qu);
				if($res1>0){
					echo "Success";
					header("location:home.php?msg=Password Changed successfully.");
				}
				else{
					echo "Failure";
				}
			}
		}
	}
?>