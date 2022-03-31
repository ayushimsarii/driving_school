<?php 
include('database.php');
// $obj = new User();
if(isset($_POST['gradesub']))
{
  $conn = connect();
$id=$val['id'];
$radio=$val['radio'];

$ss= mysqli_query($conn,"SELECT * FROM `bank`");
while($s=mysqli_fetch_array($ss)){ 
$idd1=$s['id'];
$selected1=$val['radio'];  
$grade=$selected1[$idd1];
if($grade!=''){
$sql = "UPDATE `bank` SET `radio` = '".$radio."' WHERE `bank`.`id` = '".$idd1."';";
$query = mysqli_query($conn, $sql);
}
}
if($query=='1'){
echo "<script>alert('Successfully Submitted')</script>";
}else{
echo "<script>alert('Not saved')</script>";
}
}


?>