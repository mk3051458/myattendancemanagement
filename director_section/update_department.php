<?php

require 'header.php';
require '../Controllers/config.php';
?>
<script type="text/javascript">
    function check(){
        var a=document.getElementById("department").value;
        if(a==""){
            alert("Please enter the name of the department.");
            return false;
        }
    }
</script>
<div class="right_col dataHeight" role="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    
                    <h2>Departments Information</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="container row">
                        <form class="form-horizontal" action="updateDepartmentInDb.php" method="GET">
                             
                            <div class="form-group">
                                <label for="department" class="control-label col-sm-2">Enter name of the department:</label>
                                    <div class="col-xs-10">
                                        <?php 
                                            $qu="select * from departments where department_id='$_REQUEST[department_id]'";
                                            $ress=mysqli_query($con,$qu);
                                            $row=mysqli_fetch_array($ress);
                                        ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                                      <input type="text" class="form-control" id="department" name="department" 
                                      value="<?php echo $row['department_name'];?>">
                                      <input type="hidden" name="department_id" value="<?php echo $row['department_id']; ?>">
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-10">
                                    <button type="submit" name="submit" class="btn btn-primary" onclick="return check()">UPDATE </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>