<?php
include_once 'database.php';
if(isset($_POST['radiobtn']))
{    
	 $id = $_POST['id'];
	 $item = $_POST['item'];
	 $radio = $_POST['radio'];
	 $sql = "INSERT INTO bank (id,item,radio)
	 VALUES ($id,$item,$radio')";
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