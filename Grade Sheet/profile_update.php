<?php
include_once 'connect.php';
if(isset($_POST["upload"])){ 
		
		$error = false;
		$status = "";

		//check if file is not empty
		if(!empty($_FILES["image"]["name"])) { 

			//file info 
	        $file_name = basename($_FILES["image"]["name"]); 
	        $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

	        //make an array of allowed file extension
	        $allowed_file_types = array('jpg','jpeg','png','gif');


	        //check if upload file is an image
	        if( in_array($file_type, $allowed_file_types) ){ 

            	$image = $_FILES['image']['tmp_name']; 
            	$img_content = addslashes(file_get_contents($image)); 
            	$title = $_POST['title'];

            	//Now run insert query
            	$query = $db->query("INSERT into users (image, title) VALUES ('$img_content', '$title')"); 

             
             	//check if successfully inserted
            	if($query){ 
                	$status = "Image has been successfully uploaded."; 
	            }else{ 
	            	$error = true;
	                $status = "Something went wrong when uploading image!!!"; 
	            }  
	        }else{ 
	        	$error = true;
	            $status = 'Only support jpg, jpeg, png, gif format'; 
	        } 

		}

	}
?>