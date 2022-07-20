<?php 
echo $grade=$_REQUEST['grade'];
echo $gradeuserid=$_REQUEST['gradeuserid'];
echo $ins_id=$_REQUEST['ins_id'];
var_dump($grade == "" || $gradeuserid == "" || $ins_id =="");
if($grade == "" || $gradeuserid == "" || $ins_id ==""){
header('Location:actual.php');
}else{
    
}
?>