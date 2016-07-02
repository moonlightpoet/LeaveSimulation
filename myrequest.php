<?php
	session_start();
?>
<!DOCTYPE html>
<head>
	<title>LightInTheBox Request Site</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/magnific-popup.css" rel="stylesheet"> 
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	
</head>
<body>
	<div class="main-container">
		<nav class="main-nav">
			<div id="logo" class="left"><a href="#">Light<B>In</B>TheBox</a></div>
			<ul class="nav right center-text">
				<li class="btn"><a href="index.php">Home</a></li>
				<li class="btn"><a href="addrequest.php">Add Request</a></li>
				<li class="btn active">My Request</li>
				<li class="btn"><a href="requesttome.php">Request To Me</a></li>
				<?php
					if ($_SESSION['username'] == '') {
						echo '<li class="btn"><a href="index.php">Log In</a></li>';
					}
					else {
						echo '<li class="btn"><a href="index.php">' . $_SESSION['username'] . '</a></li>';
					}
				?>
			</ul>
		</nav>
		<div class="content-container">

<?php
	if ($_SESSION['username'] == '') {
		echo 'You don\'t have the permission, please log in first.' . '<br />';
?>
		</div>
	</div>
</body>
</html>
<?php
		exit();
	}
	// main logic
	
?>

my request<hr />
<table width="500px" border="1px">
	<tr>
		<th>id</th>
		<th>user</th>
		<th>starttime</th>
		<th>endtime</th>
		<th>status</th>
	</tr>
	
<?php
	@ $db = new mysqli('localhost', 'root', 'password', 'litb');
	
	if (mysqli_connect_errno()) {
?>
</table>
	error happened when trying to connect mysql<br />
		</div>
	</div>
</body>
</html>
<?php
		exit;
	}
	
	$query = "select * from request where user = '" . $_SESSION['username'] . "' and status = 'pending'";
	$result = $db->query($query);
	if (!$result) {
?>
</table>
		</div>
	</div>
</body>
</html>
<?php	
		exit;
	} 
	
	$num_results = $result->num_rows;
	
	for ($i=0; $i < $num_results; $i ++) {
		$row = $result->fetch_assoc();
		echo '<tr>';
		echo '<td>' . $row['id'] . '</td>';
		echo '<td>' . $row['user'] . '</td>';
		echo '<td>' . $row['starttime'] . '</td>';
		echo '<td>' . $row['endtime'] . '</td>';
		echo '<td><span style="color:red">' . $row['status'] . '</span></td>';
		echo '</tr>';
	}
	
?>
	
</table>

		</div>
	</div>
</body>
</html>
