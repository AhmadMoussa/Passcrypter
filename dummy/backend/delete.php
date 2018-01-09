<?php
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: ../../index.php");
		exit();
	}
	
	$domain = $_GET["domain"];
	$connection = mysqli_connect("localhost","ahmad","ahmad");
		if(!$connection){
			jsonResponse(0);
			echo "can't connect";
		}
		
		if(!mysqli_select_db($connection,"passcrypter_database")){
			jsonResponse(0);
			echo "error selecting database";
		}
		
		$user = $_SESSION["email"];
		$result = mysqli_query($connection,"SELECT UserId FROM User WHERE email = '$user'");
		$row = mysqli_fetch_assoc($result);
		$name = $row["UserId"];
		
		mysqli_query("DELETE FROM Credentials WHERE UserId = '$name' AND domain = '$domain'");
?>