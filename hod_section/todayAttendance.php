<?php
require 'header.php';
require '../Controllers/config.php';
?>

    <style>
        .dataHeight{
            min-height: 10px !important;
        }
    </style>
    <script type="text/javascript">
    function check(){
        var sem=document.getElementById("semester").value;
        if(semester==""){
            alert("Please select a semester.");
            return false;
        }     
    }
</script>

    <div class="right_col dataHeight" role="main">
        <?php 
            if(isset($_REQUEST['msg'])){
                echo "<div class='row col-md-12 alert alert-success'><h4>".$_REQUEST['msg']."</h4></div>";
            }?>
        <div class="x_panel">
            <div class="x_title">
                <h2>Check today's attendance</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" action="showTodayAttendance.php" enctype="multipart/form-data">
                    <h4>Class details</h4>
                    <div class="form-group">
                        <label for="semester" class="control-label col-sm-2">Select semester:</label>
                        <div class="col-xs-10">
                            <select class="form-control" name="semester" id="semester">
                                <option selected="selected" value="">Select Semester</option>                              
                                <?php 
                                    $q="select department_id from hods where email='$_SESSION[email]'";
                                    $res=mysqli_query($con,$q);
                                    $row=mysqli_fetch_array($res);
                                    $qu="select semester from classes where department_id='$row[department_id]'";
                                    $ress=mysqli_query($con,$qu);
                                    while($row1=mysqli_fetch_array($ress)){
                                        echo "<option>".$row1['semester']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-2">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="return check()">Add Subject</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div style="height:300px"></div>
    </div>
<?php
require 'footer.php';
?>