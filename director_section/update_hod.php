<?php

require 'header.php';
require 'Controllers/config.php';
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
            alert("Please select a department");
            return false;
        }
        var c=document.getElementById("name").value;
        if(c==""){
            alert("Please enter the name of the HOD");
            return false;
        }
        var d=document.getElementById("phone").value;
        if(d==""){
            alert("Please enter the contact number of the HOD");
            return false;
        }var e=document.getElementById("dob").value;
        if(e==""){
            alert("Please enter the date birth of the HOD");
            return false;
        }var f=document.getElementById("address").value;
        if(f==""){
            alert("Pl/ease enter the address of the HOD");
            return false;
        }var g=document.getElementById("email").value;
        if(g==""){
            alert("Please enter the email of the HOD");
            return false;
        }var h=document.getElementById("password").value;
        if(h==""){
            alert("Please enter the password");
            return false;
        }
    }
</script>
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
                                    <button type="submit" name="submit" class="btn btn-primary" onclick="return check()">UPDATE</button>
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