;<?php
@$request_id = $_GET['request_id'];
@$status = $_GET['status'];
if(isset($request_id) && isset($status)){
   $doctor_email = $_SESSION['doctor_login'];
   $retrieve_query = mysqli_query($conn,"select * from doctors where email = '$doctor_email'");
   $doctor_row = mysqli_fetch_array($retrieve_query);
   $doctor_id = $doctor_row['id'];
   $update_status = mysqli_query($conn,"update request_organs set status = '$status', available_doctor_id = '$doctor_id' where id = '$request_id'");
}
extract($_POST);
if(isset($save)){
  // echo "id = 1"."<br>";
  // echo "name =".$name."<br>";
  // echo "incharge_staff_id =".$Incharge_staff_id."<br>";
  // echo "department_name =".$department_name."<br>";
  // echo "semester =".$semester."<br>";
  // echo "academic year =".$academic_year."<br>";
  // echo "is_available=0"."<br>";
  // echo "students total = 0"."<br>";
$insert_query = "insert into classes values('','$name','$Incharge_staff_id','$department_name','$semester','$academic_year','0','0')";
$result = mysqli_query($con,$insert_query);
if(isset($result)){
  echo "<div class='alert alert-success alert-dismissible' role='alert'>
  SUCCESSFULLY INSERT THE DATA
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
  </button>
  </div>";
}

}
?>
<section id="admin_class" class="admin_class sections-bg">
      <div class="container" data-aos="fade-up">
        
      <div class="row">
        <div class="col-md-12">
            <div class="section-header">
              <center><h1>User Donation List</h1></center>  
            </div>
        </div> 

        
        </div>
      </div>
<table class='table table-responsive table-bordered table-striped table-hover' style=margin:15px;>
  <tr> <th colspan="7"> <center>User Request Organs</center> </th> </tr>
  <tr>
    <th>S.No</th>
    <th>Patient Name</th>
    <th>Organ Name</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Mobile</th>
    <th>Address</th>
    
  </tr>
  <?php
   $i=1;
   $doctor_email= $_SESSION['doctor_login'];
   echo $doctor_email;
   $retrieve_qeury = mysqli_query($conn,"select * from doctors where email='$doctor_email'");
   $doctor_row = mysqli_fetch_array($retrieve_qeury);
   $doctor_id = $doctor_row['id'];
   $request_organ_query = "select * from donate_organs where contact_doctor_id = '$doctor_id'" ;
   $request_organ_rows = mysqli_query($conn,$request_organ_query);
   while($request_organ_row=mysqli_fetch_array($request_organ_rows)){
  ?>
  <tr>
    <td><?php echo "$i";?></td>
    <td><?php echo "$request_organ_row[patient_name]";?></td>
    <?php
    //  $staff_id = $class_row["incharge_staff_id"];
    //  $staff_query="select name from staffs where id='$staff_id'";
    //  $staff_rows=mysqli_query($con,$staff_query);
    //  $staff_row=mysqli_fetch_array($staff_rows); 
    ?>
    <td><?php echo "$request_organ_row[donate_organ]";?></td>
    <td><?php echo "$request_organ_row[age]";?></td>
    <td><?php echo "$request_organ_row[gender]";?></td>
    <td><?php echo "$request_organ_row[mobile]";?></td>
    <td><?php echo "$request_organ_row[address]";?></td>

  </tr>
  <?php
  $i++;
   }
  ?>

</table>
