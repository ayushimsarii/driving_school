<?php 
include('connect.php');
echo $gradesheetid=$_REQUEST['gradesheetid'];
echo $username=$_REQUEST['username'];
echo $password=$_REQUEST['password'];
$password=md5($password);
$q2="SELECT * from users where studid='$username' and password='$password'";
        $statement1 = $connect->prepare($q2);
        $statement1->execute();
        if($statement1->rowCount() > 0)
        {
                    $result = $statement1->fetchAll();
                    foreach($result as $row)
                    {
                        $query="UPDATE `gradesheet` SET `status` = '0' WHERE `id`='$gradesheetid'";
                        var_dump($query);
                        $statement = $connect->prepare($query);
                        
                                    $statement->execute();
                                    $error="<div class='alert alert-warning'>Gradesheet Unlocked..</div>";
                                    header("Location:actual.php?error=".$error);
                    }}?>