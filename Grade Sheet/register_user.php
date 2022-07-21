
<?php 

include_once 'connect.php';
$roles ="";
 $query = "SELECT * FROM roles ORDER BY id ASC";
 $statement = $connect->prepare($query);
 $statement->execute();

 if($statement->rowCount() > 0)
     {
         $result = $statement->fetchAll();
         $sn=1;
         foreach($result as $row)
         {
           if($row['roles'])
             $roles .= '<option value="'.$row['roles'].'">'.$row['roles'].'</option>';
         }
     
     }?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register User</title>
	<!-- <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
</head>
<body>
	<?php
include_once 'header.php';
?>
<?php
	if($role =='super admin'){
	include_once 'sidenavbar.php';
	}
	?>


<div class="container m-10"><br><br>
	<center>
 <form style="width: 60%; border: 2 px solid black;" class="form form-border" action="admin_register_user.php" novalidate>
 <?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>

                            <div class="col-md-12">
                               <input class="form-control" class="login-input" type="text" name="name" placeholder="Full Name" required>
                               <div class="valid-feedback">Name field is valid!</div>
                               <div class="invalid-feedback">Name field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                               <input class="form-control" class="login-input" type="text" name="studid" placeholder="Student Id" required>
                               <div class="valid-feedback">Name field is valid!</div>
                               <div class="invalid-feedback">Name field cannot be blank!</div>
                            </div>
                            <div class="col-md-12">
                               <input class="form-control" class="login-input" type="text" name="nickname" placeholder="Nickname" required>
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
                                <?php echo $roles ?>
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


                           <div class="col-md-12 mt-2">
                            <label class="mb-3 mr-1" for="gender">Gender: </label>

                            <input type="radio" class="btn-check" name="gender" id="male" value="male" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>

                            <input type="radio" class="btn-check" name="gender" id="female" value="female" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>

                            <input type="radio" class="btn-check" name="gender" id="secret" value="secret" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="secret">Secret</label>
                               <div class="valid-feedback mv-up">You selected a gender!</div>
                                <div class="invalid-feedback mv-up">Please select a gender!</div>
                            </div>

                        <!-- <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                          <label class="form-check-label">I confirm that all data are correct</label>
                         <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>
                        </div> -->
                  

                            <div class="form-button mt-2">
                                <input class="btn btn-primary" type="submit" name="submit" value="Register" class="login-button">
        <!-- <p class="link"><a href="login.php">Click to Login</a></p> -->
                            </div>
                        </form>
                </center>
              </div>
            </div>
          </div>
        </div>

</div>

<?php
include_once 'footer.php';
?>
</body>
</html>