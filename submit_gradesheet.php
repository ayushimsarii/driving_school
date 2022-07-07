<?php 
include ("connect.php");
// var_dump($_REQUEST['stud_db_id']);
$stud_db_id=$_REQUEST['stud_db_id'];
echo $phases_id=$_REQUEST['phases_id'];
echo $course_id=$_REQUEST['course_id'];
echo $class_id=$_REQUEST['class_id'];
echo $class_name=$_REQUEST['class_name'];
echo $instructor_id=$_REQUEST['instructor_id'];
echo $vechile_id=$_REQUEST['vechile_id'];
echo $time=$_REQUEST['time'];
echo $date=$_REQUEST['date'];
$overall_grade=$_REQUEST['overall_grade'];
$overall_grade_per=$_REQUEST['overall_grade_per'];
$sql1 = "INSERT INTO gradesheet (user_id,phase_id,course_id,class_id,class,instructor,vehicle,time,date,over_all_grade)
 VALUES ('$stud_db_id','$phases_id','$course_id','$class_id','$class_name','$instructor_id','$vechile_id','$time','$date','$overall_grade')";
  $statement1 = $connect->prepare($sql1);
  $statement1->execute();
$value=array();
$value1=array();
$value2=array();
$std_idie=$_REQUEST['std_idies'];
foreach($std_idie as $std_idies=>$key){
  $value[]=$std_idie[$std_idies];
  
}

$std_sub=$_REQUEST['std_sub'];
foreach($std_sub as $std_subs=>$key){
    $value1[]=$std_sub[$std_subs];
}
$items_id=$_REQUEST['items_id'];
foreach($items_id as $items_ids=>$key){
  $value2[]=$items_id[$items_ids];
}
 $grade=$_REQUEST['grade'];

// var_dump($value);
// var_dump($value1);
// var_dump($value2);
foreach($value as $index => $values) {
  $item_id=$value2[$index];
  $subject=$value1[$index];
  $grade_c=$subject.$values;
  $final_grade=$grade[$grade_c];//grade
var_dump($item_id);
  if($subject == "item"){
    $sql = "INSERT INTO  item_gradesheet (user_id,item_id,grade) VALUES ('$stud_db_id','$item_id','$final_grade')";

    $statement = $connect->prepare($sql);

    $statement->execute();

  }
else{
    $sql = "INSERT INTO subitem_gradesheet (user_id,subitem_id,grade) VALUES ('$stud_db_id','$item_id','$final_grade')";

    $statement = $connect->prepare($sql);

    $statement->execute();
    //header('Location:demo1.php');
  }
 header('Location:actual.php');
}


?>


