<?php 
include ("connect.php");
$value=array();
$value1=array();
$std_idie=$_REQUEST['std_idies'];
$class_id=$_REQUEST['class_id'];
$phase_id=$_REQUEST['phase_id'];
$ctp_id1=$_REQUEST['ctp_id1'];
$class=$_REQUEST['class'];
var_dump($ctp_id1);
foreach($std_idie as $std_idies=>$key){
  $value[]=$std_idie[$std_idies];
  
}
//var_dump($value);
$std_sub=$_REQUEST['std_sub'];
foreach($std_sub as $std_subs=>$key){
    $value1[]=$std_sub[$std_subs];
}


foreach($value as $index => $values) {
 
  $subject=$value1[$index];
 

var_dump($subject == "item");
  if($subject == "item"){
    $sql = "INSERT INTO item (item,course_id,class_id,phase_id,class) VALUES ('$values','$ctp_id1','$class_id','$phase_id','$class')";
echo $sql;
    $statement = $connect->prepare($sql);

    $statement->execute();
   
 
  }
  else{
    $sql = "INSERT INTO subitem (item,subitem,course_id,class_id,phase_id,class) VALUES ('$values','$subject','$ctp_id1','$class_id','$phase_id','$class')";

    $statement = $connect->prepare($sql);

    $statement->execute();

  }
  $error ="<div class='alert alert-success'>item and subitem added inserted successfully..</div>";
  header("Location:add_item_subitem.php?error=".$error."");
}


?>



