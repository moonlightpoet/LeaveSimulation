<?php
	session_start();
	
	//echo 'starttime : ' . $_POST['starttime'] . '<br />';
	//echo 'endtime : ' . $_POST['endtime'] . '<br />';
	
	// insert into db
	@ $db = new mysqli('localhost', 'root', 'password', 'litb');
	
	if (mysqli_connect_errno()) {
		$_SESSION['error'] = 'error happened while trying to connect mysql';
		exit;
	}
	
	$user = $_SESSION['username'];
	$starttime = $_POST['starttime'];
	$endtime = $_POST['endtime'];
	$query = "insert into request (user, starttime, endtime, status) values ('" . $user . "', '" . $starttime . "', '" . $endtime . "', 'pending')";
	$result = $db->query($query);
	
	if (!$result) {
		$_SESSION['error'] = 'request add failed';
		header("location: addrequest.php");
		exit;
	}
	
	// send mail
	require("phpmailer/mysendmail.php");
	$query = "select * from user where username = '" . $user . "'";
	$result = $db->query($query);
	
	if (!$result) {
		$_SESSION['error'] = 'request add succeed but mail send failed';
		header("location: addrequest.php");
		exit;
	}
	
	$row = $result->fetch_assoc();
	$boss_name = $row['boss'];
	
	$query = "select * from user where username = '" . $boss_name . "'";
	$result = $db->query($query);
	
	if (!$result) {
		$_SESSION['error'] = 'request add succeed but mail send failed';
		header("location: addrequest.php");
		exit;
	}
	
	$row = $result->fetch_assoc();
	$boss_email = $row['email'];
	//$boss_email = 'moonlightpoet@lightinthebox.com';
	
	$title = $user . ' has send you a request';
	$body = 'check <a href="http://115.28.201.129/wupei/requesttome.php">here</a> to see.<br />';
	
	//echo 'boss name : ' . $boss_name . '<br />';
	//echo 'boss email : ' . $boss_email . '<br />';
	
	send_func($boss_name, $boss_email, $title, $body);
	
	$_SESSION['error'] = 'request add succeed';
	
	header("location: addrequest.php");
	
?>
