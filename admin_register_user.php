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
        $create_datetime = date("Y-m-d H:i:s");
        $sql = "INSERT INTO `users` (name, phone,studid,nickname, username,role, password, email, gender, create_datetime) VALUES ('$name', '$phone','$studid','$nickname','$username','$role', '" . md5($password) . "', '$email', 'gender', '$create_datetime')";
        $statement = $connect->prepare($sql);
        $statement->execute();
        
            $error="<div class='alert alert-success'>You are register successfully..</div>";
            header('Location:usersinfo.php?error='.$error);
      
?>