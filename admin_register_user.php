<?php
    include('connect.php');
        
        $name=$_REQUEST['name'];
        $phone=$_REQUEST['phone'];
        $studid=$_REQUEST['studid'];
        $nickname=$_REQUEST['nickname'];
        $username=$_REQUEST['username'];
        $role=$_REQUEST['role'];
        $email=$_REQUEST['email'];
        $password=$_REQUEST['password'];
        $gender=$_REQUEST['gender'];
       
        $sql = "INSERT INTO `users` ( name, nickname,studid,role, phone,gender, username, email,password) VALUES ('$name', '$nickname','$studid','$role','$phone','$gender','$username','$email','" . md5($password) . "')";
        $statement = $connect->prepare($sql);
        $statement->execute();
              $error="<div class='alert alert-success'>You are register successfully..</div>";
            header('Location:usersinfo.php?error='.$error);
      
?>