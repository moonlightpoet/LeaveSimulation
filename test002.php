<?php
	session_start();
	echo 'session : ' . $_SESSION['a'];
	
	if ($_SESSION['a'] == 'hah') {
		header("location: test003.php");
	}
?>