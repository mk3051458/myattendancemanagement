 <style>
        .dataHeight{
            min-height: 10px !important;
        }
    </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php 

   	 
    include "Controllers/config.php"; 
    include "header.php";
	if(isset($_REQUEST['submit'])){
		$q7="select attendance from daily_attendance where class_id='$_REQUEST[class_id]'";
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
											echo "<th>>=75%,<80</th>";
											echo "<th>>=70%,<75%</th>";
											echo "<th>>=65%,<70</th>";
											echo "<th>>=60%,<65%</th>";	
											echo "<th>>=50%,<60%</th>;";
											echo "<th>>=40%,<50%</th>";
											echo "<th>>=30%,<40%</th>";
											echo "<th>Below 30%</th>";
											echo "<th>>=75%</th>";

											echo "<th>>Average %</th>";
										?>										
										</tr>
									</thead>
							    	<tbody>
							    		<?php
											$q2="select * from subjects where class_id='$_REQUEST[class_id]' ORDER BY name";

											$res2=mysqli_query($con,$q2);
											while($row2=mysqli_fetch_array($res2)){
												echo "<tr><td>".$row2['name']."</td>";
												echo "<td>".$row2['subject_code']."</td>";

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
												$q3="select * from students where class_id='$_REQUEST[class_id]'";
												$res3=mysqli_query($con,$q3);
												while($row3=mysqli_fetch_array($res3)){
													$students++;
													$total=0;
													$attend=0;
													$per=0;
													$q4="select * from daily_attendance where class_id='$_REQUEST[class_id]' and subject_code='$row2[subject_code]'";
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
						                    $qu3="select students,groupNo from tutorialgroups where classId='$_REQUEST[class_id]'";
						                    $res5=mysqli_query($con,$qu3);
						                    while($row5=mysqli_fetch_array($res5)){
						                    	$ab1 = $row5['students'];
							                    $ech2 = explode(",",$ab1);
							                    if(in_array($row3['university_roll_no'], $ech2)){
							                       $group=$row5['groupNo'];
							                       break;
							                      }
						                    	
						                    }
						                    $qu2="select * from tutorialattendance where class_id='$_REQUEST[class_id]' and subject_code='$row2[subject_code](T)' and groupNo='$group' or class_id='$_REQUEST[class_id]' and subject_code='$row2[subject_code](t)' and groupNo='$group'or class_id='$_REQUEST[class_id]' and subject_code='$row2[subject_code]' and groupNo='$group'";
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

												echo "<td>".$above90."</td>";
												echo "<td>".$above80."</td>";
												echo "<td>".$above75."</td>";
												echo "<td>".$above70."</td>";
												echo "<td>".$above65."</td>";

												echo "<td>".$above60."</td>";
												echo "<td>".$above50."</td>";
												echo "<td>".$above40."</td>";
												echo "<td>".$above30."</td>";
												echo "<td>".$below30."</td>";
												
												echo "<td>".$clear."</td>";
								              
								                $average=(($temp)/$students);
												echo "<td>".round($average)."</td></tr>";
												
												
											}
										?>
									</tbody>
								</table>
								

	                        </div>
	                               
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="x_content">
	                    	<div>
	                    		<form action="showAttendance.php?class=<?php echo $_REQUEST['class_id'];?>" method="POST"> 
	                    			<input type="submit" value="Show more details" class="btn btn-primary" name="submit"> </a>
	                    		</form>
	                    	</div>
	                        <div style="height:140px"></div>
	                        
	                    </div>
	                </div>
	            </div>
	       
    <?php
    		
    	}}	
?>                                                    
<?php
    require 'footer.php';
?>