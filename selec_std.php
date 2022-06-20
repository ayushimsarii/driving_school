<?php 
include('connect.php');
echo $course=$_POST['course'];
$query1 = "SELECT * FROM newcourse where CourseName='$course'";
                   $statement1 = $connect->prepare($query1);
                   $statement1->execute();
                  
                   if($statement1->rowCount() > 0)
                       {
                           $result1 = $statement1->fetchAll();
                           echo '<option value="" readonly>Select student</option>'; 
                            foreach($result1 as $row1)
                        {
                            
                            echo '<option value="'.$row1['StudentNames'].'">'.$row1['StudentNames'].'</option>';
                        }
                    }else{
                        echo '<option>no student</option>';
                    }
?>          