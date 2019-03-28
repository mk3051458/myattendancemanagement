<?php

require 'header.php';
require '../Controllers/config.php';
?>

<script type="text/javascript">
    
    function check(){
        var b=document.getElementById("department").value;
        if(b==""){
            alert("Please select a department");
            department.focus();
            return false;
        }
        var c=document.getElementById("name").value;
        if(c==""){
            alert("Please enter the name of the HOD");
            name.focus();
            return false;
        }
        var d=document.getElementById("phone").value;
        if(d==""){
            alert("Please enter the contact number of the HOD");
            phone.focus();
            return false;
        }var e=document.getElementById("dob").value;
        if(e==""){
            alert("Please enter the date birth of the HOD");
            dob.focus();
            return false;
        }var f=document.getElementById("address").value;
        if(f==""){
            alert("Please enter the address of the HOD");
            address.focus();
            return false;
        }var email=document.getElementById("email").value;
        if(email==""){
            alert("Please enter the email of the HOD");
            email.focus();
            return false;
        }
        if (email.value.indexOf("@", 0) < 0)                
        {
            window.alert("Please enter a valid e-mail address.");
            email.focus();
            return false;
        }
  
        if (email.value.indexOf(".", 0) < 0)                
        {
            window.alert("Please enter a valid e-mail address.");
            email.focus();
            return false;
        }
        var h=document.getElementById("password").value;
        if(h==""){
            alert("Please enter the password");
            password.focus();
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
                    $query="select block_id from directors where director_id='$_SESSION[director_id]'";
                    $result=mysqli_query($con,$query);
                    $roww=mysqli_fetch_array($result);
                ?>
                <div class="x_title">
                    
                    <h2>Head Of Department</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="overflow:auto">
                    <div class="container row">
                        <form class="form-horizontal" action="addhod.php" method="post" enctype="multipart/form-data">
       
                    <div class="x_content">
                        <div class="container row">
                            <form class="form-horizontal" action="addhod.php" method="post" enctype="multipart/form-data">
                                
                                
                                <div class="form-group">
                                    <label for="selectDepartment" class="control-label col-sm-2">Select department:</label>
                                    <input type="hidden" name="block_id" value="<?php echo $roww['block_id'];?>">
                                        <div class="col-xs-10">
                                          <select class="form-control" name="department" id="department">
                                              <option selected="selected" value="" >Select Department</option> 
                                            <?php 

                                                $q="select * from departments where block_id='$roww[block_id]' ORDER BY department_name";


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
                                          <input type="text" class="form-control" data-validate-length-range="6" data-validate-words="2" required="required" id="name" name="name" placeholder="HOD name">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="control-label col-sm-2">Phone number:</label>
                                        <div class="col-xs-10">
                                          <input type="number" data-validate-length-range="10" class="form-control" required="required" id="phone" name="phone" placeholder="Phone Number ">
                                        </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-2 " for="dob">Date of birth <span class="required">:</span>
                                    </label>
                                    <div class="col-xs-10">
                                          <input type="date" class="form-control" id="dob" required="required" name="dob" >
                                        </div>
                            
                    </div>
                            
                            <div class="form-group">
                                <label for="Address" class="control-label col-sm-2">Address:</label>
                                    <div class="col-xs-10">
                                      <textarea id="address" name="address" required="required" class="form-control col-md-7 col-xs-12" placeholder="Address"></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label col-sm-2">Email:</label>
                                    <div class="col-xs-10">
                                      <input type="email" class="form-control" id="email" required="required" name="email" placeholder="Email Address  ">
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
                                    <button type="submit" name="submit" class="btn btn-primary" onclick="return check()">Add HOD</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <p class="text-muted font-13 m-b-30" style="overflow:auto">
                        <br>Below Table show the information about the HODs.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered table-responsive" style="overflow: auto">
                        <thead>
                        <tr>
                            <th>Sr No.</th>
                            
                            <th>Department Name</th>
                            <th>HOD Name</th>
                            <th>Phone no. </th>
                            <th>Date of birth</th>
                            <th>Address</th>
                            <th>Email</th>
                            

                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $id=0;
                            $qu="select block_id from directors where director_id='$_SESSION[director_id]'";
                            $res=mysqli_query($con,$qu);
                            $row1=mysqli_fetch_array($res);
                            $com =mysqli_query($con,"select * from hods where block_id='$row1[block_id]'");
                            
                                while($row = mysqli_fetch_array($com))
                                {
                                    $id++;
                                    echo ("<td>$id</td>");
                                    
                                    
                                    $ress2= mysqli_query($con,"select * from departments where department_id='$row[department_id]' ");
                                     $row2= mysqli_fetch_array($ress2);
                                    echo ("<td>$row2[department_name]</td>");
                                    echo ("<td>$row[name]</td>");
                                    echo ("<td>$row[phone]</td>");
                                    echo ("<td>$row[date_of_birth]</td>");
                                    echo ("<td>$row[address]</td>");

                                    echo ("<td>$row[email]</td>");
                                    


                                    echo ("<td><a href='update_hod.php?hod_id=$row[hod_id]'>Update</a></td>");
                                    echo ("<td><a href='delete_hod.php?hod_id=$row[hod_id]'>Delete</a></td></tr>");
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