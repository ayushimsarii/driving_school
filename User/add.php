<?php
include_once 'database1.php';
if(isset($_POST['Insert']))
{	 
	 $item = $_POST['item'];

	 $sql = "INSERT INTO bank (item)
	 VALUES ('$item')";
	 if (mysqli_query($conn, $sql)) 
	 {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>