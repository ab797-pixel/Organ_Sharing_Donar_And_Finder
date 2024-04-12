

<?php

extract($_POST);
if(isset($sub)){

	$doctor_email= $_SESSION['doctor_login'];
    echo $doctor_email;
    $retrieve_qeury = mysqli_query($conn,"select * from doctors where email='$doctor_email'");
    $doctor_row = mysqli_fetch_array($retrieve_qeury);
    $doctor_id = $doctor_row['id'];
	mysqli_query($conn,"insert into request_organs values('','$organ_name','null','$doctor_id','$patient_name','$expected_date','$age','$address','$mobile','$gender','$blood_type','Pending','')");
	$err="<font color='green'>New  REQuest Organ Successfully Added.</font>";
	header("location:index.php?page=request_list");

}
?>
<h2 align="center">Request Organs for Patient</h2>

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
			<td> expected Date </td>
			<?php $expected_date="";?><Td><input class="form-control" type="Date"   name="expected_date" required/></td>
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
			<td>Age</td>
			<?php $age="";?><Td><input class="form-control" type="number"   name="age" required/></td>
		</tr>
		<tr>
			<td>Gender</td>
			<?php $gender="";?><Td><select name="gender" class="form-control" required>
					
					<option value='MALE'>MALE</option>
					<option value='FEMALE'>FEMALE</option>
</select></td>
		</tr>
		
		<tr>
			<td>blood type</td>
			<?php $blood_type='';?><Td><input class="form-control" type="text"   name="blood_type" required/></td>
		</tr>
		<tr>
			<td>mobile.no</td>
<?php $mobile='';?><Td><input class="form-control" type="number"   name="mobile" required/></td>
		</tr>
		<tr>
			<td>Address </td>
			<?php $address="";?><Td><input class="form-control" type="text"   name="address"/></td>
		</tr>
		
		<tr>
			
			
<Td colspan="2" align="center">
<input type="submit" class="btn btn-default" value="Request" name="sub"/>
<input type="reset" class="btn btn-default" value="Reset"/>
		
			</td>
		</tr>
	</table>
</form>








