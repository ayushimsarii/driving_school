<?php
include('connect.php');
if(isset($_POST["savephase"]))
	{
       if(empty($_POST["phase"]))
			{
				$error = "<div class='alert alert-danger'>Phase Name required..</div>";
			}
				else
					{
						$phase = $_POST["phase"];
						foreach ($phase as $key => $value) 
						{
							var_dump($value);						
							$sql = "INSERT INTO phase (phasename) VALUES ('".$value."')";

							$statement = $connect->prepare($sql);

							$statement->execute();

					        }
						$error ="<div class='alert alert-success'>Data inserted successfully..</div>";
                        header("Location:Next-home.php?error=".$error);
					}
			}
?>