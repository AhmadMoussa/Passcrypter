<?php
	session_start();
	
	$userexists = 0;
	
	$name = $_GET["email"];
	$pass = $_GET["password"];
	$pass = hash("sha256", $pass);

	# validate
	if(!preg_match("/^[a-z]([a-z0-9]){2,7}$/",$name)){
		jsonResponse(0);
	}

	if(empty($name) || empty($pass)){
		jsonResponse(0);
	}
	
	$connection = mysqli_connect("localhost","ahmad","ahmad");
	if(!$connection){
		jsonResponse(0);
	}
	
	if(!mysqli_select_db($connection,"passcrypter_database")){
		jsonResponse(0);
	}
	
	$result = mysqli_query($connection,"SELECT * FROM User WHERE email = '$name' AND password = '$pass'");
	while($row = mysqli_fetch_object($result)){
		$userexists++;
	}

	mysqli_close($connection);
	
	if($userexists == 0){
		jsonResponse(1);	
	}else{
		$_SESSION["username"] = explode("@", $name)[0];
		$_SESSION["email"] = $name;
		jsonResponse(0);
	}

	function jsonResponse($success){
		$obj = new stdClass();
		if($success == 0){
			$obj -> loggedIn = true;
		}else{
			$obj -> loggedIn = false;
		}
		echo json_encode($obj);
		exit();
	}
?>