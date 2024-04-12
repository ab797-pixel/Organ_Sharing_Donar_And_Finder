<?php
include('../dbconfig.php');
	
	$info=$_GET['id'];
	
	mysqli_query($conn,"delete from organs where id='$info'");
	header('location:dashboard.php?info=add_organ');
?>