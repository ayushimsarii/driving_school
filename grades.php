<?php 
// error_reporting(0);
include('database.php');
// $obj = new User();
if(isset($_POST['gradesub'])){
//$arr = $obj->gradesubmit($_POST);
// $conn = connect();
$id=$_POST['id'];
$grade=$_POST['grade'];
// $subgrade = $_POST['subgrade'];
$ss= mysqli_query($conn,"SELECT * FROM `itembank`");
while($s=mysqli_fetch_array($ss)){ 
$idd1=$s['id'];
$selected1=$_POST['grade']; 
// $selected2=$_POST['subgrade']; 
$grade=$selected1[$idd1];
// $subgrade=$selected2[$idd1];
if($grade!=''){
$sql = "UPDATE `bank` SET `grade` = '".$grade."' WHERE `bank`.`id` = '".$idd1."';";
$query = mysqli_query($conn, $sql);
}
}
if($query=='1'){
echo "<script>alert('Successfully Submitted')</script>";
}else{
echo "<script>alert('Not saved')</script>";
}


}

// $conn=connect();

?>