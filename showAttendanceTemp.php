 <style>
        .dataHeight{
            min-height: 10px !important;
        }
    </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php 

   	 
    include "/Controllers/config.php"; 
    include "header.php";
	if(isset($_REQUEST['submit'])){
			$q1="select class_id from classes where block_id='$_REQUEST[block]' and department_id='$_REQUEST[department]' and semester='$_REQUEST[semester]'";
			$res1=mysqli_query($con,$q1);
			if($row1=mysqli_fetch_array($res1)){
				$_SESSION['class']=$row1['class_id'];
				$q7="select attendance from daily_attendance where class_id='$row1[class_id]'";
				$res7=mysqli_query($con,$q7);
				if($row7=mysqli_fetch_array($res7)){
				?>
				
	    		<div class="right_col dataHeight" role="main">
	        		<div class="row" >
	            		<div class="x_panel">
	                    	<div class="x_title">
	                        	<h2>class Information</h2>         
	                        	<ul class="nav navbar-right panel_toolbox">
	                            	<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	                            	</li>

	                        	</ul>
	                        	<div class="clearfix"></div>
	                    	</div>
	                    	<div class="x_content" style="overflow:auto">
	                        	<p class="text-muted font-13 m-b-30">
	                            	Below Table show the information about the class Attendance of following details.
	                        	</p>
	                        
	                        	<table id="datatable" class="table table-striped table-bordered table-responsive">
	                            	<thead>
	                                	<tr>
									 	<?php
									 		echo "<th>Subjects</th>";
									 		echo "<th>Subject Code</th>";	
											echo "<th>>=90%</th>";
											echo "<th>>=80%,<90</th>";
											echo "<th>>=70%,<80%</th>";
											echo "<th>>=60%,<70%</th>";
											echo "<th>>=60%,<70%</th>";
											echo "<th>>=50%,<60%</th>;";
											echo "<th>>=40%,<50%</th>";
											echo "<th>>=30%,<40%</th>";
											echo "<th>>=20%,<30%</th>";
											echo "<th>>=0%,<10%</th>";
											echo "<th>Above 75%</th>";

											echo "<th>>Average %</th>";
										?>										
										</tr>
									</thead>
							    	<tbody>
							    		<?php
											$chart_data = '';

											$q2="select * from subjects where class_id='$row1[class_id]' ORDER BY name";

											$res2=mysqli_query($con,$q2);
											while($row2=mysqli_fetch_array($res2)){
												echo "<tr><td>".$row2['name']."</td>";
												echo "<td>".$row2['subject_code']."</td>";

												$above90=0;
												$above80=0;
												$above70=0;
												$above60=0;
												$above50=0;
												$above40=0;
												$above30=0;
												$above20=0;
												$above10=0;
												$above0=0;
												$above75=0;
												$temp=0;
												$students=0;
												$q3="select * from students where class_id='$row1[class_id]'";
												$res3=mysqli_query($con,$q3);
												while($row3=mysqli_fetch_array($res3)){
													$students++;
													$total=0;
													$attend=0;
													$per=0;
													$q4="select * from daily_attendance where class_id='$row1[class_id]' and subject_code='$row2[subject_code]'";
													$res4=mysqli_query($con,$q4);

													while($row4=mysqli_fetch_array($res4)){
														$total=$total+1;
														$a = $row4['attendance'];
														$ech = explode(",",$a);
														if(in_array($row3['university_roll_no'], $ech)){
														    $attend++;
														}
													}
													if($total){
														$per=round(($attend/$total)*100);
														$temp=$temp+$per;
													}
													if($per>=90){
														$above90++;
														$above75++;
													}
													elseif($per>=80){
														$above75++;
														$above80++;
													}
													elseif($per>=70){
														if($per>=75){
															$above75++;
														}
													}
													elseif($per>=60){
														$above60++;
													}
													elseif($per>=50){
														$above50++;
													}
													elseif($per>=40){
														$above40++;
													}
													elseif($per>=30){
														$above30++;
													}
													elseif($per>=20){
														$above20++;
													}
													elseif($per>=10){
														$above10++;
													}
													else{
														$above0++;
													}
												}

												echo "<td>".$above90."</td>";
												echo "<td>".$above80."</td>";
												echo "<td>".$above70."</td>";
												echo "<td>".$above60."</td>";
												echo "<td>".$above50."</td>";
												echo "<td>".$above40."</td>";
												echo "<td>".$above30."</td>";
												echo "<td>".$above20."</td>";
												echo "<td>".$above10."</td>";
												echo "<td>".$above0."</td>";
												echo "<td>".$above75."</td>";
								              
								                $average=(($temp)/$students);
												echo "<td>".round($average)."</td></tr>";
												
												$chart_data .= "{ subject:'".$row2["subject_code"]."', average:".round($average)."}, ";
											}
										?>
									</tbody>
								</table>
								

	                        </div>
	                        <div class="container" style="margin:10px;width:600px">
   									<br><br><br><h4 style="margin-top: 10px">Graph showing average attendance of different subjects.</h4>   
   									
  									
   									<div id="chart"></div>
   								</div>        
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="x_content">
	                    	<div>
	                    		<form action="showAttendance.php" method="POST"> 
	                    			<input type="submit" value="Show details" class="btn btn-primary" name="submit"> </a>
	                    		</form>
	                    	</div>
	                        <div style="height:140px"></div>
	                    </div>
	                </div>
	            </div>
	       
    <?php
    		}
    		else{
			header("location:checkAttendance.php?msg=No data available.");

    		}
		}
		else{
			header("location:checkAttendance.php?msg=Please select a valid class.");
		}

	}
	else{
			header("location:checkAttendance.php?msg=Please Fill this first.");
		
	}

?>                                                    
<?php
    require 'footer.php';
?>
<?php 


$chart_data = substr($chart_data, 0, -2);
echo $chart_data
?>
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'subject',
 ykeys:['average'],
 labels:['average attendance', 'average'],
 hideHover:'auto',
 stacked:true,
});	
</script>