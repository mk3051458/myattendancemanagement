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
                <h2>Add Class</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                

                <form class="form-horizontal form-label-left" method="post" action="addclass.php" enctype="multipart/form-data">

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
                        <div class="col-md-7 col-md-offset-2">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="return check()">Add Class</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Classes Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                            Below Table show the information about the classes.
                        </p>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Block name</th>
                                <th>Department name</th>
                                <th>Semester</th>
                                <th>Class Id</th>

                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            </thead>


                            <tbody>
                            <?php
                            $idd=0;
                            $com=mysqli_query($con,"select * from classes where added_by='$_SESSION[email]'");
                            if(mysqli_num_rows($com)>0)
                            {
                                while($row = mysqli_fetch_array($com))
                                {
                                    $idd++;
                                    echo ("<tr><td>$idd</td>");
                                    $q="select * from blocks where block_id='$row[block_id]'";
                                    $res=mysqli_query($con,$q);
                                    $row1=mysqli_fetch_array($res);
                                    echo ("<td>$row1[block_name]</td>");
                                    $qu="select * from departments where department_id='$row[department_id]'";
                                    $ress=mysqli_query($con,$qu);
                                    $row2=mysqli_fetch_array($ress);
                                    echo ("<td>$row2[department_name]</td>");
                                    echo ("<td>$row[semester]</td>");
                                    echo ("<td>$row[class_id]</td>");

                                   
                                    echo ("<td><a href='updateClass.php?class_id=$row[class_id]'>Update</a></td>");
                                    echo ("<td><a href='deleteClass.php?class_id=$row[class_id]'>Delete</a></td></tr>");

                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require 'footer.php';
?>