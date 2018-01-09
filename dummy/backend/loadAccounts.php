<?php

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: ../../index.php");
		exit();
	}

	//establish connection
	$connection = mysqli_connect("localhost","ahmad","ahmad");
	if(!$connection){
		jsonResponse(1);
	}
		
	if(!mysqli_select_db($connection,"passcrypter_database")){
		jsonResponse(1);
	}
	
	$arr = array();
	
	$user = $_SESSION["email"];
	$userQuery = mysqli_query($connection,"SELECT UserId FROM User WHERE email = '$user'");
	$userRow = mysqli_fetch_assoc($userQuery);
	$id = $userRow["UserId"];
	
	$result = mysqli_query($connection, "SELECT DISTINCT Tag FROM Credentials WHERE UserId = '$id'");	
	
	$json = array();
	
	while($row = mysqli_fetch_assoc($result)){
	$siteArr = [];
    	foreach($row as $cname => $cvalue){
    		$tag = $cvalue;
   			$tagGroup = mysqli_query($connection, "SELECT SiteName FROM Credentials WHERE UserId = '$id' AND Tag = '$tag'");
   			
   			while($row2 = mysqli_fetch_assoc($tagGroup)){
    			foreach($row2 as $cname => $cvalue){
   					$site = new stdClass();
   					$site -> websiteUrl = $cvalue;
   					$site -> website = getDomain($cvalue);
   					$siteArr[] = $site;
   				}
   			}
   	
    	$json[$tag] = $siteArr;
    	
    	}
	}
	
	mysqli_close($connection);
    echo json_encode($json);  

	function getDomain($url) {
		$regex = "/^(?:https?:\/\/)?(?:[^@\n]+@)?(?:www\.)?([^:\/\n]+)/im";
		preg_match($regex, $url, $matches);
		$domain = $matches[1];
		
		return explode(".", $domain)[0];
	}
?>