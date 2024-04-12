<?php 
extract($_POST);
if(isset($save))
{
//check user alereay exists or not
$sql=mysqli_query($conn,"select * from doctors where email='$email'");

$r=mysqli_num_rows($sql);

if($r==true)
{
$err= "<font color='red'><h3 align='center'>This user already exists</h3></font>";
}
else
{
//dob
 if($password != $confirm_password){
	$err= "<font color='red'><h3 align='center'>Confirm password is not right</h3></font>";
 }
 else{
	$query="insert into doctors values('','$name','$email','$password','$mobile','$hospital_name','$state','$district','$taluk','$post')";
    mysqli_query($conn,$query);
	$err="<font color='blue'><h3 align='center'>Registration successfull !!<h3></font>";
	header("location:index.php?info=doctor_login");
 }
}
}




?>


		<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered" style="margin-bottom:50px">
	<caption><h2 align="center">Doctors Register Form</h2></caption>
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
				
				<tr>
					<td>Enter Your name</td>
					<Td><input  type="text" name="name" class="form-control" required/></td>
				</tr>
				<tr>
					<td>Enter Your email </td>
					<Td><input type="email" name="email" class="form-control" required/></td>
				</tr>
				
				<tr>
					<td>Enter Your Password </td>
					<Td><input type="password" name="password" class="form-control" required/></td>
				</tr>
				<tr>
					<td>Enter Confirm Password </td>
					<Td><input type="password" name="confirm_password" class="form-control" required/></td>
				</tr>
				<tr>
					<td>Enter Your Mobile </td>
					<Td><input type="text" name="mobile" class="form-control" required/></td>
				</tr>
				<tr>
					<td style="text-align:center;font-size:34px;" colspan="2">Hospital Details</td>
				</tr>
				
				<tr>
					<td>Hospital name</td>
					<Td>
					<input  type="text" name="hospital_name" class="form-control" required/>
					</td>
				</tr>
				
				<tr>
					<td>state</td>
					<Td><select name="state" class="form-control" required>
					
					<option>Tamil nadu</option>
					<option>kerala</option>
					<option>andra pradesh</option>
					<option>telugana</option>
					<option>karnataha</option>
					<option>uttra pradesh</option>
					
					</select>
					</td>
				</tr>
				<tr>
					<td>District</td>
					<Td>
					<input  type="text" name="district" class="form-control" required/>
					</td>
				</tr>
				
				<tr>
					<td>Taluk</td>
					<Td>
					<input  type="text" name="taluk" class="form-control" required/>
					</td>
				</tr>
				
				<tr>
					<td>Post</td>
					<Td>
					<input  type="text" name="post" class="form-control" required/>
					</td>
				</tr>
				
				
				
				<tr>
					
					
<Td colspan="2" align="center">
<input type="submit" value="Save" class="btn btn-info" name="save"/>
<input type="reset" value="Reset" class="btn btn-info"/>
				
					</td>
				</tr>
			</table>
		</form>
		</div>
		<div class="col-sm-2"></div>
		</div>
	</body>
</html>