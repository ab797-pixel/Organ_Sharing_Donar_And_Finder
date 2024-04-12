<h1><center>Request & Donation List</center></h1>
  
<?php
	echo "<table class='table table-responsive table-bordered table-striped table-hover' style=margin:15px;>";
	echo "<tr><th  colspan='7'><center><h2>Request List</h2></center></th></tr>";
    echo "<tr>";
	echo "<th>S.No</th>";
	echo "<th>Organ Name</th>";	
	echo "<th>Patient Name</th>";
    echo "<th>boold Group</th>";
    echo "<th>Phone Number</th>";
	echo "<th>Status</th>";
    echo "<th>you contanct doctor</th>";
	echo "</tr>";
	
	$i=1;
    $user_id = $_SESSION['user'];
	$que=mysqli_query($conn,"select * from request_organs where user_id ='$user_id' ");
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$row['organ_name']."</td>";
		echo "<td>".$row['patient_name']."</td>";
        echo "<td>".$row['blood_type']."</td>";
        echo "<td>".$row['mobile']."</td>";
        if($row['status'] == 'Pending'){echo "<td style='background-color:yellow'>".$row['status']."</td>";}
        if($row['status'] == 'Waiting'){echo "<td style='background-color:aqua'>".$row['status']."</td>";}
        if($row['status'] == 'Available'){echo "<td style='background-color:green'>".$row['status']."</td>";}
        if($row['available_doctor_id'] != 0){
            $doctor_id = $row['available_doctor_id'];
            $retrieve_doctor_query = mysqli_query($conn,"select * from doctors where id = '$doctor_id'");
            $doctor_row = mysqli_fetch_array($retrieve_doctor_query);
            $doctor_number = $doctor_row['mobile'];
            echo "<td>".$doctor_number."</td>";
        }	
        else{echo "<td>Doctor contant show soon!</td>";}
	    
		echo "</tr>";
		$i++;
	}
    ?>

 

<?php
        echo "<table class='table table-responsive table-bordered table-striped table-hover' style=margin:15px;>";
        echo "<tr><th  colspan='7'><center><h2>Donation List</h2></center></th></tr>";
        echo "<tr>";
        echo "<th>S.No</th>";
        echo "<th>Donate Organ</th>";	
        echo "<th>Patient Name</th>";
        echo "<th>boold Group</th>";
        echo "<th>Phone Number</th>";
        echo "<th>doctor contact number</th>";
        echo "</tr>";
        
        $i=1;
        $user_id = $_SESSION['user'];
        $que=mysqli_query($conn,"select * from donate_organs where user_id ='$user_id' ");
        while($row=mysqli_fetch_array($que))
        {
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$row['donate_organ']."</td>";
            echo "<td>".$row['patient_name']."</td>";
            echo "<td>".$row['blood_type']."</td>";
            echo "<td>".$row['mobile']."</td>";
            echo "<td>".$row['contact_doctor_id']."</td>";		
        
            echo "</tr>";
            $i++;
        }
     
    
    

