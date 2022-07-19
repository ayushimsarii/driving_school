<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Question Bank</title>
	<meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
	<!-- <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
    <link rel="stylesheet" href="sidestyle.css">
</head>
<body>
<?php
include_once 'header.php';
?>
<?php
include_once 'sidenavbar.php';
?>
<div class="container" id="quecontainer">
    <center>
        <div class="row" id="querow">
            <h4>Question Bank</h4>
            <form method="post" id="que-form" style="width:50%;">
                <label class="form-label">Question</label>
                <input class="form-control" placeholder="Insert Question"/><br>
                <label class="form-label">Answer</label>
                <input class="form-control" placeholder="Insert Answer"/>

                <button class="btn btn-outline-success">Submit</button>
            </form>
        </div>
    </center>
</div>

</body>
</html>