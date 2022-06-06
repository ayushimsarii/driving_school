
<?php
include_once 'connect.php';
   

     $coursename = $_POST['coursename'];
     $coursenumber = $_POST['coursenumber'];
     $role = $_POST['role'];
     $coursemanager = $_POST['coursemanager'];
     $Symbol = $_POST['Symbol'];
     $student = $_POST['student'];
     
     $sql = "INSERT INTO newcourse (CourseName,CourseNumber,Symbol,StudentNames,CourseManager,DrivingPhaseManager)
      VALUES ('$coursename','$coursenumber','$Symbol','$student','$coursemanager','$role')";

     $statement = $connect->prepare($sql);

     $statement->execute();
     header('Location:newcourse.php')

?>