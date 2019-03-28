<?php 
    
    include "../Controllers/config.php"; 
    require('../fpdf181/fpdf.php');
	$a="First Line";
	$b="Second Line";
	$pdf = new FPDF("L","mm","A4");
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	
	//$pdf->Cell(60,20,"{$b}",1,1,"R");
	//$pdf->write(5,$a);
// 	function ImprovedTable($header, $data)
// {
//     // Column widths
//     $w = array(40, 35, 40, 45);
//     // Header
//     for($i=0;$i<count($header);$i++)
//         $this->Cell($w[$i],7,$header[$i],1,0,'C');
//     $this->Ln();
//     // Data
//     foreach($data as $row)
//     {
//         $this->Cell($w[0],6,$row[0],'LR');
//         $this->Cell($w[1],6,$row[1],'LR');
//         $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
//         $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
//         $this->Ln();
//     }
//     // Closing line
//     $this->Cell(array_sum($w),0,'','T');
// }

   	$q="select * from classes where class_id='$_REQUEST[class]'";
	$res=mysqli_query($con,$q);
	if($row=mysqli_fetch_array($res)){
		$temp=0;
		$sno=1;
		$class=$row['class_id'];
		$pdf->Cell()
		$qu="select * from subjects where class_id='$class'";
		$res1=mysqli_query($con,$qu);
		while($row1=mysqli_fetch_array($res1)){
			// Column headings
			
			// Data loading
			
			$pdf->SetFont('Arial','',14);
			
			
		
			
			echo "<th>";
			echo "<table class='table table-responsive'><tr><td colspan='3'>".$row1[1]."</td></tr><tr>";
			echo "<td>Delivered</td>";
			echo "<td>Attended</td>";
			echo "<td>Percentage</td>";
			$temp++;
			echo "</tr></table>";
			echo "</th>";
		}				
		// $qu1="select * from students where class_id='$class'";
		// $res2=mysqli_query($con,$qu1);
		// while($row2=mysqli_fetch_array($res2)){
		// 	echo "<tr><td>$sno</td>";
		// 	$sno++;
		// 	echo "<td>".$row2['university_roll_no']."</td>";
		// 	echo "<td>".$row2['name']."</td>";
		// 	$qu="select * from subjects where class_id='$class'";
		// 	$res1=mysqli_query($con,$qu);
		// 	while($row1=mysqli_fetch_array($res1)){
		// 		$qu1="select * from daily_attendance where class_id='$row[class_id]' and     subject_code='$row1[subject_code]'";
		// 		$res3=mysqli_query($con,$qu1);
		// 		$total=0;
		// 		$attend=0;
		// 		while($row3=mysqli_fetch_array($res3)){
		// 		    $total=$total+1;
		// 		    $a = $row3['attendance'];
		// 		    $ech = explode(",",$a);
		// 		    if(in_array($row2['university_roll_no'], $ech)){
		// 		        $attend++;
		// 		    }
		// 		}
		// 		echo "<td>";
		// 		echo "<table class='table table-responsive'><tr>";
		// 		echo "<td><td>$total</td></td>";
		// 		echo "<td>$attend</td>";									
		// 		if($total==0){
		// 			echo "<td>".$total."</td>";
		// 		}
		// 		else{
		// 			$per=($attend/$total)*100;
		// 			echo "<td>".round($per)."</td>";
		// 		}
		// 		echo "</tr></table>";
		// 		echo "</td>";
				      
		// 	}
		// 	echo "</tr>";
		}
	$pdf->Output();

	

unset($_SESSION["class"]);

?>