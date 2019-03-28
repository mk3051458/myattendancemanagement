<?php

require 'header.php';
require 'Controllers/config.php';
?>

<script type="text/javascript">
    function check(){
        var a=document.getElementById("block").value;
        if(a==""){
            alert("Please select a block.");
            block.focus();
            return false;
        }
        
        var c=document.getElementById("name").value;
        if(c==""){
            alert("Please enter the name of the Director");
            name.focus();
            return false;
        }
        var d=document.getElementById("phone").value;
        if(d==""){
            alert("Please enter the contact number of the Director");
            phone.focus();
            return false;
        }var e=document.getElementById("dob").value;
        if(e==""){
            alert("Please enter the date birth of the Director");
            dob.focus();
            return false;
        }var f=document.getElementById("address").value;
        if(f==""){
            alert("Please enter the address of the Director");
            address.focus();
            return false;
        }var email=document.getElementById("email").value;
        if(email==""){
            alert("Please enter the email of the Director");
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
                    $q="select * from directors where director_id='$_REQUEST[director_id]'";
                    $res=mysqli_query($con,$q);
                    if($row=mysqli_fetch_array($res)){
                ?>
                <div class="x_title">
                    
                    <h2>Update Director details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="container row">
                        <form class="form-horizontal" action="update_director_in_db.php" method="post" enctype="multipart/form-data">
                            
                            
                             <div class="form-group">
                                <label for="block" class="control-label col-sm-2">Select block:
                                </label>
                                    <div class="col-xs-10">
                                      <select class="form-control" name="block" id="block">
                                        <option selected="selected" value="">Select Block</option>  
                                        <?php 

                                            $query="select * from blocks ORDER BY block_name";
                                            $result=mysqli_query($con,$query);
                                            while($row2=mysqli_fetch_array($result)){
                                                echo "<option value='$row2[block_id]' class='form-control'>".$row2['block_name']."</option>";
                                            }
                                        ?>
                                      </select>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="name" class="control-label col-sm-2">Enter name of the Director:</label>
                                    <div class="col-xs-10">
                                      <input type="text" class="form-control"  title="characters allowed only."  required="required" id="name" name="name" placeholder="Director name" value="<?php echo $row['name'];?>">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="control-label col-sm-2">Phone number:</label>
                                    <div class="col-xs-10">
                                      <input type="tel" data-validate-length-range="10" class="form-control" pattern="[0-9]{10}" required="required" id="phone" name="phone" title="Phone number must be of 10 digits ." placeholder="Phone Number " value="<?php echo $row['contact_number'];?>">
                                    </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-2 " for="dob">Date of birth <span class="required">:</span>
                                </label>
                                <div class="col-xs-10">
                                      <input type="date" class="form-control" id="dob" required="required" name="dob" value="<?php echo $row['date_of_birth'];?>">
                                    </div>
                            
                    </div>
                            
                            <div class="form-group">
                                <label for="Address" class="control-label col-sm-2">Address:</label>
                                    <div class="col-xs-10">
                                      <textarea id="address" name="address" required="required" class="form-control col-md-7 col-xs-12" placeholder="Address" value="<?php echo $row['address'];?>"></textarea>
                                    </div>
                            </div>
                            <input type="hidden" name="director_id" value="<?php echo $_REQUEST['director_id'];?>">
                            <div class="form-group">
                                <label for="email" class="control-label col-sm-2">Email:</label>
                                    <div class="col-xs-10">
                                      <input type="email" class="form-control" id="email" required="required" name="email" placeholder="Email Address" value="<?php echo $row['email'];?>">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label col-sm-2">Password:</label>
                                    <div class="col-xs-10">
                                      <input type="password" class="form-control" id="password" required="required" name="password" placeholder="Password" value="<?php echo $row['password'];?>">
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-10">
                                    <button type="submit" name="submit" class="btn btn-primary" onclick="return check()">Update Director</button>
                                </div>
                            </div>
                            <?php 
                                }
                                else{
                                    echo "error".mysqli_error($con);
                                }
                            ?>
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