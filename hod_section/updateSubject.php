<?php
require 'header.php';
require '../Controllers/config.php';
?>

    <style>
        .dataHeight{
            min-height: 10px !important;
        }
    </style>
    <script type="text/javascript">
    function check(){
        var name=document.getElementById("name").value;
        if(name==""){
            alert("Please enter the name of the subject.");
            return false;
        }
        var subject_code=document.getElementById("subject_code").value;
        if(subject_code==""){
            alert("Please enter the subject code of the subject.");
            return false;
        }
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

    <div class="right_col dataHeight" role="main">
        <?php 
            if(isset($_REQUEST['msg'])){
                echo "<div class='row col-md-12 alert alert-success'><h4>".$_REQUEST['msg']."</h4></div>";
            }?>
        <div class="x_panel">
            <div class="x_title">
                <h2>Update Subject</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <h4>Subject details</h4>
                <?php 
                    $quu="select * from subjects where subject_id='$_REQUEST[subject_id]'";
                    $resss=mysqli_query($con,$quu);
                    if($roww=mysqli_fetch_array($resss)){
                ?>

                <form class="form-horizontal form-label-left" method="POST" action="updateSubjectInDb.php" enctype="multipart/form-data">
                    <div class="form-group">
                                <label for="name" class="control-label col-sm-2">Enter Subject name:</label>
                                    <div class="col-xs-10">
                                      <input type="text" class="form-control" id="name" name="name" value="<?php echo $roww['name'];?>">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="subject_code" class="control-label col-sm-2">Enter Subject Code:</label>
                                    <div class="col-xs-10">
                                      <input type="text" class="form-control" id="subject_code" name="subject_code"  value="<?php echo $roww['subject_code'];?>">
                                    </div>
                            </div>
                            <h4>Class details</h4>
                    <div class="form-group">
                                <label for="block" class="control-label col-sm-2">Select Block:</label>
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
                                <label for="department" class="control-label col-sm-2">Select Department:</label>
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
                        <input type="hidden" name="subject_id" value="<?php echo $_REQUEST['subject_id'];?>">
                         <div class="form-group">
                                <label for="semester" class="control-label col-sm-2">Enter semester:</label>
                                    <div class="col-xs-10">
                                      <input type="number" class="form-control" id="semester" name="semester"  value="<?php echo $roww['semester'];?>">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="teacher" class="control-label col-sm-2">Select Teacher:</label>
                                    <div class="col-xs-10">
                                      <select class="form-control" name="teacher_id" id="teacher" placeholder="Assign teacher to Subject">
                                          <option selected="selected" value="">Assign Teacher to Subject</option>
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
                    
                        <?php }?> 
                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-2">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="return check()">Update Subject</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        
    </div>
<?php
require 'footer.php';
?>