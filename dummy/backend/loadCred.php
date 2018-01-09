<?php
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: ../../index.php");
		exit();
	}

	$websiteURL = strtolower($_GET["url"]);
	
	//establish connection
	$connection = mysqli_connect("localhost","ahmad","ahmad");
	if(!$connection){
		//jsonResponse(1);
	}
		
	if(!mysqli_select_db($connection,"passcrypter_database")){
		//jsonResponse(1);
	}
	
	$user = $_SESSION["email"];
	$userQuery = mysqli_query($connection,"SELECT UserId FROM User WHERE email = '$user'");
	$userRow = mysqli_fetch_assoc($userQuery);
	$id = $userRow["UserId"];
	
	$arr = new stdClass();;
	
	$getRequest = mysqli_query($connection, "SELECT * FROM Credentials WHERE UserId = '$id' and Domain = '$websiteURL'");
	while($row = mysqli_fetch_assoc($getRequest)){
    	foreach($row as $cname => $cvalue){
    		$arr->$cname = utf8_encode($cvalue); 
    	}
    } 

	echo json_encode($arr);
    exit();
?>