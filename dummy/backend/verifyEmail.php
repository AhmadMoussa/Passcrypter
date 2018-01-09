<?php
	$userexists = 0;
	$connection = mysqli_connect("localhost","ahmad","ahmad");
	if(!$connection){
		jsonResponse(0);
		echo "can't connect";
	}
		
	if(!mysqli_select_db($connection,"passcrypter_database")){
		jsonResponse(0);
		echo "error selecting database";
	}
		
	$email = $_GET["email"];
	$result = mysqli_query($connection,"SELECT * FROM User WHERE email = '$email'");
	while($row = mysqli_fetch_object($result)){
		$userexists++;
	}
	
	if($userexists != 0){
		jsonResponse(0);
	}else{
		jsonResponse(1);
	}
	
	function jsonResponse($success){
		$obj = new stdClass();
		if($success == 0){
			$obj -> userExists = true;
		}else{
			$obj -> userExists = false;
		}
		echo json_encode($obj);
		exit();
	}
?>