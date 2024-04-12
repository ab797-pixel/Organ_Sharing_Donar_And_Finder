<?php

@$doctor_id = $_GET['doctor_id'];
@$donate_id = $_GET['donate_id'];
if(isset($doctor_id) && isset($donate_id)){
   $update_query = mysqli_query($conn,"update donate_organs set contact_doctor_id = '$doctor_id' where id='$donate_id'");
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
  <tr> <th colspan="8"> <center>User Request Organs</center> </th> </tr>
  <tr>
    <th>S.No</th>
    <th>Patient Name</th>
    <th>Organ Name</th>
    <th>Age</th>
    <th>gender</th>
    <th>Address</th>
    <th>Doctor Name</th>
    <th>Assign Doctor</th>
    
  </tr>
  <?php
   $i=1;
   $request_organ_query = "select * from donate_organs" ;
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
    <td><?php echo "$request_organ_row[address]";?></td>
    
      <?php
       if($request_organ_row['contact_doctor_id'] != 0){
          $assign_doctor_id = $request_organ_row['contact_doctor_id'];
          $assign_doctor_query = mysqli_query($conn,"select * from doctors where id='$assign_doctor_id'");
          $assign_doctor_row = mysqli_fetch_array($assign_doctor_query);
          echo "<td>".$assign_doctor_row['name']."</td>";
       }
       else{
        echo "<td>ASSIGN DOCTOR</td>";
       }
      ?>
    
     <td>
        <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Assign Doctor
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <?php $request_id = $request_organ_row['id'];
      $retrieve_doctor_query = mysqli_query($conn,"select * from doctors");
      while($row = mysqli_fetch_array($retrieve_doctor_query)){
    ?>
    <li><a href="dashboard.php?info=user_donation_list&doctor_id=<?php echo$row['id']?>&donate_id=<?php echo$request_organ_row['id']?>"><?php echo "Dr.".$row['name'];?></a></li>
   <?php
      }
   ?>
  </ul>
</div>
     </td>
  </tr>
  <?php
  $i++;
   }
  ?>

</table>


      </div>
    
      </div>
