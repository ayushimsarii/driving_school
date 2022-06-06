

<?php
include_once 'connect.php';
if(isset($_POST['submit']))
{    

     $course = $_POST['course'];
     $manual = $_POST['manual'];
     $CourseCode = $_POST['CourseCode'];
     $Sponcors = $_POST['Sponcors'];
     $Location = $_POST['Location'];
     $CourseAim = $_POST['CourseAim'];
     $ClassSize = $_POST['ClassSize'];
     $sql = "INSERT INTO ctppage (course,manual,CourseCode,Sponcors,Location,CourseAim,ClassSize)
      VALUES ('$course','$manual','$CourseCode','$Sponcors','$Location','$CourseAim','$ClassSize')";

     $statement = $connect->prepare($sql);

     $statement->execute();
     $error ="<div class='alert alert-primary'>Successfully Added Course Training Plan</div>";
          header("Location:ctp.php?error=".$error);
    
}
?>