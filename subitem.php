<?php
// error_reporting(0); 
include_once 'database.php';

if(isset($_POST['InsertSub']))
{	 
	 $subitem = $_POST['subitem'];
     // $subitem = $_POST['subitem'];
	 $sql = "INSERT INTO subitem (subitem)
	 VALUES ('$subitem')";
	 if (mysqli_query($conn, $sql)) 
	 {
		header("Location: http://localhost/Edu%20changed/pop.php"); 
	 } 
	 else 
	 {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>