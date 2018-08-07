<?php 
    
    include "Controllers/config.php"; 
    include "header.php";
	if(isset($_REQUEST['submit'])){
		
?>

    <style>
        .dataHeight{
            min-height: 10px !important;
        }
    </style>
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
								echo "<th>Sr. no.</th>";
								echo "<th>Roll_number</th>";

								echo "<th>Name</th>";
								$q="select * from classes where class_id='$_SESSION[class]'";
								$res=mysqli_query($con,$q);
								if($row=mysqli_fetch_array($res)){

									$temp=0;
									$sno=1;
									$class=$row['class_id'];
									$qu="select * from subjects where class_id='$class'";
									$res1=mysqli_query($con,$qu);
									while($row1=mysqli_fetch_array($res1)){
										
											echo "<th>";
											echo "<table class='table table-responsive'><tr><td colspan='3'>".$row1[1]."</td></tr><tr>";
												echo "<td>Delivered</td>";
												echo "<td>Attended</td>";
												echo "<td>Percentage</td>";
												$temp++;
											echo "</tr></table>";
											echo "</th>";
									}
									echo "</tr>";
									echo "</thead>";
						    		echo "<tbody>";
									
									$qu1="select * from students where class_id='$class'";
									$res2=mysqli_query($con,$qu1);
									while($row2=mysqli_fetch_array($res2)){
										echo "<tr><td>$sno</td>";
										$sno++;
										echo "<td>".$row2['university_roll_no']."</td>";
										echo "<td>".$row2['name']."</td>";
										$qu="select * from subjects where class_id='$class'";
										$res1=mysqli_query($con,$qu);
										while($row1=mysqli_fetch_array($res1)){
											
											$qu1="select * from daily_attendance where class_id='$row[class_id]' and     subject_code='$row1[subject_code]'";
						                    $res3=mysqli_query($con,$qu1);
						                    $total=0;
						                    $attend=0;
						                    while($row3=mysqli_fetch_array($res3)){
							                    $total=$total+1;
							                    $a = $row3['attendance'];
							                    $ech = explode(",",$a);
							                    if(in_array($row2['university_roll_no'], $ech)){
							                        $attend++;
							                      }
						                    }
						                    // echo "<td>".$total."</td>";
						                    // echo "<td>".$attend."</td>";
						                    echo "<td>";
											echo "<table class='table table-responsive'><tr>";
											echo "<td><td>$total</td></td>";
											echo "<td>$attend</td>";
											
											
											
						                    if($total==0){echo "<td>".$total."</td>";}
						        			else{
						        				$per=($attend/$total)*100;
						                    	 echo "<td>".round($per)."</td>";
						                    }
						        			echo "</tr></table>";
											echo "</td>";
						                
										}
										echo "</tr>";
									}
								}
								else{
									echo "Please select a valid class.";
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
        </div>
    </div>
<?php
	unset($_SESSION["class"]);
    require 'footer.php';
?>
