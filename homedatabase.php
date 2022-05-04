<?php
$servername   = "localhost";
$database = "home";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
  // echo "Connected successfully";
?>

<?php
if(isset($_POST['save']))
{	 
	 $school_name = $_POST['school_name'];
     $department_name = $_POST['department_name'];
     $type = $_POST['type'];
	 $sql = "INSERT INTO homepage (school_name, department_name, type)
	 VALUES ('$school_name', '$department_name', '$type')";
	 if (mysqli_query($conn, $sql)) 
	 {
		header("Location: Next-home.php");;
	 } else 
	 {
		echo "Error: " . $sql . "
       " . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}

?>