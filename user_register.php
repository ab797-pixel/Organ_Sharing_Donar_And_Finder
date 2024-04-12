<?php 
extract($_POST);
if(isset($save))
{
//check user alereay exists or not
$sql=mysqli_query($conn,"select * from users where email='$email'");

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
	$query="insert into users values('','$name','$email','$password','$mobile','$aadhar','$address')";
    mysqli_query($conn,$query);
	$err="<font color='blue'><h3 align='center'>Registration successfull !!<h3></font>";
    header("location:index.php?info=user_login");
 }


//encrypt your password






}
}




?>


		<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered" style="margin-bottom:50px">
	<caption><h2 align="center">User`s Register Form</h2></caption>
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
					<td>AAdhar number </td>
					<Td><input type="number" name="aadhar" class="form-control" /></td>
				</tr>
                <tr>
					<td>Address </td>
					<Td><input type="text" name="address" class="form-control" /></td>
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