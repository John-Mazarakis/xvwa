<?php
	session_start();
	$uname = $_POST['username'];
	$password = $_POST['password'];
	$ActiveUser = '';
	include_once('config.php');
	$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
	$sql = "select username from users where username=:username and password=:password";
	$stmt = $conn1->prepare($sql);
	$stmt->bindParam(':username',$uname);
	$stmt->bindParam(':password',$hashedPassword);
	$stmt->execute();
	while($rows = $stmt->fetch(PDO::FETCH_NUM)){
		$ActiveUser = $rows[0];
	}
	if(!empty($ActiveUser)){
		$_SESSION['user'] = $ActiveUser;
	}
	header("Location: /xvwa/");
	
?>
