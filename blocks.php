<?php

require 'header.php';
require 'Controllers/config.php';
?>
<script type="text/javascript">
    function check(){
        var a=document.getElementById('block').value;
        if(a==""){
            alert("Please enter the name of the block.");
            block.focus();
            return false;
        }
        if(!(isNaN(a))){
            alert("Name must contain only alphabets");
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
                ?>
                <div class="x_title">
                    
                    <h2>Blocks Information</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="container row">
                        <form class="form-horizontal" action="addBlock.php" method="POST">
                            <div class="form-group">
                                <label for="block" class="control-label col-sm-2">Enter name of the block:</label>
                                    <div class="col-xs-10">
                                      <input type="text" class="form-control" id="block" name="block" placeholder="Block name">
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-10">
                                    <button type="submit" name="submit" class="btn btn-primary" onclick="return check()">Add block</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <p class="text-muted font-13 m-b-30">
                        <br>Below Table show the information about the Blocks.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Block Name</th>
                            <th>Block Id</th>

                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $id=0;
                            $com=mysqli_query($con,"select * from blocks");
                            if(mysqli_num_rows($com)>0)
                            {
                                while($row = mysqli_fetch_array($com))
                                {
                                    $id++;
                                    echo ("<td>$id</td>");
                                    
                                    echo ("<td>$row[block_name]</td>");
                                    echo ("<td>$row[block_id]</td>");

                                    echo ("<td><a href='update_block.php?block_id=$row[block_id]'>Update</a></td>");
                                    echo ("<td><a href='delete_block.php?block_id=$row[block_id]'>Delete</a></td></tr>");

                                }
                                $_SESSION['blocks']=$id;
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
