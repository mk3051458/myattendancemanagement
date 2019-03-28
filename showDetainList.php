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
?>
    <div class="right_col dataHeight" role="main">
   		<div class="row" >
       		<div class="x_panel">
               	<div class="x_title">
                   	<h2>Detain list</h2>         
					<ul class="nav navbar-right panel_toolbox">
                       	<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                       	</li>
                    </ul>
	                <div class="clearfix"></div>
	            </div>
	            <div class="x_content" style="overflow:auto">
	                <p class="text-muted font-13 m-b-30">
	                   	Below Table show the information about the detained students.
	                </p>
	                        
	                <table id="datatable" class="table table-striped table-bordered table-responsive">
	                    <thead>
	                        <tr>
								<th>Sr. no.</th>
								<th>Roll_number</th>
								<th>Name</th>
								<th>Detained subjects</th>
								<th>Attendance Percentages</th>		
							</tr>
						</thead>
						<tbody>
							<?php
							    $sno=1;
								$q2="select * from students where class_id='$_REQUEST[class]' ORDER BY university_roll_no";
								$res2=mysqli_query($con,$q2);
								while($row2=mysqli_fetch_array($res2)){
									$list="";
									$det_per="";
									$q3="select * from subjects where class_id='$_REQUEST[class]'";
									$res3=mysqli_query($con,$q3);
									while($row3=mysqli_fetch_array($res3)){
										$total=0;
										$attend=0;
										$per=0;
										$q4="select * from daily_attendance where class_id='$_REQUEST[class]' and subject_code='$row3[subject_code]'";
										$res4=mysqli_query($con,$q4);
										while($row4=mysqli_fetch_array($res4)){
											$total=$total+1;
											$a = $row4['attendance'];
											$ech = explode(",",$a);
											if(in_array($row2['university_roll_no'], $ech)){
											    $attend++;
											}
										}
										$group=0;
						                    $qu3="select students,groupNo from tutorialgroups where classId='$_REQUEST[class]'";
						                    $res5=mysqli_query($con,$qu3);
						                    while($row5=mysqli_fetch_array($res5)){
						                    	$ab1 = $row5['students'];
							                    $ech2 = explode(",",$ab1);
							                    if(in_array($row2['university_roll_no'], $ech2)){
							                       $group=$row5['groupNo'];
							                       break;
							                      }
						                    	
						                    }
						                    $qu2="select * from tutorialattendance where class_id='$_REQUEST[class]' and subject_code='$row3[subject_code](T)' and groupNo='$group' or class_id='$_REQUEST[class]' and subject_code='$row3[subject_code](t)' and groupNo='$group'or class_id='$_REQUEST[class]' and subject_code='$row3[subject_code]' and groupNo='$group'";
						                    $res4=mysqli_query($con,$qu2);
						                    while($row4=mysqli_fetch_array($res4)){
							                    $total=$total+1;
							                    $ab = $row4['attendance'];
							                    $ech1 = explode(",",$ab);
							                    if(in_array($row2['university_roll_no'], $ech1)){
							                        $attend++;
							                      }
						                    }
										if($total){
											$per=round(($attend/$total)*100);
										}
										if($per<75){
											if($list==""){
												$list=$row3['name'];
											}
											else{
												$list=$list.",".$row3['name'];
											}
											if($det_per==""){
												$det_per=$per;
											}
											else{
												$det_per=$det_per.",".$per;
											}
											

										}
													
									}
									if($list!=""){
										echo "<tr><td>$sno</td>";
										$sno++;
										echo "<td>".$row2['university_roll_no']."</td>";
										echo "<td>".$row2['name']."</td>";
										echo "<td>$list</td>";
										echo "<td>$det_per</td></tr>";
									}
	
								}
							?>
						</tbody>
					</table>
								

	             </div>
	                               
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="x_content">
	                    	
	                        <div style="height:140px"></div>
	                        
	                    </div>
	                </div>
	            </div>
	       
    <?php
    		
    	}	
?>                                                    
<?php
    require 'footer.php';
?>