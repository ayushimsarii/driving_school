<?php
include_once 'database.php';
if(count($_POST)>0) { 
mysqli_query($conn,"UPDATE bank set id='" . $_POST['id'] . "', item='" . $_POST['item'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM bank WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="gradesheet.php">Data List</a>
</div>
<input type="hidden" name="userid" class="txtField" value="<?php echo $row['id']; ?>">
<input type="text" name="userid"  value="<?php echo $row['id']; ?>">
<br>
Item: <br>
<input type="text" name="item" class="txtField" value="<?php echo $row['item']; ?>">
<br>

<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</body>
</html>