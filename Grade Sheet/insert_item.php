<?php
include('connect.php');
if(isset($_POST["Insert_item"]))
	{
       if(empty($_POST["item"]))
			{
				$error = "<div class='alert alert-danger'>Item Name required..</div>";
			}
				else
					{
						$item = $_POST["item"];
						foreach ($item as $key => $value) 
						{
							// var_dump($value);						
							$sql = "INSERT INTO itembank (item) VALUES ('".$value."')";

							$statement = $connect->prepare($sql);

							$statement->execute();

					        }
						$error ="<div class='alert alert-success'>Data inserted successfully..</div>";
                        header("Location:gradesheet.php?error=".$error."");
					}
			}
?>