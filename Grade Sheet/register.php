<!DOCTYPE html>
<html class="reghtml">
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
    <!-- <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
    <link rel="stylesheet" type="text/css" href="sidestyle.css">
</head>
<body id="regbody">
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
        $gender = stripslashes($_REQUEST['gender']);
        $gender = mysqli_real_escape_string($con, $gender);
        $create_datetime = date("Y-m-d H:i:s");
        
        $query    = "INSERT into `users` (name, role, phone, username, password, email, gender, create_datetime)
                     VALUES ('$name', '$role', '$phone','$username', '" . md5($password) . "', '$email', 'gender', '$create_datetime')";
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



<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Register Today</h3>
                        <p>Fill in the data below.</p>
                        <legend>Personal Info</legend>
                        <form class="requires-validation" novalidate>

                            <div class="col-md-12">
                               <input class="form-control" class="login-input" type="text" name="name" placeholder="Full Name" required>
                               <div class="valid-feedback">Name field is valid!</div>
                               <div class="invalid-feedback">Name field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                               <input class="form-control" class="login-input" type="text" name="std_id" placeholder="Student Id" required>
                               <div class="valid-feedback">Name field is valid!</div>
                               <div class="invalid-feedback">Name field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="tel" class="login-input" name="phone" placeholder="Enter Your Phone Number" required>
                                 <div class="valid-feedback">Email field is valid!</div>
                                 <div class="invalid-feedback">Email field cannot be blank!</div>
                            </div>

                           <div class="col-md-12">
                                <select class="form-select mt-3" name="role" required>
                                      <option selected disabled value="">Super Admin</option>
                                      <option value="course manager">Course Manager</option>
                                      <option value="phase manager">Phase Manager</option>
                                      <option value="Instructor">Instructor</option>
                                      <option value="student">Student</option>
                               </select>
                                <div class="valid-feedback">You selected a position!</div>
                                <div class="invalid-feedback">Please select a position!</div>
                           </div>

                           <div class="col-md-12">
                               <input class="form-control" type="text" class="login-input" name="username" placeholder="Username" required />
                               <div class="valid-feedback">username field is valid!</div>
                               <div class="invalid-feedback">username field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                               <input class="form-control" type="text" class="login-input" name="email" placeholder="Email Adress">
                               <div class="valid-feedback">email field is valid!</div>
                               <div class="invalid-feedback">email field cannot be blank!</div>
                            </div>

                           <div class="col-md-12">
                              <input class="form-control" type="password" name="password" placeholder="Password" required>
                               <div class="valid-feedback">Password field is valid!</div>
                               <div class="invalid-feedback">Password field cannot be blank!</div>
                           </div>


                           <div class="col-md-12 mt-3">
                            <label class="mb-3 mr-1" for="gender">Gender: </label>

                            <input type="radio" class="btn-check" name="gender" id="male" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>

                            <input type="radio" class="btn-check" name="gender" id="female" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>

                            <input type="radio" class="btn-check" name="gender" id="secret" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="secret">Secret</label>
                               <div class="valid-feedback mv-up">You selected a gender!</div>
                                <div class="invalid-feedback mv-up">Please select a gender!</div>
                            </div>

                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                          <label class="form-check-label">I confirm that all data are correct</label>
                         <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>
                        </div>
                  

                            <div class="form-button mt-3">
                                <input class="btn btn-primary" type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- <center>
    <form class="form" action="" method="post">
        <fieldset>
            <legend>Personal Info</legend> -->
            <!-- <input class="form-control" type="text" class="login-input" name="name" placeholder="Full Name" required /><br> -->
            <!-- <input class="form-control" type="text" class="login-input" name="role" placeholder="Your Role"><br> -->
            <!-- <label for="Instructor">Instructor</label> -->
                    <!-- <select class="form-control" class="login-input" type="text" name="role">
                      <option value="student">Student</option>
                      <option value="instructor">Instructor</option>
                      <option value="admin">Admin</option>
                      <option value="phasemanager">Phase Manager</option>
                    </select><br> -->
            <!-- <input class="form-control" type="tel" class="login-input" name="phone" placeholder="Enter Your Phone Number"><br> -->
            <!-- <input type="file" name="photo" placeholder="Insert Photo"> -->
          <!-- </fieldset><hr>
        <fieldset>
        <legend class="login-title">Registration</legend>
        <input class="form-control" type="text" class="login-input" name="username" placeholder="Username" required /><br>
        <input class="form-control" type="text" class="login-input" name="email" placeholder="Email Adress"><br>
        <input class="form-control" type="password" class="login-input" name="password" placeholder="Password"><br>
        </fieldset>
        <input class="btn btn-primary" type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form> -->
<?php
    }
?>
<!-- </center> -->
</body>
</html>