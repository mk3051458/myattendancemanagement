<?php
require 'header.php';
require '../Controllers/config.php';
?>
<script type="text/javascript">
    function check(){
        c=document.getElementById("percentage").value;
        if(c==""){
            alert("Please enter the percentage.");
            percentage.focus();
            return false;
        }
        if(c>100 || c<0){
            alert("Please enter percentage value between 0 and 100");
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
                <h2>Check students below particular percentage of your department</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                

                <form class="form-horizontal form-label-left" method="POST" action="showStudentBelow.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="percentage" class="control-label col-sm-2">Enter Percentage:</label>
                        <div class="col-xs-10">
                        <input type="number" name="percentage" required="required" class="form-control col-md-7" id="percentage">
                            
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="col-md-7 col-md-offset-2">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="return check()">Show Students</button>
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