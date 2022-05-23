<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
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
        margin: 10px;
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
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $role = stripslashes($_REQUEST['role']);
        $role = mysqli_real_escape_string($con,$role);
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con,$username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "' AND role='$role'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
              if($role == 'student'){
                header("Location: Home.php");
        }elseif($role == 'instructor'){
            header("Location: dashboard.php");
        }elseif($role == 'admin'){
            header("Location: dashboard.php");
        }elseif($role == 'phasemanager'){
            header("Location: dashboard.php");
        }
           
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<center>
    <form class="form" method="post" name="login">
        <h3 class="login-title">Login</h3>
        <select class="form-control" type="text" name="role">
                      <option value="student">Student</option>
                      <option value="instructor">Instructor</option>
                      <option value="admin">Admin</option>
                      <option value="phasemanager">Phase Manager</option>
                    </select>
        <input class="form-control" type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input class="form-control" type="password" class="login-input" name="password" placeholder="Password"/>
        <input class="btn btn-primary" type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="register.php">New Registration</a></p>
  </form>
<?php
    }
?>
</center>
</body>
</html>