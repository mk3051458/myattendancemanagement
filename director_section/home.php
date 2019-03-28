<?php
    require 'header.php';
    require '../Controllers/config.php';
?>
    <div class="right_col dataHeight" role="main">
        <?php 
            if(isset($_REQUEST['msg'])){
                echo "<div class='row col-md-12 alert alert-success'><h4>".$_REQUEST['msg']."</h4></div>";
            }
        ?>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">

                        <h2>Dashboard</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                   

                    <div class="x_content">

                        <div class="row">
                             <div class="col-md-2">
                                <div class="thumbnail">
                                    <div class="caption text-center">

                                        <img src="../images/building.svg"  width="100" height=90">
                                        <?php
                                        $q="SELECT COUNT(block_id) as total from blocks";
                                        $res=mysqli_query($con,$q);
                                        $res1=mysqli_fetch_assoc($res);

                                        echo "<h3 style='text-align: center;'>".$res1['total']."</h3>";
                                        ?>
                                        <p style="text-align: center;">Total number of Blocks</p>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="thumbnail">
                                    <div class="caption text-center">

                                            <img src="../images/building.svg" align="middle" width="100" height="90">
                                            <?php
                                                 $q="SELECT COUNT(department_id) as total from departments";
                                                 $res=mysqli_query($con,$q);
                                                 $res1=mysqli_fetch_assoc($res);
                                               
                                                echo "<h3 style='text-align: center;'>".$res1[ 'total']."</h3>";
                                            ?>
                                            <p style="text-align: center;">Total number of Departments</p>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="thumbnail">
                                    <div class="caption text-center">

                                        <img src="../images/male.svg" align="middle" width="100" height="90">
                                        <?php
                                        $res=mysqli_query($con,"SELECT COUNT(hod_id) as total FROM hods");
                                        $res1=mysqli_fetch_assoc($res);
                                        echo "<h3 style='text-align: center;'>".$res1['total']."</h3>";
                                        ?>
                                        <p style="text-align: center;">Total number of HODs</p>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="thumbnail">
                                    <div class="caption text-center">

                                        <img src="../images/male.svg" width="100" height="90">
                                        <?php
                                           $res=mysqli_query($con,"SELECT COUNT(teacher_id) as total FROM teachers");
                                            $res1=mysqli_fetch_assoc($res);
                                            echo "<h3 style='text-align: center;'>".$res1['total']."</h3>";
                                        ?>
                                        <p style="text-align: center;">Total number of Teachers</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="thumbnail">
                                    <div class="caption text-center">

                                        <img src="../images/male.svg" align="middle" width="100" height="90">
                                        <?php
                                        $res=mysqli_query($con,"SELECT COUNT(university_roll_no) as total FROM students");
                                        $res1=mysqli_fetch_assoc($res);
                                        echo "<h3 style='text-align: center;'>".$res1['total']."</h3>";
                                        ?>
                                        <p style="text-align: center;">Total number of Students</p>

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                            
                    </div>

                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">

                        <h2>Your details</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row text-center" style="font-size: 14px">
                            <?php 
                                $q="select * from directors where email='$_SESSION[email]'";
                                $res=mysqli_query($con,$q);
                                $row=mysqli_fetch_array($res);
                                echo "<strong>Director Id :</strong> ".$row['director_id']."<br>";
                                echo "<strong>Name : </strong>".$row['name']."<br>";
                                echo "<strong>Address : </strong>".$row['address']."<br>";
                                echo "<strong>Contact Number : </strong>".$row['contact_number']."<br>";
                                
                                echo "<strong>Date of birth : </strong>".$row['date_of_birth']."<br>";
                                echo "<strong>Block Id : </strong>".$row['block_id']."<br>";
                                

                                echo "<strong>Email : </strong>".$row['email']."<br>";


                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require 'footer.php';
?>