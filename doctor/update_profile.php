<?php
	extract($_POST);
	if(isset($save))
	{	
	
	mysqli_query($conn,"update doctors set name='$n',mobile='$mob',	password='$pass' where email='".$_SESSION['faculty_login']."'");	

$err="<font color='green'>Faculty Details updated</font>";

	}

$con=mysqli_query($conn,"select * from doctors where email='".$_SESSION['faculty_login']."'");

$res=mysqli_fetch_assoc($con);	
//print_r($res);
?>


<!--<h3 class="page-header">Update Profile</h3>
--><div class="col-lg-8" style="margin:15px;">
	<form method="post">
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label><?php echo @$err;?></label>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Name:</label>
            	<input type="text" value="<?php echo @$res['name'];?>" name="n" class="form-control" required>
        </div>
   	</div>
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Email :</label>
            	<input type="email" value="<?php echo @$res['email'];?>"  name="email" readonly="true" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Password :</label>
          <input type="text" value="<?php echo @$res['password'];?>"  name="pass" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Hospital :</label>
  <input type="text"  name="hospital" value="<?php echo @$res['hospital_name'];?>" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Location</label>
  <input type="text"  name="post" value="<?php echo @$res['post'];?>" class="form-control" required>
        </div>
    </div>
                  
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Mobile Number:</label>
            	<input type="number" id="mob" value="<?php echo @$res['mobile'];?>" class="form-control" maxlength="10" name="mob"  required>
        </div>
  	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="save" value="Update  Profile">
        </div>
  	</div>
	</form>


</div>