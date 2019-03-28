 <style>
    .dataHeight{
        min-height: 10px !important;
	}
</style>
<?php 
include "../Controllers/config.php"; 
include "header.php";
if(isset($_REQUEST['submit'])){
?>		
    <div class="right_col dataHeight" role="main">
        <div class="row" >
        	<div class="x_panel">
               	<div class="x_title">
                    <h2>Today's Attendance</h2>         
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                   	</ul>
                   	<div class="clearfix"></div>
               	</div>
	            <div class="x_content" style="overflow:auto">
	                <table id="datatable" class="table table-striped table-bordered table-responsive">
	                    <thead>
	                        <tr>
							<?php
								echo "<th>lecture Number</th>";
								echo "<th>Subject</th>";
								echo "<th>Subject Code</th>";	
								echo "<th>Total</th>";
								echo "<th>Present</th>";
								echo "<th>Absent</th>";
								echo "<th>Show Details</th>";
							?>						
							</tr>
						</thead>
						<tbody>
						<?php
                            $q1="select department_id from hods where email='$_SESSION[email]'";
                            $res=mysqli_query($con,$q1);
                            $row=mysqli_fetch_array($res);
							$today=date("Y-m-d");
                            $q="select sno,attendance,lecture,subject_code,class_id from daily_attendance where department_id='$row[department_id]' and 
                                semester='$_REQUEST[semester]' and date='$today'";
                            $re=mysqli_query($con,$q);
                            while($row6=mysqli_fetch_array($re)){
								echo "<tr><td>".$row6['lecture']."</td>";
								$q4="select name from subjects where subject_code='$row6[subject_code]'";
								$res4=mysqli_query($con,$q4);
								$row4=mysqli_fetch_array($res4);
								echo "<td>".$row4['name']."</td>";
								echo "<td>".$row6['subject_code']."</td>";
								$total=0;
								$attend=0;
								$per=0;
								$a = $row6['attendance'];
								$ech = explode(",",$a);
								$q3="select university_roll_no from students where class_id='$row6[class_id]'";
								$res3=mysqli_query($con,$q3);
								while($row3=mysqli_fetch_array($res3)){
									$total=$total+1;
									if(in_array($row3['university_roll_no'], $ech)){
										$attend++;
									}
								}
								echo "<td>$total</td>";
								echo "<td>$attend</td>";
								echo "<td>".($total-$attend)."</td>";
								echo "<td><a href='todayAttendanceDetail.php?lt=l&&sno=$row6[sno]'>Show details</a></td></tr>";
							}
							$q="select sno,attendance,groupNo,lecture,class_id,subject_code from tutorialattendance where department_id='$row[department_id]' and 
								semester='$_REQUEST[semester]' and date='$today'";
							$re=mysqli_query($con,$q);
							while($r=mysqli_fetch_array($re)){
								echo "<tr><td>".$r['lecture']."</td>";
								$q4="select name from subjects where subject_code='$r[subject_code]' UNION select name from tutorialsubjects where subject_code='$r[subject_code]'";
								$res4=mysqli_query($con,$q4);
								$row4=mysqli_fetch_array($res4);
								echo "<td>".$row4['name']."</td>";
								echo "<td>".$r['subject_code']."</td>";
								$qu="select students from tutorialgroups where classId='$r[class_id]' and groupNo='$r[groupNo]'";
								$res1=mysqli_query($con,$qu);
								$row1=mysqli_fetch_array($res1);
								$ab=$row1["students"];
								$ech1=explode(",",$ab);
								$attend=0;
								$total=sizeof($ech1);
								foreach ($ech1 as $key => $value) {
									$a=$r['attendance'];
									$ech=explode(",",$a);
									if(in_array($value, $ech)){
										$attend++;
									}
								}
								echo "<td>$total</td>";
								echo "<td>$attend</td>";
								echo "<td>".($total-$attend)."</td>";
								echo "<td><a href='todayAttendanceDetail.php?lt=t&&sno=$r[sno]'>Show details</a></td></tr>";	
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
require 'footer.php';
?>