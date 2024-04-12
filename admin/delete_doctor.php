<?php
include('../dbconfig.php');
	
	$info=$_GET['id'];
	
	mysqli_query($conn,"delete from doctors where id='$info'");
	header('location:dashboard.php?info=show_doctor');
?>