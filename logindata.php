
<?php
include("connect.php");
$username=$_REQUEST['username'];
$password=$_REQUEST["password"];
$password=md5($password);
// check user count 
if (isset($_REQUEST['username'])) {
    $q="SELECT * from users where studid='$username' and password='$password'";
    $statement = $connect->prepare($q);
    $statement->execute();
  
       if($statement->rowCount() > 0)
    {
        $q2="SELECT * from users where studid='$username' and password='$password'";
        $statement1 = $connect->prepare($q2);
        $statement1->execute();
                    $result = $statement1->fetchAll();
                    foreach($result as $row)
                    {session_start();
                        $role=$row['role'];
                        $query = "SELECT * FROM roles where roles='$role'";
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        foreach($statement as $row){
                            if($row != ""){
                            echo $data=$row['permission'];  
                            $test = unserialize($data);
                            $_SESSION['permission'] = $test;
                            }
                           }
                        $_SESSION['id']=$row['id'];
                        $_SESSION['nickname']=$row['nickname'];
           
                        $_SESSION['role']=$role;
                        if($role == 'student'){
                            header("Location: Home.php");
                    }elseif($role == 'Course Manager'){
                        header("Location: Home.php");
                    }elseif($role == 'Phase Manager'){
                        header("Location: Home.php");
                    }elseif($role == 'instructor'){
                        header("Location: Home.php");
                    }elseif($role == 'super admin'){
                        header("Location: Home.php");
                    }
                    }
       
        
    }else {
        $error="<div class='alert alert-danger'>Invalid Username Or password..</div>";
        header("Location:login.php?error=".$error);
    }
  
}

?>