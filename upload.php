<?php
include('connect.php');
//var_dump(isset($_POST["upload"]));
echo $id=$_POST['id'];

if(isset($_POST["upload"])){
$file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$folder="upload/";
$new_size = $file_size/1024;  
$new_file_name = strtolower($file);
$final_file=str_replace(' ','-',$new_file_name);
if(move_uploaded_file($file_loc,$folder.$final_file))
{
    $query="UPDATE `academic`
SET `file` = '$final_file',`type`='$file_type' ,`size`='$new_size'
WHERE `id`='$id'";
var_dump($query);
$statement = $connect->prepare($query);

            $statement->execute();
            $error="added";
            header('Location: academic.php?error=file uploaded successfully.');
            
          
}
else
{

    header('Location: academic.php?error=file uploaded unsuccessfully.');
     
     }
 }
  

    

    ?>