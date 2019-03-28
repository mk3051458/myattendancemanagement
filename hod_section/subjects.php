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
        var name=document.getElementById("name").value;
        if(name==""){
            alert("Please enter the name of the subject.");
            return false;
        }
        var subject_code=document.getElementById("subject_code").value;
        if(subject_code==""){
            alert("Please enter the subject code of the subject.");
            return false;
        }
        var a=document.getElementById("block").value;
        if(a==""){
            alert("Please select a block.");
            return false;
        }
        var b=document.getElementById("department").value;
        if(b==""){
            alert("Please select a department.");
            return false;
        }var c=document.getElementById("semester").value;
        if(c==""){
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
                <h2>Add Subject</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <h4>Subject details</h4>
                <form class="form-horizontal form-label-left" method="POST" action="addSubject.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="control-label col-sm-2">Enter Subject name:</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" id="name" name="name" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject_code" class="control-label col-sm-2">Enter Subject Code:</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" id="subject_code" name="subject_code" >
                        </div>
                    </div>
                    <h4>Class details</h4>
                    <div class="form-group">
                        <label for="semester" class="control-label col-sm-2">Select semester:</label>
                        <div class="col-xs-10">
                            <select class="form-control" name="semester" id="semester">
                                <option selected="selected" value="">Select Semester</option>                              
                                <?php 
                                    $a=1;
                                    while($a<9){
                                        echo "<option>".$a."</option>";
                                        $a++;
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="teacher" class="control-label col-sm-2">Select Teacher:</label>
                        <div class="col-xs-10">
                            <select class="form-control" name="teacher_id" id="teacher" placeholder="Assign teacher to Subject">
                                <option selected="selected" value="">Assign Teacher to Subject</option>
                                <?php 
                                    $q="select * from teachers ORDER BY name";
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
                            <button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="return check()">Add Subject</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Subjects Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="overflow: auto;">
                        <p class="text-muted font-13 m-b-30">
                            Below Table show the information about the Subjects.
                        </p>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Subject Name</th>
                                <th>Subject Code</th>

                                <th>Semester</th>
                                <th>Assigned teacher</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            </thead>


                            <tbody>
                            <?php
                            $idd=0;
                            $que="select department_id from hods where email='$_SESSION[email]'";
                            $re=mysqli_query($con,$que);
                            $r=mysqli_fetch_array($re);
                            $com=mysqli_query($con,"select * from subjects where department_id='$r[department_id]'");
                            if(mysqli_num_rows($com)>0)
                            {
                                while($row = mysqli_fetch_array($com))
                                {
                                    $idd++;
                                    echo ("<tr><td>$idd</td>");
                                    echo ("<td>".$row['name']."</td>");
                                    echo ("<td>".$row['subject_code']."</td>");

                                   
                                    echo ("<td>$row[semester]</td>");

                                   $q="select name from teachers where teacher_id='$row[teacher_id]'";
                                   $res=mysqli_query($con,$q);
                                   $row2=mysqli_fetch_array($res);
                                   echo "<td>".$row2['name']."</td>";
                                    echo ("<td><a href='updateSubject.php?subject_id=$row[subject_id]'>Update</a></td>");
                                    echo ("<td><a href='deleteSubject.php?subject_id=$row[subject_id]'>Delete</a></td></tr>");

                                }
                            }
                            $query=mysqli_query($con,"select * from tutorialsubjects where department_id='$r[department_id]'");
                            while($row3=mysqli_fetch_array($query)){
                                $idd++;
                                echo ("<tr><td>$idd</td>");
                                echo ("<td>".$row3['name']."</td>");
                                echo ("<td>".$row3['subject_code']."</td>");                                 
                                echo ("<td>$row3[semester]</td>");
                                $q="select name from teachers where teacher_id='$row3[teacher_id]'";
                                $res=mysqli_query($con,$q);
                                $row2=mysqli_fetch_array($res);
                                echo "<td>".$row2['name']."</td>";
                                echo ("<td><a href='updateSubject.php?subject_id=$row[subject_id]'>Update</a></td>");
                                echo ("<td><a href='deleteSubject.php?subject_id=$row[subject_id]'>Delete</a></td></tr>");

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