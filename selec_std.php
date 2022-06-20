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
                            $std_id=$row1['StudentNames'];
                            $query2 = "SELECT * FROM users where id='$std_id'";
                            $statement2 = $connect->prepare($query2);
                            $statement2->execute(); 
                            if($statement2->rowCount() > 0)
                            {
                                $result2 = $statement2->fetchAll();
                                foreach($result2 as $row2)
                                {
                                    echo '<option value="'.$row2['id'].'">'.$row2['name'].'</option>';
                                }
                            }
                            
                        }
                    }else{
                        echo '<option>no student</option>';
                    }
?>         