<h1 align="center" style="text-decoration:underline"><a href="">Admin Dashboard</a></h1>
<?php 

$qq=mysqli_query($conn,"select * from doctors ");
$rows=mysqli_num_rows($qq);			
echo "<h2 style='color:green'>Total Number of Doctors : $rows</h2>";	


$q=mysqli_query($conn,"select * from users");
$r1=mysqli_num_rows($q);			
echo "<h2 style='color:orange'>Total Number of User : $r1</h2>";	



// $q2=mysqli_query($conn,"select * from request_organ");
// $r2=mysqli_num_rows($q2);			
echo "<h2 style='color:blue'>Total Number request given by users & doctors  : NOT YET</h2>";

// $q2=mysqli_query($conn,"select * from request_organ");
// $r2=mysqli_num_rows($q2);			
echo "<h2 style='color:aqua'>Total Number request given by users & doctors  : NOT YET</h2>";


					

?>
