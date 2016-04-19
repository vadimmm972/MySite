<?php
	// require "Header.php";
	//print_r($_POST);
	//if($_POST["name"] == "")
	//	echo "Enter name <a href = '/'> Exit </a>";
	//else
	//header("Location:index.php");
	// echo "Name: ".$_GET["name"];
	// echo"</br>";
	// echo "Email:". $_GET["email"];
	// echo"</br>";
	// echo "Message:". $_GET["message"];
	
	
	
	
	$mysqli = new mysqli ("localhost","root","","Message");
	$email = $_POST["email"];
	if(preg_match("/^[a-z0-9](([_\.-]?[a-z0-9]+)*){0,19}@([a-z0-9]([_-]?[a-z0-9]+)?\.){1,3}[a-z]{2,6}$/i",$email))
	{
				$login = isset($_POST["login"]) && is_string($_POST["login"]) ?  $mysqli->real_escape_string(trim(strip_tags($_POST["login"]))) : false;
			$email = isset($email) && is_string($email) ? $mysqli->real_escape_string(trim(strip_tags($email))) : false;
			 $message = isset($_POST["message"]) && is_string($_POST["message"]) ? $mysqli->real_escape_string(trim(strip_tags($_POST["message"]))) : false;
			
			
			
				
				
			
			
			
			
			$data_arr = [];
			if($mysqli->real_query("INSERT INTO message (`Email`,`Login`,`Message`) VALUES ('$email','$login','$message')"))
			{
				$data_arr["res"] = "success";
				$data_arr["login"] = $login;
				$data_arr["email"] = $email;
				$data_arr["mess"] = htmlspecialchars_decode(stripslashes($message));
			}
			else
			{
				$data_arr["res"] = "ErrorMessage : " . $mysqli->connect_error . "\nErrorCode : " . $mysqli->errno;
			}

	}
	else
	{
		$data_arr["res"] = "error";
	}
	$data_arr = json_encode($data_arr);
	echo $data_arr;	
?>