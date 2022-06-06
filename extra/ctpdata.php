

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
     if (mysqli_query($connect, $sql)) {
        echo "New record created successfully !";
     } else {
        echo "Error: " . $sql . "
" . mysqli_error($connect);
     }
     mysqli_close($connect);
}
?>