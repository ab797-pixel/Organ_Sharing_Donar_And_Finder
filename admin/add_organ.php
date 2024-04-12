<?php
error_reporting(1);
	include('../dbconfig.php');
	extract($_POST);
	if(isset($save))
	{		
    	
		mysqli_query($conn,"insert into organs values('','$organ_name','0','$alive_min')");	
	$err="<font color='green'>New Organ Successfully Added.</font>";
	}
		
?>
<script type="text/javascript">
function deletes(id)
{
	a=confirm('Are You Sure To Remove This Record ?')
	 if(a)
     {
        window.location.href='delete_organ.php?id='+id;
     }
}
</script>	


<h1 class="page-header">Add Organ</h1>
<div class="col-lg-8" style="margin:15px;">
	<form method="post">
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label><?php echo @$err;?></label>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Name:</label>
        <?php $organ_name = ''?><input type="text" value="<?php echo @$name;?>" name="organ_name" class="form-control" required>
        </div>
   	</div>
	   <div class="control-group form-group">
    	<div class="controls">
        	<label>Alive Timing (min)</label>
           <?php $alive_min = ''?> 	<input type="number" value="<?php echo @$alive_min;?>" name="alive_min" class="form-control" required>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="save" value="Add New Organ">
        </div>
  	</div>
	</form>
    </div>

    <?php
	echo "<table class='table table-responsive table-bordered table-striped table-hover' style=margin:15px;>";
	echo "<tr>";
	
	echo "<th>S.No</th>";
	echo "<th>Organ Name</th>";	
	echo "<th>quantity</th>";
	echo "<th>Alive Min</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	
	$i=1;
	$que=mysqli_query($conn,"select * from organs");
	
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['quantity']."</td>";
		echo "<td>".$row['alive_min']."min.</td>";
		echo "<td class='text-center'><a href='#' onclick='deletes($row[id])'><span class='glyphicon glyphicon-remove' style=color:red;></span></a></td>";
		
	
		echo "</tr>";
		$i++;
	}


