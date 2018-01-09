<?php
	session_start();
	
	$userexists = 0;
		
		$name = $_POST['email'];
		$password = $_POST["password"];
		$password = hash("sha256", $password);

		# validate
		if(!preg_match("/^[a-z]([a-z0-9]){2,7}$/",$name)){
			jsonResponse(1);
		}
		
		if(empty($name) || empty($password)){
			jsonResponse(1);
		}
		
		$connection = mysqli_connect("localhost","ahmad","ahmad");
		if(!$connection){
			jsonResponse(1);
			echo "can't connect";
		}
		
		if(!mysqli_select_db($connection,"passcrypter_database")){
			jsonResponse(1);
			echo "error selecting database";
		}
		
		$result = mysqli_query($connection,"SELECT * FROM User WHERE email = '$name'");
		while($row = mysqli_fetch_object($result)){
			$userexists++;
		}
	
		if($userexists != 0){
			jsonResponse(1);
			header("Location: start.php");
		}
		
		//user doesn't exist
		if($userexists === 0){
			
			if(!$connection){
				jsonResponse(1);
				echo "can't connect";
			}
			
			if(!mysqli_select_db($connection,"passcrypter_database")){
				jsonResponse(1);
				echo "error selecting database";
			}
			
			if(!mysqli_query($connection,"INSERT INTO User (email,password) VALUES ('$name', '$password')")){
				jsonResponse(1);
				echo "can't execute query";
			}
			
			mysqli_close($connection);
			$_SESSION["username"] = explode("@", $name)[0];
			$_SESSION["email"] = $name;
			jsonResponse(0);
		}
	
	
	function jsonResponse($success){
		$obj = new stdClass();
		if($success == 0){
			$obj -> succeeded = "True";
		}else{
			$obj -> succeeded = "False";
		}
		echo json_encode($obj);
		exit();
	}
?>