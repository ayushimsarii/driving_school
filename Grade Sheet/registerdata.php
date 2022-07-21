<?php
    include('connect.php');
        
        $name=$_REQUEST['name'];
     
        $phone=$_REQUEST['phone'];
        $username=$_REQUEST['username'];
        $email=$_REQUEST['email'];
        $password=$_REQUEST['password'];
        $gender=$_REQUEST['gender'];
        $create_datetime = date("Y-m-d H:i:s");
        $sql = "INSERT INTO `users` (name, phone, username, password, email, gender, create_datetime) VALUES ('$name', '$phone','$username', '" . md5($password) . "', '$email', 'gender', '$create_datetime')";
        $statement = $connect->prepare($sql);
        $statement->execute();
        
            $error="<div class='alert alert-success'>You are register successfully..</div>";
            header('Location:login.php?error='.$error);
      
?>