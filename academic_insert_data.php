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
										    if($_POST["academic"]=="" || $_POST["shortacademic"]=="" || $_POST["ptype"]=="" || $_POST["percentage"]=="")
										    {
                                                $error = "<div class='alert alert-danger'>Academic class is require</div>";
												header("Location:phase-view.php?phase_id=".$phase_id."&error=".$error."&ctp=".$ctp."&phase=".$phase);
										    }
										    else
										        {
                                                    var_dump($_POST['phase']);
										            $academic = $_POST['academic'];
		                                            $shortacademic = $_POST['shortacademic'];
													$ptype = $_POST['ptype'];
													$percentage = $_POST['percentage'];
										            
										            foreach ($academic as $key => $value) {
										            $query ="INSERT into academic(academic, shortacademic, ptype, percentage, phase,ctp) values('".$value."', '".$shortacademic[$key]."','".$ptype[$key]."','".$percentage[$key]."','$phase','$ctp')";
										           
										            //var_dump($query);

										            $statement = $connect->prepare($query);

										            $statement->execute();

                                                    $error ="<div class='alert alert-primary'>Academic class inserted successfully..</div>";
													header("Location:phase-view.php?phase_id=".$phase_id."&error=".$error."&ctp=".$ctp."&phase=".$phase);
										          }
										        }
										    }
										?>