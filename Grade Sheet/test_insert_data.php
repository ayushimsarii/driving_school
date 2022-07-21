<?php
										include('connect.php');
										$error = '';
										$output = '';
                                        $phase_id=$_POST['phase_id'];
										$phase=$_POST['phase'];
										$ctp=$_POST['ctp'];
										//var_dump(isset($_POST["add1"]));
										if (isset($_POST['submit_test'])) 
										{
										    //var_dump(empty($_POST["name"] || empty($_POST["symbol"])));
										    if($_POST["test"]=="" || $_POST["shorttest"]=="" || $_POST["ptype"]=="" || $_POST["percentage"]=="")
										    {
                                                $error = "<div class='alert alert-danger'>Test class is require</div>";
												header("Location:phase-view.php?phase_id=".$phase_id."&error=".$error."&ctp=".$ctp."&phase=".$phase);
										    }
										    else
										        {
                                                    var_dump($_POST['phase']);
										            $test = $_POST['test'];
		                                            $shorttest = $_POST['shorttest'];
													$ptype = $_POST['ptype'];
													$percentage = $_POST['percentage'];
										            
										            foreach ($test as $key => $value) {
										            $query ="INSERT into test(test, shorttest, ptype, percentage, phase,ctp) values('".$value."', '".$shorttest[$key]."','".$ptype[$key]."','".$percentage[$key]."','$phase_id','$ctp')";
										           
										            //var_dump($query);

										            $statement = $connect->prepare($query);

										            $statement->execute();

                                                    $error ="<div class='alert alert-primary'>Test class inserted successfully..</div>";
													header("Location:phase-view.php?phase_id=".$phase_id."&error=".$error."&ctp=".$ctp."&phase=".$phase);
										          }
										        }
										    }
										?>