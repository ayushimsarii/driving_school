<?php
include_once 'database.php';
if(isset($_POST['radiobtn']))
{   
	 $radio = $_POST['radio'];
	 $sql = "INSERT INTO bank (radio)
	 VALUES ($radio')";
	 if (mysqli_query($conn, $sql)) 
	 {
		echo "New record created successfully !";
	 } else 
	 {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>