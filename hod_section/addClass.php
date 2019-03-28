<?php session_start();
    if(isset($_REQUEST["submit"])){
        $block=$_REQUEST['block'];
        $department=$_REQUEST['department'];
        $sem=$_REQUEST['semester'];
        echo $block."<br>";
        echo $department."<br>";
        echo $sem."<br>";
        include "../Controllers/config.php";
        $q="insert into classes values('','$block','$department','$sem','$_SESSION[email]')";
        $res=mysqli_query($con,$q);
        if($res>0){
            echo "Success";
            header("location:class.php?msg=Class added successfully.");
        } 

    }

?>