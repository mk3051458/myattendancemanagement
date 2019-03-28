<?php

require 'header.php';
require 'Controllers/config.php';
?>
<div class="right_col dataHeight" role="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    
                    <h2>Head Of Department</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="container row">
                        <h4>Update details of HOD</h4>

                        <form class="form-horizontal" action="update_hod_details_in_db.php" method="GET">
                             <div class="form-group">
                                <label for="selectBlock" class="control-label col-sm-2">Select block:</label>
                                    <div class="col-xs-10">
                                      <select class="form-control" name="block">
                                          
                                        <?php 

                                            $q="select * from blocks";
                                            $res=mysqli_query($con,$q);
                                            while($row=mysqli_fetch_array($res)){
                                                echo "<option value='$row[block_id]' class='form-control'>".$row['block_name']."</option>";
                                            }
                                        ?>
                                      </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="selectDepartment" class="control-label col-sm-2">Select department:</label>
                                    <div class="col-xs-10">
                                      <select class="form-control" name="department">
                                          
                                        <?php 

                                            $q="select * from departments";


                                            $res=mysqli_query($con,$q);
                                            while($row=mysqli_fetch_array($res)){
                                            echo "<option value='$row[department_id]'class='form-control'>".$row['department_name']."</option>";
                                            }
                                        ?>
                                      </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label col-sm-2">Enter name of the HOD:</label>
                                    <div class="col-xs-10">
                                        <?php 
                                            $q="select * from hods where hod_id='$_REQUEST[hod_id]'";
                                            $ress=mysqli_query($con,$q);
                                            $row1=mysqli_fetch_array($ress);
                                        ?>
                                        <input type="hidden" name="hod_id" value="<?php echo $_REQUEST['hod_id'];?>">
                    <input type="text" class="form-control" required="required" id="name" name="name" value="<?php echo $row1['name'];?>">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="control-label col-sm-2">Phone number:</label>
                                    <div class="col-xs-10">
                                      <input type="number" class="form-control" required="required" id="phone" name="phone" value="<?php echo $row1['phone'];?>">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="dob" class="control-label col-sm-2">Date of birth:</label>
                                    <div class="col-xs-10">
                                      <input type="date" class="form-control" required="required" id="dob" name="dob" >
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="Address" class="control-label col-sm-2">Address:</label>
                                    <div class="col-xs-10">
                                      <textarea id="address" name="address" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row1['address'];?>"></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label col-sm-2">Email:</label>
                                    <div class="col-xs-10">
                                      <input type="email" class="form-control" id="email" required="required" name="email" value="<?php echo $row1['email'];?>">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label col-sm-2">Password:</label>
                                    <div class="col-xs-10">
                                      <input type="password" class="form-control" id="password" required="required" name="password" placeholder="Password  ">
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-10">
                                    <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
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