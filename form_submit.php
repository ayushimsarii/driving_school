<?php 
include ("connect.php");
$value=array();
$value1=array();
$std_idie=$_REQUEST['std_idies'];

foreach($std_idie as $std_idies=>$key){
  $value[]=$std_idie[$std_idies];
  
}
//var_dump($value);
$std_sub=$_REQUEST['std_sub'];
foreach($std_sub as $std_subs=>$key){
    $value1[]=$std_sub[$std_subs];
}
$grade=$_REQUEST['grade'];
//var_dump($grade);

foreach($value as $index => $values) {
 
  $subject=$value1[$index];
  $grade_c=$subject.$values;
  $final_grade=$grade[$grade_c];//grade
   var_dump($subject);
   var_dump($values);
  var_dump($final_grade);
  var_dump($subject == "item");
  if($subject == "item"){
    $sql = "INSERT INTO item (item,grade) VALUES ('$values','$final_grade')";

    $statement = $connect->prepare($sql);

    $statement->execute();
    header('Location:demo1.php');
  }else{
    $sql = "INSERT INTO subitem (item,subitem,grade) VALUES ('$values','$subject','$final_grade')";

    $statement = $connect->prepare($sql);

    $statement->execute();
    header('Location:demo1.php');
  }
//   $query="UPDATE `student` SET `$subject` = '$final_grade' WHERE `id`='$values'";
 
// $statement = $connect->prepare($query);
// $statement->execute();
}


?>



