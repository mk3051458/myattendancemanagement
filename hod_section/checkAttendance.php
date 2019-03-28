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
        
        var a=document.getElementById("class_id").value;
        if(a==""){
            alert("Please enter the class_id.");
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
                <h2>Check attendance of a class</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                

                <form class="form-horizontal form-label-left" method="POST" action="showAttendanceTemp.php" enctype="multipart/form-data">

                   
                        
                         <div class="form-group">
                                <label for="class_id" class="control-label col-sm-2">Enter class id : </label>
                                    <div class="col-xs-10">
                                      <input type="number" class="form-control" id="class_id" name="class_id" >
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