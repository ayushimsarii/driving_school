

<?php
include_once 'connect.php';
if(isset($_POST['submit']))
{    

     $course = $_POST['course'];
     $manual = $_POST['manual'];
     $type = $_POST['type'];
     $vehtype = $_POST['vehtype'];
     $CourseCode = $_POST['CourseCode'];
     $Sponcors = $_POST['Sponcors'];
     $Location = $_POST['Location'];
     $CourseAim = $_POST['CourseAim'];
     $ClassSize = $_POST['ClassSize'];
     
     $sql = "INSERT INTO ctppage (course,manual,type,vehtype,CourseCode,Sponcors,Location,CourseAim,ClassSize)
      VALUES ('$course','$manual','$type','$vehtype','$CourseCode','$Sponcors','$Location','$CourseAim','$ClassSize')";

     $statement = $connect->prepare($sql);

     $statement->execute();
     $error ="<div class='alert alert-primary'>Successfully Added Course Training Plan</div>";
          header("Location:Next-home.php?ctp=".$course);
    
}
?>