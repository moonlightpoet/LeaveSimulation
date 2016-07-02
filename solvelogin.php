<?php
	session_start();
	//echo 'username : ' . $_POST['username'] . '<br />';
	//echo 'password : ' . $_POST['password'] . '<br />';
	//$_SESSION['username'] = $_POST['username'];
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	@ $db = new mysqli('localhost', 'root', 'password', 'litb');
	
	if (mysqli_connect_errno()) {
		$_SESSION['error'] = 'error happened while trying to connect mysql';
		exit;
	}
	
	$query = 'select * from user where username=\'' . $username . '\'';
	$result = $db->query($query);
	$num_results = $result->num_rows;
	if ($num_results == 0) {
		$_SESSION['error'] = 'no such user';
		header("location: index.php");
		exit;
	}
	
	$query = 'select * from user where username="' . $username . '" and password="' . $password . '"'; 
	$result = $db->query($query);
	$num_results = $result->num_rows;
	if ($num_results == 0) {
		$_SESSION['error'] = 'wrong password';
		header("location: index.php");
		exit;
	}
	
	$_SESSION['username'] = $username;
	
	
	//$_SESSION['error'] = 'no error';
	header("location: index.php");
?>
