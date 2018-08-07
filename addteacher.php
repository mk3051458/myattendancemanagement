<?php
require 'header.php';
require 'Controllers/config.php';

?>
<script type="text/javascript">
    function checkFile(){
        var a=document.getElementById("upload").value;
        if(a==""){
            alert("Please select a valid excel file containing teachers detail.");
            return false;
        }
    }
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
            <?php 
                    if(isset($_REQUEST['msg'])){
                        echo "<div class='row'><h4 class='text-center alert alert-success'>".$_REQUEST['msg']."</h4></div>";
                    }
                ?>
            <div class="x_title">
                <h2>Add Teacher</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            
                <br />
                
                <h4>Teacher details</h4>
                <div class="x_content">
                    <div class="container row">
                        <form class="form-horizontal" action="addteacherindb.php" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label class="control-label col-md-2" for="upload">Upload an Excel File:</label>
                                <div class="col-md-10">
                                    <input type="file" id="upload" data-toggle="tooltip" data-placement="left" name="files"  class="form-control col-md-10 col-xs-12" title="Please upload an excel file containing information about the teachers.">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-10">
                                    <input type="submit" class="btn btn-primary" onclick="return checkFile()" value="Upload Data" name="upload" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <h4 class="text-center">OR</h4>

                <form class="form-horizontal form-label-left" method="post" action="addteacherindb.php"  enctype="multipart/form-data">

                    <div class="form-group">
                                <label for="block" class="control-label col-sm-2">Select block:</label>
                                    <div class="col-md-10">
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
                                    <div class="col-md-10">
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
                        <label class="control-label col-md-2" for="first-name">Name <span class="required">:</span>
                        </label>
                        <div class="col-md-10">
                            <input type="text" id="first-name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="address">Address <span class="required">:</span>
                        </label>
                        <div class="col-md-10">
                            <textarea id="address" name="address" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="contact">Contact<span class="required">:</span>
                        </label>
                        <div class="col-md-10">
                            <input type="number" id="contact" name="contact" required="required" class="form-control col-md-10 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                              <label class="control-label col-md-2 " for="dob">Date of birth<span class="required">:</span>
                                </label>
                            <div class="col-md-10">
                               <input type="date" name="dob" id="dob" required="required" class="form-control col-md-10 col-xs-10">
                            </div>
                           
                    </div>
                     
                    <div class="form-group">
                        <label class="control-label col-md-2" for="email">Email<span class="required">:</span>
                        </label>
                        <div class="col-md-10">
                            <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="Password">Password<span class="required">:</span>
                        </label>
                        <div class="col-md-10">
                            <input type="Password" id="Password" name="Password" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-2">
                            <button type="submit" name="submit" class="btn btn-primary" onclick="return check()">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Teacher's Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="overflow: auto;">
                        <p class="text-muted font-13 m-b-30">
                            Below Table show the information about the Teachers.
                        </p>
                        <table id="datatable" class="table table-striped table-bordered" style="overflow: auto;">
                            <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Date Of Birth</th>
                                <th>Block</th>
                                <th>Department</th>
                                <th>Email</th>
                                 
                                <th>Update</th>
                                <th>Delete</th>

                            </tr>
                            </thead>


                            <tbody>
                            <?php
                            $idd=0;
                            $com=mysqli_query($con,"select * from teachers where added_by='$_SESSION[email]'");
                            if(mysqli_num_rows($com)>0)
                            {
                                while($row = mysqli_fetch_array($com))
                                {
                                    $idd++;
                                    echo ("<tr><td>$idd</td>");
                                    echo ("<td>$row[name]</td>");
                                    echo ("<td>$row[address]</td>");
                                    echo ("<td>$row[contact_number]</td>");
                                    echo ("<td>$row[dob]</td>");
                                    $res=mysqli_query($con,"select * from blocks where block_id='$row[block_id]'");
                                    $first=mysqli_fetch_array($res);
                                    echo ("<td>$first[block_name]</td>");
                                    $res1=mysqli_query($con,"select * from departments where department_id='$row[department_id]'");
                                    $sec=mysqli_fetch_array($res1);
                                    echo ("<td>$sec[department_name]</td>");
                                    
                                    echo ("<td>$row[email]</td>");

                                    echo "<td><a href='updateTeacher.php?teacher_id=$row[teacher_id]'>Update</a></td>";

                                    echo ("<td><a href='deleteTeacher.php?teacher_id=$row[teacher_id]'>Delete</a></td></tr>");
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

        
    </div>
<?php
require 'footer.php';
?>