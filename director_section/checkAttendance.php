<?php
require 'header.php';
require '../Controllers/config.php';
?>
<script type="text/javascript">
    function check(){
        b=document.getElementById("department").value;
        if(b==""){
            alert("Please select a department.");
            return false;
        }
       
    }
    
</script>

    <style>
        .dataHeight{
            min-height: 10px !important;
        }
    </style>

    <div class="right_col dataHeight" role="main">
        <div class="x_panel">
            <?php 
                if(isset($_REQUEST['msg'])){
                        echo "<div class='row'><h4 class='text-center alert alert-success'>".$_REQUEST['msg']."</h4></div>";
                    }
            ?>
            <div class="x_title">
                <h2>Check attendance of a class</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                

                <form class="form-horizontal form-label-left" method="POST" action="showAttendanceTemp.php" enctype="multipart/form-data">

                    
                    <div class="form-group">
                        <label for="department" class="control-label col-sm-2">Select department:</label>
                        <div class="col-xs-10">
                            <select class="form-control" name="department" id="department">
                                   <option selected="selected" value="">Select Department</option>

                            <?php 
                                $qu="select * from directors where email='$_SESSION[email]'";
                                $ress=mysqli_query($con,$qu);
                                $roww=mysqli_fetch_array($ress);
                                $q="select * from departments where block_id='$roww[block_id]'";
                                $res=mysqli_query($con,$q);
                                while($row=mysqli_fetch_array($res)){
                                    echo "<option  value='$row[department_id]'class='form-control'>".$row['department_name']."</option>";
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="block" value="<?php echo $roww['block_id'];?>">
                   
                    

                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-2">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="return check()">Show Attendance</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

         <div class="row">
                    <div class="x_content">
                        <div style="height:200px"></div>
                    </div>
                </div>
    </div>
<?php
require 'footer.php';
?>