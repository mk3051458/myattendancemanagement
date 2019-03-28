<?php
	
    $con = mysqli_connect("localhost","root","","attendance_management");
    if (!$con)
    {
        echo mysqli_connect_error();
        die();
    }


?>