<?php
	extract($_POST);
	if(isset($save))
	{	
	
	mysqli_query($conn,"update doctors set name='$name',hospital_name='$hospital_name',state='$state',district='$district',post='$post' where id='".$_GET['id']."'");	

$err="<font color='green'>Faculty Details updated</font>";

	}

$con=mysqli_query($conn,"select * from doctors where id='".$_GET['id']."'");

$res=mysqli_fetch_assoc($con);	

?>


<h1 class="page-header">Update  Faculty</h1>
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
            	<input type="text" value="<?php echo @$res['name'];?>" name="name" class="form-control" required>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Hospital Name</label>
            	<input type="text" value="<?php echo @$res['hospital_name'];?>" name="hospital_name" class="form-control" required>
        </div>
   	</div>
 	
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>State</label>
  <input type="text"  name="state" value="<?php echo @$res['state'];?>" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>District</label>
  <input type="text"  name="district" value="<?php echo @$res['district'];?>" class="form-control" required>
        </div>
    </div>
                  
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Post</label>
            	<input type="text" id="post" value="<?php echo @$res['post'];?>" class="form-control" name="post"  required>
        </div>
  	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="save" value="Update  Faculty">
        </div>
  	</div>
	</form>


</div>