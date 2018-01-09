<?php 
		session_start();
		if(!isset($_SESSION["username"])){
			header("Location: ../../index.php");
			exit();
		}
		
		
		//get info submitted by form
		$website = $_POST["websiteUrl"];
		$domain = getDomain($website);
		$email = $_POST["email"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$iv = $_POST["iv"];
		$tag = $_POST["tag"];
		
		//establish connection
		$connection = mysqli_connect("localhost","ahmad","ahmad");
		if(!$connection){
			jsonResponse(1);
		}
		
		if(!mysqli_select_db($connection,"passcrypter_database")){
			jsonResponse(1);
		}
	
		//search for right user in database then inject info into right table
		$user = $_SESSION["email"];
		$result = mysqli_query($connection,"SELECT UserId FROM User WHERE email = '$user'");
		$row = mysqli_fetch_assoc($result);
		$name = $row["UserId"];
		
		$response = new stdClass();
		if(!mysqli_query($connection,"INSERT INTO Credentials (UserId, SiteName, username, email, password, iv, Tag, Domain) 
			VALUES ('$name', '$website', '$username', '$email', '$password', '$iv','$tag', '$domain')")){
				jsonResponse(1,$name);
		}else{
			jsonResponse(0,$name);
		}
					
							
		mysqli_close($connection);
		jsonResponse(0, $name);	
	
	function jsonResponse($success, $id){
		$obj = new stdClass();
		if($success == 0){
			$obj -> isSuccesful = true;
		}else{
			$obj -> isSuccesful = false;
		}
		$obj -> userId = $id;
		echo json_encode($obj);
		exit();
	}
	
	function getDomain($url) {
		$regex = "/^(?:https?:\/\/)?(?:[^@\n]+@)?(?:www\.)?([^:\/\n]+)/im";
		preg_match($regex, $url, $matches);
		$domain = $matches[1];
		
		return explode(".", $domain)[0];
	}
?>