<?php 
extract($_POST);
if(isset($sub))
{
    $sql_faculty=mysqli_query($conn,"select * from faculty where id='$faculty'");
$faculty1=mysqli_fetch_array($sql_faculty);
echo "test ".$faculty1['Name'];



/*if($r==true)
{
$err= "<font color='red'><h3 align='center'>This user already exists</h3></font>";
}
else
{


}*/
}?>
<form method="post" form>
<div class="row">
    <div class="col-lg-6">
    <input name="question" class="form-control" placeholder="ask your question">
    </div>
    <div class="col-lg-1">
       <span style="font-size:18px;"> To</span>
    </div>
    <div class="col-lg-3">
 

<select name="faculty" class="form-control">
	<?php
	$sql=mysqli_query($conn,"select * from faculty");
	while($r=mysqli_fetch_array($sql))
	{
        
	echo "<option value='".$r['id']."'>".$r['Name']."</option>";
	}
		 ?>
</select>
    </div>
    <div class="col-lg-2">
    <input name="sub"  type="submit" value="send" class="btn btn-success"/>
    </div>
</div>
    
 

        
 




</tr>
</table>
</form>
<style>
   
</style>