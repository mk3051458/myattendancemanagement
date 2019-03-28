 <style>
    .dataHeight{
        min-height: 10px !important;
	}
</style>
<?php 
    include "../Controllers/config.php"; 
    include "header.php";
?>		
<div class="right_col dataHeight" role="main">
    <div class="row" >
    	<div class="x_panel">
           	<div class="x_title">
                <h2>Details of today's attendance</h2>         
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
                            echo "<th>Sr. No.</th>";
                            echo "<th>University roll number</th>";
                            echo "<th>Name</th>";	
                            echo "<th>Attendance Status</th>";
                        ?>						
						</tr>
					</thead>
					<tbody>
                    <?php
                        if($_REQUEST['lt']=='l'){
                             echo "<h4>If</h4>";
                            $q="select attendance,class_id from daily_attendance where sno='$_REQUEST[sno]'";
                            $re=mysqli_query($con,$q);
                            if($row6=mysqli_fetch_array($re)){
                                $a = $row6['attendance'];
                                $ech = explode(",",$a);
                                $q3="select university_roll_no,name from students where class_id='$row6[class_id]'";
                                $res3=mysqli_query($con,$q3);
                                $s=1;
                                while($row3=mysqli_fetch_array($res3)){
                                    echo "<tr><td>".$s."</td>";
                                    echo "<td>".$row3['university_roll_no']."</td>";
                                    echo "<td>".$row3['name']."</td>";
                                    if(in_array($row3['university_roll_no'], $ech)){
                                        echo "<td>Present</td></tr>";
                                    }
                                    else{
                                        echo "<td>Absent</td></tr>";
                                    }
                                }
                                
                            }
                        }
                        else{
                            echo "<h4>Else</h4>";
                            $q="select attendance,groupNo,class_id from tutorialattendance where sno='$_REQUEST[sno]'";
                            $re=mysqli_query($con,$q);
                            while($r=mysqli_fetch_array($re)){
                                $qu="select students from tutorialgroups where classId='$r[class_id]' and groupNo='$r[groupNo]'";
                                $res1=mysqli_query($con,$qu);
                                $row1=mysqli_fetch_array($res1);
                                $ab=$row1["students"];
                                $ech1=explode(",",$ab);
                                $s=1;
                                $total=sizeof($ech1);
                                foreach ($ech1 as $key => $value) {
                                    echo "<tr><td>".$s."</td>";
                                    echo "<td>".$value."</td>";
                                    $q1="select name from students where university_roll_no='$value'";
                                    $res2=mysqli_query($con,$q1);
                                    $row2=mysqli_fetch_array($res2);
                                    echo "<td>".$row2['name']."</td>";
                                    $a=$r['attendance'];
                                    $ech=explode(",",$a);
                                    if(in_array($value, $ech)){
                                        echo "<td>Present</td></tr>";
                                    }
                                    else{
                                        echo "<td>Absent</td></tr>";
                                    }
                                }
                                
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
    require 'footer.php';
?>