<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Users Page</title>
	<!-- <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
	<!-- <link rel="stylesheet" type="text/css" href="sidestyle.css"> -->
</head>
<style type="text/css">
	#userbutton
	{
		margin: 10px;
	}
	.btn-primary:hover, .btn-primary:focus, .btn-primary:active,{
    background-color: #F24C4C;
    outline: none !important;
    border: none !important;
     box-shadow: none;
}
#btn-success:hover, #btn-success:focus, #btn-success:active
{
	background-color: #F24C4C;
    outline: none !important;
    border: none !important;
     box-shadow: none;
}
#btn-warning:hover, #btn-warning:focus, #btn-warning:active
{
	background-color: #F24C4C;
    outline: none !important;
    border: none !important;
     box-shadow: none;
     color: white;
}
a
{
	color: white;
	text-decoration: none;
}
</style>
<body>
<?php
include_once 'header.php';
?>

<?php
include_once 'sidenavbar.php';
?>
<center>
<div id="userbutton">
	<button class="btn btn-success" id="btn-success"><a href="roles.php">Manage Roles</a></button>
	<button class="btn btn-primary"><a href="register_user.php">Register User</a></button>
	<button class="btn btn-warning" id="btn-warning"><a href="user_list.php">User List</a></button>
</div>
</center>


<?php
include_once 'footer.php';
?>
</body>
</html>