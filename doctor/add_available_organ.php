

<?php
 date_default_timezone_set('Asia/kolkata');

extract($_POST);
if(isset($sub)){
   //id	doctor_id	patient_name	age	gender	blood_type	mobile	address	cause_of_death	reason	organ_name	alive_timing
	$doctor_email= $_SESSION['doctor_login'];
    
    $retrieve_qeury = mysqli_query($conn,"select * from doctors where email='$doctor_email'");
    $doctor_row = mysqli_fetch_array($retrieve_qeury);
    $doctor_id = $doctor_row['id'];
	//add timing
    $selectedTime = date("H:i:s");
    $endTime = strtotime("+".$alive_timing." HOURS", strtotime($selectedTime));
    $organ_time = date('d M Y H:i:s', $endTime);
	echo "current Time".date("H:i:s");
	echo $organ_time ;
	mysqli_query($conn,"insert into available_organs values('','$doctor_id','$patient_name','$age','$gender','$blood_type','$mobile','$address','$cause_of_death','$reason','$organ_name','$organ_time')");
	 $err="<font color='green'>New  donate Organ Successfully Added.</font>";
	 header("location:index.php?page=available_organ");

}
?>
<h2 align="center">Add Available Organ</h2>

<form method="post">
	<table class="table table-bordered">
<Tr>
<Td colspan="2"><?php echo @$err;?></Td>
</Tr>
		
		<tr>
			<td>patient name</td>
			<?php $patient_name="";?><Td><input class="form-control"   type="text" name="patient_name" required/></td>
		</tr>
	  <tr>
			<td>Age</td>
			<?php $age="";?><Td><input class="form-control" type="number"   name="age" required/></td>
		</tr>
        <tr>
			<td>blood type</td>
			<?php $blood_type='';?><Td><input class="form-control" type="text"   name="blood_type" required/></td>
		</tr>
    <tr>
			<td>Gender</td>
			<?php $gender="";?><Td><select name="gender" class="form-control" required>
					
					<option value='MALE'>MALE</option>
					<option value='FEMALE'>FEMALE</option>
</select></td>
		</tr>
    <tr>
			<td>Address </td>
			<?php $address="";?><Td><input class="form-control" type="text"   name="address"/></td>
		</tr>
    <tr>
			<td>mobile.no</td>
<?php $mobile='';?><Td><input class="form-control" type="number"   name="mobile" required/></td>
		</tr>
		<tr>
			<td>available_organs</td>
			<?php $organ_name="";?><Td><select name="organ_name" class="form-control" required>
					<?php
					 $query = mysqli_query($conn,"select * from organs");
					 while($row=mysqli_fetch_array($query)){
					
					 echo "<option value=".$row['name'].">".$row['name']."</option>";
					 }
                    ?>
					
</select></td>
		</tr>
        <tr>
			<td>Alive Timing(min)</td>
			<?php $alive_timing="";?><Td><input class="form-control" type="number"   name="alive_timing" required/></td>
		</tr>
		
        <tr>
			<td>Cause Of Death</td>
			<?php $cause_of_death="";?><Td><select name="cause_of_death" class="form-control" required>
					
					<option value='Brain_Death'>Brain Death</option>
					<option value='Other'>OTHER</option>
</select></td>
		</tr>
		
		
    <tr>
			<td>Reason</td>
			<?php $reason='';?><Td><input class="form-control" type="text" cols=40 rows=30   name="reason" /></td>
		</tr>
		
		
		<tr>
			
			
<Td colspan="2" align="center">
<input type="submit" class="btn btn-default" value="Add Organ" name="sub"/>
<input type="reset" class="btn btn-default" value="Reset"/>
		
			</td>
		</tr>
	</table>
</form>








