<?php 
include ("connect.php");
$value=array();
$value1=array();
$std_idie=$_REQUEST['std_idies'];
$class_id=$_REQUEST['class_id'];
$phase_id=$_REQUEST['phase_id'];
$ctp_id=$_REQUEST['ctp_id'];
foreach($std_idie as $std_idies=>$key){
  $value[]=$std_idie[$std_idies];
  
}
//var_dump($value);
$std_sub=$_REQUEST['std_sub'];
foreach($std_sub as $std_subs=>$key){
    $value1[]=$std_sub[$std_subs];
}

var_dump($value);
var_dump($value1);
foreach($value as $index => $values) {
 
  $subject=$value1[$index];
 

   var_dump($subject);
   var_dump($values);


  if($subject == "item"){
    $sql = "INSERT INTO item (item,course_id,class_id,phase_id) VALUES ('$values','$class_id','$phase_id','$ctp_id')";

    $statement = $connect->prepare($sql);

    $statement->execute();
   
 
  }
  else{
    $sql = "INSERT INTO subitem (item,subitem,course_id,class_id,phase_id) VALUES ('$values','$subject','$class_id','$phase_id','$ctp_id')";

    $statement = $connect->prepare($sql);

    $statement->execute();

  }
  $error ="<div class='alert alert-success'>item and subitem added inserted successfully..</div>";
  header("Location:add_item_subitem.php?error=".$error."");
}


?>



