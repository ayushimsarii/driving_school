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
            <link rel="stylesheet" type="text/css" href="sidestyle.css">
        </head>

<body class="bodylogin">
    <br><br><br><br><br>
<?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>
    <!-- registration of userd -->
<div class="container" id="containerlogin">
    <div class="form-container sign-up-container">
        <form action="registerdata.php">
            <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                    <span>or use your email for registration</span>
                    <!-- name -->
                            <input class="form-control" class="login-input" type="text" name="name" placeholder="Full Name" required>
                            <!-- number phone -->
                            <input class="form-control" type="tel" class="login-input" name="phone" placeholder="Enter Your Phone Number" required>
                               <!-- username -->
                             <input class="form-control" type="text" class="login-input" name="username" placeholder="Username" required />
                            <!-- Nick name -->
                            <input class="form-control" type="text" class="login-input" name="nickname" placeholder="Nick name" required />
                             <!-- email -->
                             <input class="form-control" type="text" class="login-input" name="email" placeholder="Email Adress">
                            <!-- password -->
                             <input class="form-control" type="password" name="password" placeholder="Password">
                            <!-- gender -->
                             <label class="" for="gender">Gender: </label>
                                <input type="radio" class="btn-check" name="gender" id="male" autocomplete="off" required>
                                <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>

                                <input type="radio" class="btn-check" name="gender" id="female" autocomplete="off" required>
                                <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>

                                <input type="radio" class="btn-check" name="gender" id="secret" autocomplete="off" required>
                                <label class="btn btn-sm btn-outline-secondary" for="secret">Secret</label>

                            <input class="btn btn-primary" type="submit" name="Register" value="Register" class="login-button">
                    </form>
    </div>


    <!-- login user -->
    <div class="form-container sign-in-container">
        <form action="logindata.php" method="get">
            <h1>Sign in</h1>
                        <div class="social-container">
                            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    <span>or use your account</span>
                        <!-- username -->
                        <input class="form-control" type="text" class="login-input" name="username" placeholder="User Id" autofocus="true"/>
                    <!-- password -->
                        <input class="form-control" type="password" id="password" class="login-input" name="password" placeholder="Password"/>
                        <!-- show password -->
                        <input type="checkbox" onclick="myFunction()" class="login-input">Show Password
                            <a href="#">Forgot your password?</a>
                         <input class="btn btn-primary" type="submit" value="Login" name="login" class="login-button"/>
        </form>
    </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
</div>


<!--  -->

<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="login.js"></script>
</body>
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>
</html>