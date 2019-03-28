<?php 
	include "header.php";
	include "Controllers/config.php";
	$q="select * from blocks where block_id='$_REQUEST[block_id]'";
	$res=mysqli_query($con,$q);
	
		if($row=mysqli_fetch_array($res)){
			$name=$row['block_name'];
			$block_id=$row['block_id'];
		}
	
?>
<script type="text/javascript">
    function check(){
        var a=document.getElementById("block").value;
        if(a==""){
            alert("Please enter the name of the block");
            return false;
        }
    }
</script>
<div class="right_col dataHeight" role="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    
                    <h2>Blocks Information</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="container row">
                        <form class="form-horizontal" action="updateBlockInDb.php?>'" method="POST">
                            <div class="form-group">
                                <label for="inputblock" class="control-label col-sm-2">Enter name of the block:</label>
                                    <div class="col-xs-10">
                                    <input type="text" class="form-control" id="inputblock" name="block" value="<?php echo $name;?>">
                                    <input type="hidden"  name="block_id" value="<?php echo $block_id;?>">
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-10">
                                    <button type="submit" name="submit" class="btn btn-primary" onclick="return check()">Update</button>
                                </div>
                            </div>
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