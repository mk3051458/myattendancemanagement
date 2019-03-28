<?php

require 'header.php';
require '../Controllers/config.php';
?>
<script type="text/javascript">
    
  function check(){
       
       var b=document.getElementById("department").value;
        
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
                            <th>Department Name</th>
                            <th>Department Id</th>

                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $id=0;
                            $q="select * from directors where email='$_SESSION[email]'";
                            $res=mysqli_query($con,$q);
                            $row=mysqli_fetch_array($res);
                            $com=mysqli_query($con,"select * from departments where block_id='$row[block_id]'");
                            
                                while($row = mysqli_fetch_array($com))
                                {
                                    $id++;

                                    echo ("<td>$id</td>");
                                    echo ("<td>$row[department_name]</td>");
                                    echo ("<td>$row[department_id]</td>");

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