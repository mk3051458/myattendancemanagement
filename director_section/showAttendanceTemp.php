 <style>
        .dataHeight{
            min-height: 10px !important;
        }
    </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php 

   	 
    include "../Controllers/config.php"; 
    include "header.php";
	
		
		$chart=0;
		$q1="select * from classes where block_id='$_REQUEST[block]' and department_id='$_REQUEST[department]' ";
		$res1=mysqli_query($con,$q1);
		while($row1=mysqli_fetch_array($res1)){
			$_SESSION['class']=$row1['class_id'];
			$q7="select attendance from daily_attendance where class_id='$row1[class_id]'";
			$res7=mysqli_query($con,$q7);
			if($row7=mysqli_fetch_array($res7)){
			?>
			
	    		<div class="right_col dataHeight" role="main">
	    			<div class="row" >
	            		<div class="x_panel">
	                    	<div class="x_title">

	                        	<h2><?php echo "Class Id : ".$row1['class_id'];?></h2>         
	                        	<ul class="nav navbar-right panel_toolbox">
	                            	<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	                            	</li>

	                        	</ul>
	                        	<div class="clearfix"></div>
	                    	</div>
	                    	<div class="x_content" style="overflow:auto;height:auto">

	                        	                        
	                        	<?php
	                        		
											$chart_data = '';
											$chart++;

											$q2="select * from subjects where class_id='$row1[class_id]' ORDER BY name";

											$res2=mysqli_query($con,$q2);
											while($row2=mysqli_fetch_array($res2)){
												
												$above90=0;
												$above80=0;
												$above75=0;
												$above70=0;
												$above65=0;
												$above60=0;
												$above50=0;
												$above40=0;
												$above30=0;
												$below30=0;
												$temp=0;
												$clear=0;
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
													$group=0;
						                    $qu3="select students,groupNo from tutorialgroups where classId='$row1[class_id]'";
						                    $res5=mysqli_query($con,$qu3);
						                    while($row5=mysqli_fetch_array($res5)){
						                    	$ab1 = $row5['students'];
							                    $ech2 = explode(",",$ab1);
							                    if(in_array($row3['university_roll_no'], $ech2)){
							                       $group=$row5['groupNo'];
							                       break;
							                      }
						                    	
						                    }
						                    $qu2="select * from tutorialattendance where class_id='$row1[class_id]' and subject_code='$row2[subject_code](T)' and groupNo='$group' or class_id='$row1[class_id]' and subject_code='$row2[subject_code](t)' and groupNo='$group'or class_id='$row1[class_id]' and subject_code='$row2[subject_code]' and groupNo='$group'";
						                    $res4=mysqli_query($con,$qu2);
						                    while($row4=mysqli_fetch_array($res4)){
							                    $total=$total+1;
							                    $ab = $row4['attendance'];
							                    $ech1 = explode(",",$ab);
							                    if(in_array($row3['university_roll_no'], $ech1)){
							                        $attend++;
							                      }
						                    }
													if($total){
														$per=round(($attend/$total)*100);
														$temp=$temp+$per;
													}
													if($per>=90 and $per<=100){
														$above90++;
														$clear++;
													}
													elseif($per>=80 and $per<90){
														$clear++;
														$above80++;
													}
													elseif($per>=75 and $per<80){
														$above75++;
														$clear++;
														
													}
													elseif ($per>=70 and $per<75) {
														$above70++;
													}
													elseif($per>=65 and $per<70){
														$above65++;
													}
													elseif($per>=60 and $per<65){
														$above60++;
													}
													elseif($per>=50 and $per<60){
														$above50++;
													}
													elseif($per>=40 and $per<50){
														$above40++;
													}
													elseif($per>=30 and $per<40){
														$above30++;
													}
													else{
														$below30++;
													}
												}

																		              
								                $average=(($temp)/$students);
												
												
												$chart_data .= "{ subject:'".$row2["subject_code"]."', average:".round($average)."}, ";
											}
										?>
								
								

	                        </div>
	                        <div class="container" style="margin:10px;width:600px;overflow:auto">
   									<br><br><br>  
   									 									
   									<div id="<?php echo $chart;?>"></div>
   									<?php 


										$chart_data = substr($chart_data, 0, -2);
										//echo $chart_data;
									?>
   								<script>
								Morris.Bar({
								 element : '<?php echo $chart;?>',
								 data:[<?php echo $chart_data; ?>],
								 xkey:'subject',
								 ykeys:['average'],
								 labels:['average attendance', 'average'],
								 hideHover:'auto',
								 stacked:true,
								});	
							</script>
   								</div> 
   								<div class="row">
	                    <div class="x_content">
	                    	<div>
	                    		<form action="showAttendanceTemp1.php?class_id=<?php echo $row1['class_id'];?>" method="POST"> 
	                    			<input type="submit" value="Show details" class="btn btn-primary" name="submit"> </a>
	                    		</form>
	                    	</div>
	                        <div style="height:140px"></div>
	                        
	                    </div>
	                </div>       
	                    </div>
	                </div>
	                
	            </div>
	       
    <?php
    		}
    		else{
    			echo "No data";
			//header("location:checkAttendance.php?msg=No data available.");

    		}
		}
		

	
?>                                                    
<?php
    require 'footer.php';
?>
>
