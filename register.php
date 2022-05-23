<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<style type="text/css">
    input
    {
        margin: 5px;
        padding: 5px;
    }
    form
    {
        width: 30%;
        border: 1px solid black;
        margin-top: 30px;
        border-radius: 20px;
    }
    .form-control
    {
        width: 50%;
    }
</style>
<body>
<?php
    require('databaselogin.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($con, $name);
        $role = stripslashes($_REQUEST['role']);
        $role = mysqli_real_escape_string($con, $role);
        $phone = stripslashes($_REQUEST['phone']);
        $phone = mysqli_real_escape_string($con, $phone);
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        
        $query    = "INSERT into `users` (name, role, phone, username, password, email, create_datetime)
                     VALUES ('$name', '$role', '$phone','$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
<center>
    <form class="form" action="" method="post">
        <fieldset>
            <legend>Personal Info</legend>
            <input class="form-control" type="text" class="login-input" name="name" placeholder="Full Name" required /><br>
            <input class="form-control" type="text" class="login-input" name="role" placeholder="Your Role"><br>
            <!-- <label for="Instructor">Instructor</label> -->
                    <select class="form-control" type="text" name="role">
                      <option value="student">Student</option>
                      <option value="instructor">Instructor</option>
                      <option value="admin">Admin</option>
                      <option value="phasemanager">Phase Manager</option>
                    </select><br>
            <input class="form-control" type="tel" class="login-input" name="phone" placeholder="Enter Your Phone Number"><br>
            <!-- <input type="file" name="photo" placeholder="Insert Photo"> -->
          </fieldset><hr>
        <fieldset>
        <legend class="login-title">Registration</legend>
        <input class="form-control" type="text" class="login-input" name="username" placeholder="Username" required /><br>
        <input class="form-control" type="text" class="login-input" name="email" placeholder="Email Adress"><br>
        <input class="form-control" type="password" class="login-input" name="password" placeholder="Password"><br>
        </fieldset>
        <input class="btn btn-primary" type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</center>
</body>
</html>