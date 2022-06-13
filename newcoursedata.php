
<?php
include_once 'connect.php';
   

     $coursename = $_POST['coursename'];
     $coursenumber = $_POST['coursenumber'];
     $Phase_manager = $_POST['Phase_manager'];
     $coursemanager = $_POST['coursemanager'];
     $Symbol = $_POST['Symbol'];
     $student = $_POST['student'];
     
     $sql = "INSERT INTO newcourse (CourseName,CourseNumber,Symbol,StudentNames,CourseManager,Phase_manager)
      VALUES ('$coursename','$coursenumber','$Symbol','$student','$coursemanager','$Phase_manager')";

     $statement = $connect->prepare($sql);

     $statement->execute();
     $error ="<div class='alert alert-primary'>Successfully Added New Course Plan</div>";
     header("Location:newcourse.php?error=".$error);
   

?>