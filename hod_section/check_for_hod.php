<?php 
	if (isset($_POST['submit'])) {
        require '../Controllers/config.php';

       
        function protect($string){
            $string=addslashes($string);
            $string=strip_tags($string);
                
            $string=mysql_real_escape_string(trim(strip_tags(addslashes($string))));
           
            return $string;
        }
        $pass = protect($_POST["password"]);
        // $p=base64_encode($pass);
        // $e=base64_encode($_POST["email"]);
        $q="select * from hods where email='$_POST[email]' and password='$pass' ";
        $query = mysqli_query($con,$q);
        
        if (mysqli_num_rows($query)>0){

            $row = mysqli_fetch_array($query);

            session_start();
            
            $_SESSION['email']=$_POST['email'];
            $_SESSION['hod_id']=$row['hod_id'];
            
            header("location:home.php");
        }
        else{
            $msg = "<strong>Alert!</strong> Wrong Username/Password".mysqli_error($con);
           
            header("location:index.php?msg=$msg");
        }

    }

?>