

<?php

extract($_POST);
if(isset($sub)){
//id	user_id	contact_doctor_id	patient's name	age	gender	address	mobile	blood_group	donate_organ	reason
	$user_id = $_SESSION['user'];
 // echo "user_id".$user_id."patient's name".$patient_name."age".$age."gender".$gender."address".$address."mobile".$mobile."blood_gro ".$blood_type."donate_organ".$organ_name."reason".$reason."<br>";
	mysqli_query($conn,"insert into donate_organs values('','$user_id','NULL','$patient_name','$age','$gender','$address','$mobile','$blood_type','$organ_name','$reason')");
	$err="<font color='green'>New  donate Organ Successfully Added.</font>";
	

}
?>
<h2 align="center">Donate"s Organs for Patient</h2>

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
			<td>blood type</td>
			<?php $blood_type='';?><Td><input class="form-control" type="text"   name="blood_type" required/></td>
		</tr>
    <tr>
			<td>Reason</td>
			<?php $reason='';?><Td><input class="form-control" type="text" cols=40 rows=30   name="reason" /></td>
		</tr>
		
		
		<tr>
			
			
<Td colspan="2" align="center">
<input type="submit" class="btn btn-default" value="Donate" name="sub"/>
<input type="reset" class="btn btn-default" value="Reset"/>
		
			</td>
		</tr>
	</table>
</form>








