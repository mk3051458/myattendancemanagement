<?php 
	session_start();
	include "../Controllers/config.php";
	//use Spout\Reader\ReaderFactory;
		use Box\Spout\Reader\ReaderFactory;
		use Box\Spout\Common\Type;
		 
		// Include Spout library 
		require_once '../Spout/Autoloader/autoload.php';
	//if(isset($_REQUEST['upload'])){

		if (!empty($_FILES['files']['name'])){   
		    // Get File extension eg. 'xlsx' to check file is excel sheet
		    $pathinfo = pathinfo($_FILES["files"]["name"]);
		    echo "path".$_FILES["files"]["name"];
		    // check file has extension xlsx, xls and also check file is not empty
		   if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls') && ($_FILES['files']['size'] > 0) ) {
		         // Temporary file name
		        $inputFileName = $_FILES['files']['tmp_name']; 
		        // Read excel file by using ReadFactory object.
		        $reader = ReaderFactory::create(Type::XLSX);
		        // Open file
		        $reader->open($inputFileName);
		        $count = 1;
		        $rows = array(); 
		        // Number of sheet in excel file
		        foreach ($reader->getSheetIterator() as $sheet) {
		            // Number of Rows in Excel sheet
		            foreach ($sheet->getRowIterator() as $row) {
		                // It reads data after header. In the my excel sheet, 
		                // header is in the first row. 
		                if ($count > 1) { 
		                	
		                    $data['name']=$row[0];
		                    $data['address']=$row[1];
		                    $data['phone']=$row[2];

		                    $data['date_of_birth']=$row[3];
		                    $data['email']=$row[4];
		                    $data['password']=$row[5];
		                    // Push all data into array to be insert as  batch into MySql database.  
		                    array_push($rows, $data);
		                }
		                $count++;
		            }          
		        }
				$q="select block_id,department_id from hods where hod_id='$_SESSION[hod_id]'";
				$ro=mysqli_query($con,$q);
				$rr=mysqli_fetch_array($ro);
				$c5=$rr['block_id'];
				$c6=$rr['department_id'];
				foreach($rows as $r){
					$c1 = $r['name'];
					$c2 = $r['address'];
					$c3 = $r['phone'];		
							
					$c4 = $r['date_of_birth'];
					$c7 = $r['email'];		
					$c8 = $r['password'];		

					$k =mysqli_query($con,"INSERT INTO `teachers`  VALUES('','$c1','$c2','$c3','$c4','$c5','$c6','$c7','$c8','$_SESSION[email]') ");
		            if ($k<=0)
		            {
		                echo mysqli_error($con);
		                die();
		            }
				}
		        // Close excel filew
		        $reader->close();
		        echo "<script>window.location.assign('addteacher.php?msg=Teachers added successfully.')</script>";
				
		 	}
		      else {
		 
		        // echo $pathinfo['extension'].$_FILES['files']['size']."Gaurav";
		        echo "<script>window.location.assign('addteacher.php?msg=Please Select Valid Excel File containing teachers details.')</script>";
				
		     }
	 
	} 

	elseif(isset($_REQUEST['submit'])){
		
		$name=$_REQUEST['name'];
		$address=$_REQUEST['address'];
		$phone=$_REQUEST['contact'];
		
		$email=$_REQUEST['email'];
		$password=$_REQUEST['Password'];
		$dob=$_REQUEST['dob'];
		$q="select block_id,department_id from hods where hod_id='$_SESSION[hod_id]'";
		$ro=mysqli_query($con,$q);
		$rr=mysqli_fetch_array($ro);
		$c5=$rr['block_id'];
		$c6=$rr['department_id'];
		$q="insert into teachers values('','$name','$address','$phone','$dob','$c5','$c6','$email','$password','$_SESSION[email]')";
		$res=mysqli_query($con,$q);
		if($res>0){
			header("location:addteacher.php?msg=Teacher added successfully.");
			echo "<script>window.location.assign('addteacher.php?msg=Teacher added successfully.')</script>";
		}
		else{
			echo "Failure".mysqli_error($con);
		}

	}
	else{
		header("location:addteacher.php");
		echo "<script>window.location.assign('addteacher.php')</script>";
	}

?>