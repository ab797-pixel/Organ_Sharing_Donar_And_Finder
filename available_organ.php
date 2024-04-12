<?php
 date_default_timezone_set('Asia/kolkata');
@$delete_id = $_GET['delete_id'];
if(isset($delete_id)){
  $delete_row = mysqli_query($conn,"delete from available_organs where id ='$delete_id'");
  if(isset($delete_row)){
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
    DELETE DATA SUCCESSUFULLY
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
  }
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
        <div class="col-md-9">
            <div class="section-header">
                <h2>Available Organ</h2>
            </div>
        </div>
        </div>
</section>
     
  <table class='table table-responsive table-bordered table-striped table-hover'>
  <tr>
    <th>S.No</th>
    <th>Patient's name</th>
    <th>Organ name</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Blood Type</th>
    <th>Cause Of Death</th>
    <th>Timing</th>

  </tr>
  <?php
   $i=1;
   $available_organ_query = "select * from available_organs";
   $available_organ_rows = mysqli_query($conn,$available_organ_query);
   while($available_organ_row=mysqli_fetch_array($available_organ_rows)){
  ?>
  <tr>
    <td><?php echo "$i";?></td>
    <td><?php echo "$available_organ_row[patient_name]";?></td>
    <td><?php echo "$available_organ_row[organ_name]";?></td>
    <td><?php echo "$available_organ_row[age]";?></td>
    <td><?php echo "$available_organ_row[gender]";?></td>
    <td><?php echo "$available_organ_row[blood_type]";?></td>
    <td><?php echo "$available_organ_row[cause_of_death]";?></td>
    <?php $timing = $available_organ_row['alive_timing'];
  
      $id =$available_organ_row['id'];
    ?>
     <td onclick="my('<?php echo$timing;?>','<?php echo $id?>')"> <p id="demo<?php echo$id?>"></p></td> 

   
  </tr>
  <?php
  $i++;
   }
  ?>

</table>


<script>
  function my(time,id){
  console.log(time);
    var countDownDate = new Date(time).getTime();

var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo"+id).innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo"+id).innerHTML = "EXPIRED";
  }
}, 1000);

  }
  </script>