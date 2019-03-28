<?php
require 'header.php';
require '../Controllers/config.php';
$q="select department_id from hods where hod_id='$_SESSION[hod_id]'";
$res=mysqli_query($con,$q);
$r=mysqli_fetch_array($res);
$dep=$r['department_id'];
?>
<script type="text/javascript">
    function check(){
        var c=document.getElementById("semester").value;
        if(c==""){
            alert("Please select a semester.");
            return false;
        }
        var c=document.getElementById("semester").value;
        if(c==""){
            alert("Please select a semester.");
            return false;
        }
        var d=document.getElementById("teacher").value;
        if(d==""){
            alert("Please select a teacher.");
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
        <?php 
            if(isset($_REQUEST['msg'])){
                echo "<div class='row col-md-12 alert alert-success'><h4>".$_REQUEST['msg']."</h4></div>";
            }?>
        <div class="x_panel">
            <div class="x_title">
                <h2>Assign Class to Teacher</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>

        
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                

                <form class="form-horizontal form-label-left" method="get" action="addClassTeachers.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="semester" class="control-label col-sm-2">Enter semester:</label>
                        <div class="col-xs-10">
                            <select class="form-control" name="semester" id="semester" >
                                <option selected="selected" value="">Select Semester</option>
                                <?php 
                                    $q="select semester from classes where department_id='$dep'";
                                    $res=mysqli_query($con,$q);
                                    while($row=mysqli_fetch_array($res)){
                                        echo "<option value='$row[semester]' class='form-control'>".$row['semester']."</option>";
                                             
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="teacher" class="control-label col-sm-2">Select Teacher:</label>
                        <div class="col-xs-10">
                            <select class="form-control" name="teacher_id" id="teacher" >
                                <option selected="selected" value="">Select Teacher</option>
                                    <?php 
                                        $q="select * from teachers";
                                        $res=mysqli_query($con,$q);
                                        while($row=mysqli_fetch_array($res)){
                                            $qu="select * from departments where department_id='$row[department_id]'";
                                            $res2=mysqli_query($con,$qu);
                                            $row1=mysqli_fetch_array($res2);
                                            echo "<option value='$row[teacher_id]' class='form-control'>".$row['name']." of ".$row1['department_name']." with email=".$row['email']."</option>";
                                            
                                        }
                                    ?>
                            </select>
                       </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-2">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="return check()">Assign Class</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Class Teachers</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                            Below Table show the information about the class teachers.
                        </p>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Block name</th>
                                <th>Department name</th>
                                <th>Semester</th>
                                <th>Assigned Teacher</th>
                                <th>Teacher Email</th>


                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            </thead>


                            <tbody>
                            <?php
                            $idd=0;
                            $com=mysqli_query($con,"select * from class_teachers");
                            if(mysqli_num_rows($com)>0)
                            {
                                while($row = mysqli_fetch_array($com))
                                {
                                    $idd++;
                                    echo ("<tr><td>$idd</td>");
                                    $q="select * from blocks where block_id='$row[block_id]'";
                                    $res=mysqli_query($con,$q);
                                    $row1=mysqli_fetch_array($res);
                                    echo ("<td>$row1[block_name]</td>");
                                    $qu="select * from departments where department_id='$row[department_id]'";
                                    $ress=mysqli_query($con,$qu);
                                    $row2=mysqli_fetch_array($ress);
                                    echo ("<td>$row2[department_name]</td>");
                                    echo ("<td>$row[semester]</td>");

                                    $qu="select * from teachers where teacher_id='$row[teacher_id]'";
                                    $ress=mysqli_query($con,$qu);
                                    $row11=mysqli_fetch_array($ress);
                                    echo ("<td>$row11[name]</td>");
                                    echo ("<td>$row11[email]</td>");

                                    echo ("<td><a href='updateClassTeacher.php?classTeacher_id=$row[classTeacher_id]'>Update</a></td>");
                                    echo ("<td><a href='deleteClassTeacher.php?classTeacher_id=$row[classTeacher_id]'>Delete</a></td></tr>");

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
<?php
require 'footer.php';
?>