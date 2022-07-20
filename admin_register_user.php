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

        if($_FILES['image']['name']){
          move_uploaded_file($_FILES['image']['tmp_name'], "image/".$_FILES['image']['name']);
          $img="image/".$_FILES['image']['name'];
        }
       echo var_dump();
        $sql = "INSERT INTO `users` ( image,name, nickname,studid,role, phone,gender, username, email,password) VALUES ('$file','$name', '$nickname','$studid','$role','$phone','$gender','$username','$email','" . md5($password) . "')";
        $statement = $connect->prepare($sql);
        $statement->execute();
              $error="<div class='alert alert-success'>You are register successfully..</div>";
            header('Location:usersinfo.php?error='.$error);
    
      
?>