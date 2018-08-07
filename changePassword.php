<?php
require 'header.php';
require 'Controllers/config.php';
	
?>
    <style>
        .dataHeight{
            min-height: 10px !important;
        }
    </style>
    <script type="text/javascript">
        function myFunction(element_id) {
            var x = document.getElementById(element_id);
            if (x.type === "password") {
                x.type = "text";
             } 
             else {
                x.type = "password";
            }
        } 
    </script>

    <div class="right_col dataHeight" role="main">
        <div class="x_panel">
            <div class="x_title">
                <h2>Change Password</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                
                
                <?php 
                    if(isset($_REQUEST['msg'])){
                        echo "<div class='row'><h4 class='text-center alert alert-danger'>".$_REQUEST['msg']."</h4></div>";
                    }
                ?>

                <form class="form-horizontal form-label-left" method="post" action="changePasswordIndb.php"  enctype="multipart/form-data">

                    
                    <div class="form-group">
                        <label class="control-label col-md-3" for="current_password">Current Password <span class="required">:</span>
                        </label>
                        <div class="col-md-7">
                            <input type="password" id="current_password" name="current_password" required="required" class="form-control col-md-7 col-xs-12 " >
                            <input type="checkbox" onclick="myFunction('current_password')">Show current Password
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="new_password">New Password <span class="required">:</span>
                        </label>
                        <div class="col-md-7">
                            <input type="password" id="new_password" name="new_password" required="required" class="form-control col-md-7 col-xs-12 " >
                            <input type="checkbox" onclick="myFunction('new_password')">Show new Password
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="re_enter_new_password">Re-enter New Password <span class="required">:</span>
                        </label>
                        <div class="col-md-7">
                            <input type="password" id="re_enter_new_password" name="re_enter_new_password" required="required" class="form-control col-md-7 col-xs-12 " >
                            <input type="checkbox" onclick="myFunction('re_enter_new_password')">Show re-entry of new Password
                        </div>
                    </div>
                    <div class="form-group">
                        
                        <div class="col-xs-offset-3 col-xs-10">
                                    <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </div>

                </form>
                <div class="row container">
            <div style="height:250px"></div>
        </div>
            </div>
        </div>

        
        
    </div>
<?php
require 'footer.php';
?>