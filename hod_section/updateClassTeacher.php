<?php
require 'header.php';
require '../Controllers/config.php';
?>
<script type="text/javascript">
    function check(){
        var a=document.getElementById("block").value;
        if(a==""){
            alert("Please select a block.");
            return false;
        }
        var b=document.getElementById("department").value;
        if(b==""){
            alert("Please select a department.");
            return false;
        }var c=document.getElementById("semester").value;
        if(c==""){
            alert("Please select a semester.");
            return false;
        }
        var c=document.getElementById("semester").value;
        if(c==""){
            alert("Please select a semester.");
            return false;
        }
        var d=document.getElementById("teacher").value;
        if(d==""){
            alert("Please select a teacher.");
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
                echo "<div class='row col-md-12 alert alert-success'><h4>".$_REQUEST['msg']."</h4></div>";
            }?>
            <div class="x_title">
                <h2>Assign Class to Teacher</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>

        
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                

                <form class="form-horizontal form-label-left" method="get" action="addClassTeachers.php" enctype="multipart/form-data">

                    <div class="form-group">
                                <label for="block" class="control-label col-sm-2">Select block:</label>
                                    <div class="col-xs-10">
                                      <select class="form-control" name="block" id="block">
                                          <option selected="selected" value="">Select Block</option>
                                        <?php 

                                            $q="select * from blocks ORDER BY block_name";
                                            $res=mysqli_query($con,$q);
                                            while($row=mysqli_fetch_array($res)){
                                                echo "<option value='$row[block_id]' class='form-control'>".$row['block_name']."</option>";
                                            }
                                        ?>
                                      </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="department" class="control-label col-sm-2">Select department:</label>
                                    <div class="col-xs-10">
                                      <select class="form-control" name="department" id="department">
                                         <option selected="selected" value="">Select Department</option> 
                                        <?php 

                                            $q="select * from departments ORDER BY department_name";
                                            $res=mysqli_query($con,$q);
                                            while($row=mysqli_fetch_array($res)){
                                                echo "<option  value='$row[department_id]' class='form-control'>".$row['department_name']."</option>";
                                            }
                                        ?>
                                      </select>
                                    </div>
                            </div>
                        
                         <div class="form-group">
                                <label for="semester" class="control-label col-sm-2">Enter semester:</label>
                                    <div class="col-xs-10">
                                      <input type="number" class="form-control" id="semester" name="semester" >
                                    </div>
                            </div>
                    <div class="form-group">
                                <label for="teacher" class="control-label col-sm-2">Select Teacher:</label>
                                    <div class="col-xs-10">
                                      <select class="form-control" name="teacher_id" id="teacher">
                                          <option selected="selected" value="">Select Teacher</option>
                                        <?php 

                                            $q="select * from teachers ORDER BY name";
                                            $res=mysqli_query($con,$q);

                                            while($row=mysqli_fetch_array($res)){
                                                 $qu="select * from departments where department_id='$row[department_id]'";
                                                 $res2=mysqli_query($con,$qu);
                                                 $row1=mysqli_fetch_array($res2);
                                                 echo "<option value='$row[teacher_id]' class='form-control'>".$row['name']." of ".$row1['department_name']." with email=".$row['email']."</option>";
                                                
                                            }
                                        ?>
                                      </select>
                                    </div>
                            </div>

                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-2">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="return check()">UPDATE</button>
                        </div>
                    </div>
            <div style="height:225px;"></div>

                </form>
            </div>
        </div>

       
    </div>
<?php
require 'footer.php';
?>