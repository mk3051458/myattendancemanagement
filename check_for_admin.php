<?php 
	if (isset($_POST['submit'])) {
        require 'Controllers/config.php';

        $pass = $_POST["password"];
		// 'or''='
		//"select * from admin where email=''or''='' and password=''or''='' "
        $query = mysqli_query($con,"select * from admin where email='$_POST[email]' and password='$pass' ");
        if (mysqli_num_rows($query)>0){

            $row = mysqli_fetch_array($query);

            session_start();
            
            $_SESSION['email']=$row[0];
            echo "<script>window.location.assign('home.php')</script>";
            
        }
        else{
            $msg = " Wrong Username/Password";
            echo "<script>window.location.assign('admin_login.php?msg=$msg')</script>";

            
        }

    }

?>