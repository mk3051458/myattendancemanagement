<?php
require 'header.php';
require 'Controllers/config.php';
	
?>
<script>
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
            alert("Please enter the name of the teacher");
            return false;
        }
        var d=document.getElementById("phone").value;
        if(d==""){
            alert("Please enter the contact number of the teacher");
            return false;
        }var e=document.getElementById("dob").value;
        if(e==""){
            alert("Please enter the date birth of the teacher");
            return false;
        }var f=document.getElementById("address").value;
        var g=document.getElementById("email").value;
        if(g==""){
            alert("Please enter the email of the teacher");
            return false;
        }var h=document.getElementById("password").value;
        if(h==""){
            alert("Please enter the password");
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
            <div class="x_title">
                <h2>Update information</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                
                <h4>Teacher details</h4>
                

                <form class="form-horizontal form-label-left" method="post" action="updateTeacherInDb.php"  enctype="multipart/form-data">

                    <?php 
                    	$q="select * from teachers where teacher_id='$_REQUEST[teacher_id]'";
                    	$res=mysqli_query($con,$q);
                    	$row=mysqli_fetch_array($res)


                    ?>
                     <div class="form-group">
                                <label for="block" class="control-label col-sm-2">Select block:</label>
                                    <div class="col-md-10">
                                      <select class="form-control" name="block" id="block">
                                        <option selected="selected" value="">Select Block</option>   
                                          
                                        <?php 

                                            $q1="select * from blocks ORDER BY block_name";
                                            $res1=mysqli_query($con,$q1);
                                            while($row1=mysqli_fetch_array($res1)){
                                                echo "<option value='$row1[block_id]' class='form-control'>".$row1['block_name']."</option>";
                                            }
                                        ?>
                                      </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="department" class="control-label col-sm-2">Select department:</label>
                                    <div class="col-md-10">
                                      <select class="form-control" name="department" id="department">
                                        <option selected="selected" value="">Select Department</option> 
                                          
                                        <?php 

                                            $q2="select * from departments ORDER BY department_name";
                                            $res2=mysqli_query($con,$q2);
                                            while($row2=mysqli_fetch_array($res2)){
                                                echo "<option  value='$row2[department_id]' class='form-control'>".$row2['department_name']."</option>";
                                            }
                                        ?>
                                      </select>
                                    </div>
                            </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="first-name">Name <span class="required">:</span>
                        </label>
                        <div class="col-md-10">
                            <input type="text" id="first-name" name="name" required="required" class="form-control col-md-10 col-xs-12 " value="<?php echo $row['name'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="address">Address <span class="required">:</span>
                        </label>
                        <div class="col-md-10">
                            <textarea id="address" name="address" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $row['address'];?>"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="contact">Contact: <span class="required">:</span>
                        </label>
                        <div class="col-md-10">
                            <input type="number" id="contact" name="contact" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $row['contact_number'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                              <label class="control-label col-md-2 " for="dob">Date of birth: <span class="required">:</span>
                                </label>
                                <div class="col-md-10">
                               <input type="date" name="dob" id="dob" required="required" class="form-control col-md-10 col-xs-10">
                            </div>
                            
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="email">Email<span class="required">:</span>
                        </label>
                        <div class="col-md-10">
                            <input type="text" id="email" name="email" required="required" class="form-control col-md-10 col-xs-12"value="<?php echo $row['email'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="Password">Password<span class="required">:</span>
                        </label>
                        <div class="col-md-10">
                            <input type="Password" id="Password" name="Password" required="required" class="form-control col-md-10 col-xs-12">
                        </div>
                    </div>

                    <input type="hidden" name="teacher_id" value="<?php echo $_REQUEST['teacher_id'];?>">
                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-2">
                            <button type="submit" name="submit" class="btn btn-primary" onclick="return check()">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        
    </div>
<?php
require 'footer.php';
?>