<?php 
include('connect.php');
$grade=$_REQUEST['grade'];

$grade_name=$_REQUEST['grade_name'];

foreach($grade_name as $grade_name=>$key){

 if($grade[$key] != ""){
    $value=$grade[$key];
     $query="UPDATE `grade_per` SET `permission` = '$value' WHERE `grade`='$key'";

        $statement = $connect->prepare($query);
             $statement->execute();
 }
 $error="permission updated";
 header('Location:usersinfo.php');
}
?>