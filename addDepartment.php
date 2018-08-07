<?php
//use Spout\Reader\ReaderFactory;
		use Box\Spout\Reader\ReaderFactory;
		use Box\Spout\Common\Type;
		 
		// Include Spout library 
		require_once 'Spout/Autoloader/autoload.php';
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
		                	$data['block_name'] = $row[0];
		                    $data['department_name'] = $row[1];
		                    // Push all data into array to be insert as  batch into MySql database.  
		                    array_push($rows, $data);
		                }
		                $count++;
		            }          
		        }
		        $con=mysqli_connect("localhost","root","","admin_panel");
				foreach($rows as $r){
					$name = $r['block_name'];
					$c1 = $r['department_name'];		
					$k =mysqli_query($con,"INSERT INTO `departments`  VALUES('','$name','$c1') ");
		            if ($k<=0)
		            {
		                echo mysqli_error($con);
		                die();
		            }
				}
		        // Close excel filew
		        $reader->close();
		        echo "<script>window.location.assign('departments.php?msg=Deparments added succesfuly.')</script>";
				
		 	}
		      else {
		 
		        // echo $pathinfo['extension'].$_FILES['files']['size']."Gaurav";
		        echo "<script>window.location.assign('departments.php?msg=Please Select Valid Excel File containing departments detail.')</script>";
						     }
	 
	} 


	
	elseif(isset($_REQUEST['submit'])){
		include "Controllers/config.php";
		$block=$_REQUEST['block'];
		$department=$_REQUEST['department'];

		$q="insert into departments values('','$block','$department')";
		$res=mysqli_query($con,$q);
		if($res>0){
		    echo "<script>window.location.assign('departments.php?msg=Department added successfully.')</script>";
			
			
		}
		
	}

	else{
		echo "<script>window.location.assign('departments.php')</script>";

		
	}


?>