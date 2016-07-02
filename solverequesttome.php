<?php
	session_start();
	
	//echo 'hello.<br />';
	//echo 'id : ' . $_POST['id'] . '<br />';
	
	//foreach($_POST as $k=>$v)
    //{
    //     echo $k."=>".$v;
    //}

	$id = $_POST['id'];
	$method = $_POST['method'];
	$method = $method == 'accept' ? 'accepted' : 'refused';
	$user_name = $_POST['user'];
	$user_mail = $_POST['email'];
	
	//echo 'id : ' . $id . '<br />';
	//echo 'method : ' . $method . '<br />';
	
	// mysql deal
	
	@ $db = new mysqli('localhost', 'root', 'password', 'litb');
	
	if (mysqli_connect_errno()) {
		echo 'connect to mysql error';
		exit;
	}
	
	$query = "update request set status = '" . $method . "' where id = " . $id;
	$result = $db->query($query);
	//echo 'result : ' . $result;
	
	// mail deal
	require("phpmailer/mysendmail.php");
	
	$to_name = $user_name;
	$to_email = $user_mail;
	//$to_email = 'moonlight@lightinthebox.com';
	$title = 'your request is ' . $method . ' by you boss';
	
	$boss_name = $_POST['boss'];
	$starttime = $_POST['starttime'];
	$endtime = $_POST['endtime'];
	
	$body = 'you request from ' . $starttime . ' to ' . $endtime . ' is ' . $method . ' by your boss ' . $boss_name . '<br />';
	
	send_func($to_name, $to_email, $title, $body);
	
	header('location : requesttome.php');
?>
