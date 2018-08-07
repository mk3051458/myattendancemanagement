<?php

require 'header.php';
require 'Controllers/config.php';
?>
<script type="text/javascript">
    function fileCheck(){
        var a=document.getElementById("upload").value;
        if(a==0){
            alert("Please upload a valid excel file containing departments information.");
            return false;
        }
    }
  function check(){
       var a=document.getElementById("block").value;
       var b=document.getElementById("department").value;
        if(a==""){
            alert("Please select a block.");
            block.focus();
            return false;
        }
        
        if(b==""){
            alert("Please enter the name of the department");
            department.focus();
            return false;
        }
    }

</script>
<div class="right_col dataHeight" role="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <?php 
                    if(isset($_REQUEST['msg'])){
                        echo "<div class='row'><h4 class='text-center alert alert-success'>".$_REQUEST['msg']."</h4></div>";
                    }
                ?>
                <div class="x_title">
                    
                    <h2>Departments Information</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="container row">
                        <form class="form-horizontal" action="addDepartment.php" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label class="control-label col-sm-2" for="upload">Upload File:</label>
                                <div class="col-xs-10">
                                    <input type="file" id="upload" name="files"  class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-10">
                                    <input type="submit" class="btn btn-primary" onclick="return fileCheck()" value="Upload Data" name="upload" />
                                    <a href="excel files/departments.xlsx" class="btn btn-primary"  value="Download Data" name="Download" >Download sample file
                                  </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <h4 class="text-center">OR</h4>
                <div class="x_content">
                    <div class="container row">
                        <form class="form-horizontal" action="addDepartment.php" method="post" enctype="multipart/form-data">
                             
                             <div class="form-group">
                                <label for="selectBlock" class="control-label col-sm-2">Select block:</label>
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
                                <label for="department" class="control-label col-sm-2">Enter name of the department:</label>
                                    <div class="col-xs-10">
                                      <input type="text" class="form-control" id="department" name="department" placeholder="Department name">
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-10">
                                    <button type="submit" name="submit" class="btn btn-primary" onclick="return check()">Add Department</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <p class="text-muted font-13 m-b-30">
                        <br>Below Table show the information about the Departments.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Block Name</th>
                            <th>Department Name</th>

                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $id=0;
                            $com=mysqli_query($con,"select * from departments");
                            
                                while($row = mysqli_fetch_array($com))
                                {
                                    $id++;

                                    echo ("<td>$id</td>");
                                    $ress = mysqli_query($con,"select * from  blocks where block_id='$row[block_id]'");
                                    $row1 = mysqli_fetch_array($ress);
                                    echo ("<td>$row1[block_name]</td>");
                                    echo ("<td>$row[department_name]</td>");

                                    echo ("<td><a href='update_department.php?department_id=$row[department_id]'>Update</a></td>");
                                    echo ("<td><a href='delete_department.php?department_id=$row[department_id]'>Delete</a></td></tr>");
                                }
                                $_SESSION["departments"]=$id;
                                
                             ?>
                        </tbody>
                    </table>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>