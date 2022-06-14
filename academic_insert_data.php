<?php
										include('connect.php');
										$error = '';
										$output = '';
                                        $phase_id=$_POST['phase_id'];
										$phase=$_POST['phase'];
										$ctp=$_POST['ctp'];
										//var_dump(isset($_POST["add1"]));
										if (isset($_POST['submit_academic'])) 
										{
										    //var_dump(empty($_POST["name"] || empty($_POST["symbol"])));
										    if($_POST["academic"]=="" || $_POST["shortacademic"]=="")
										    {
                                                $error = "<div class='alert alert-danger'>Academic class is require</div>";
												header("Location:phase-view.php?phase_id=".$phase_id."&error=".$error."&ctp=".$ctp."&phase=".$phase);
										    }
										    else
										        {
                                                    var_dump($_POST['phase']);
										            $academic = $_POST['academic'];
		                                            $shortacademic = $_POST['shortacademic'];
										            
										            foreach ($academic as $key => $value) {
										            $query ="INSERT into academic(academic, shortacademic, phase,ctp) values('".$value."', '".$shortacademic[$key]."','$phase_id','$ctp')";
										           
										            //var_dump($query);

										            $statement = $connect->prepare($query);

										            $statement->execute();

                                                    $error ="<div class='alert alert-primary'>Academic class inserted successfully..</div>";
													header("Location:phase-view.php?phase_id=".$phase_id."&error=".$error."&ctp=".$ctp."&phase=".$phase);
										          }
										        }
										    }
										?>