    <?php
require 'header.php';
require 'Controllers/config.php';
?>
<script type="text/javascript">
    function check(){
        var a=document.getElementById("block").value;
        if(a==""){
            alert("Please select a block");
            return false;
        }
        else{
            window.location.reload(true);
        }
        b=document.getElementById("department").value;
        if(b==""){
            alert("Please select a department.");
            return false;
        }
       
    }
    $(document).ready(function() {
        $('.block-select').change(function() {
        var val = $(this).val();
        var curUrl = window.location.href;
        // Append the value to current URL & reload
        var targetUrl = curUrl + '?block=' + val;
        window.location.href = targetUrl;
    });
    });
  
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
                <h2>Check attendance of a department</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                

                <form class="form-horizontal form-label-left" method="POST" action="showAttendanceTemp.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="block" class="control-label col-sm-2">Select block:</label>
                        <div class="col-xs-10">
                            <select class="form-control block-select" name="block" id="block" >
                                <option selected="selected" value="">Select Block</option>
                                          
                                    <?php 
                                        $q="select * from blocks ORDER BY block_name";
                                        $res=mysqli_query($con,$q);

                                        while($row=mysqli_fetch_array($res)){
                                            if(isset($_REQUEST['block'])){
                                                if($_REQUEST['block']==$row['block_id']){
                                                   echo "<option value='$row[block_id]' class='form-control' selected='selected'>".$row['block_name']."</option>"; 
                                                }
                                            }
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
                                $q="select * from departments where block_id='$_REQUEST[block]'";
                                $res=mysqli_query($con,$q);
                                while($row=mysqli_fetch_array($res)){
                                    echo "<option  value='$row[department_id]'class='form-control'>".$row['department_name']."</option>";
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="col-md-7 col-md-offset-2">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="return check()">Show Attendance</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

         <div class="row">
                    <div class="x_content">
                        <div style="height:200px"></div>
                    </div>
                </div>
    </div>
<?php
require 'footer.php';
?>