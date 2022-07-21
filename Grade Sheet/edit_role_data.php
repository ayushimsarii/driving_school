<?php 
echo $id=$_REQUEST['id'];
include('connect1.php');
$role=$_REQUEST['role'];
$show_p=$_REQUEST['show_p']?$_REQUEST['show_p']:'0';
$show_c=$_REQUEST['show_c']?$_REQUEST['show_c']:'0';
$actual=$_REQUEST['actual']?$_REQUEST['actual']:'0';
$sim=$_REQUEST['sim']?$_REQUEST['sim']:'0';
$Academic=$_REQUEST['Academic']?$_REQUEST['Academic']:'0';
$Task=$_REQUEST['Task']?$_REQUEST['Task']:'0';
$Student=$_REQUEST['Student']?$_REQUEST['Student']:'0';
$Emergency=$_REQUEST['Emergency']?$_REQUEST['Emergency']:'0';
$Testing=$_REQUEST['Testing']?$_REQUEST['Testing']:'0';
$Qual=$_REQUEST['Qual']?$_REQUEST['Qual']:'0';
$Clearance=$_REQUEST['Clearance']?$_REQUEST['Clearance']:'0';
$Class=$_REQUEST['Class']?$_REQUEST['Class']:'0';
$Memo=$_REQUEST['Memo']?$_REQUEST['Memo']:'0';
echo $role;echo $show_p;echo $show_c;
$array=serialize(array("show_p"=>$show_p,
"show_c"=>$show_c,
"actual"=>$actual,
"sim"=>$sim,
"Academic"=>$Academic,
"Task"=>$Task,
"Student"=>$Student,
"Emergency"=>$Emergency,
"Testing"=>$Testing,
"Qual"=>$Qual,
"Clearance"=>$Clearance,
"Class"=>$Class,
"Memo"=>$Memo,));
var_dump($array);
$sql ="UPDATE `roles` SET `permission` = '$array' WHERE `id`='$id'";;

$statement = $connect->prepare($sql);

$statement->execute();
header('Location:role-update.php?id='.$id.'&name='.$role);
?>
?>