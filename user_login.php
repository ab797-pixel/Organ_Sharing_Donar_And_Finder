<?php 
extract($_POST);
if(isset($save))
{

	if($e=="" )
	{
	$err="<font color='red'>fill all the fileds first</font>";	
	}
	else
	{
/*$pass=md5($p);*/
$pass=$p;	

$sql=mysqli_query($conn,"select * from users where email='$e' and password='$pass'");
/*$sql=mysqli_query($conn,"select * from user where email='$e' ");*/

$r=mysqli_num_rows($sql);
$row = mysqli_fetch_array($sql);

if($r==true)
{
	
$_SESSION['user']=$row['id'];
header('location:user');
}

else
{

$err="<font color='red'>Invalid login details</font>";

}
}
}

?>
<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">

<form method="post">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><h2>User Login Form</h2></div>
	</div>
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter YOur Email</div>
		<div class="col-sm-5">
		<input type="email" name="e" class="form-control"/></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter YOur Password</div>
		<div class="col-sm-5">
		<input type="password" name="p" class="form-control"/></div>
	</div>
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4"></div>
		<div class="col-sm-8">
		<input type="submit" value="Login" name="save" class="btn btn-info"/>
		
		</div>
        <center>
			<span>Not Register Yet? <a href="index.php?info=user_register">Click Here!</a></span><br>	
			</center>
	</div>
	<div>
		<span></span><br>
		<span></span>
	</div>
</form>	
</div>
</div>