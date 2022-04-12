<?php
include_once 'database.php';
if(isset($_POST['Insert']))
{	 
	 $item = $_POST['item'];
     // $subitem = $_POST['subitem'];
	 $sql = "INSERT INTO itembank (item)
	 VALUES ('$item')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>