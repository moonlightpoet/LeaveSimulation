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
				<li class="btn"><a href="myrequest.php">My Request</a></li>
				<li class="btn active">Request To Me</li>		
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
	$boss_name = $_SESSION['username'];
	if ($boss_name != 'hr') {
		// this user is not HR
?>

<table width="800px" border="1px">
	<tr>
		<th>id</th>
		<th>user</th>
		<th>email</th>
		<th>boss</th>
		<th>starttime</th>
		<th>endtime</th>
		<th>status</th>
		<th>option</th>
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
	
		$query = "select request.id, request.user, user.email, request.starttime, request.endtime, request.status, user.boss from user, request where user.username = request.user and user.boss = '" . $boss_name . "' and request.status = 'pending'";
		$result = $db->query($query);
		if (!$result) {
?>
</table>
	no result<>
		</div>
	</div>
</body>
</html>
<?php
			exit;
		}
	
		// main logic
		$num_results = $result->num_rows;
	
		for ($i=0; $i < $num_results; $i ++) {
			$row = $result->fetch_assoc();
			echo '<form action="solverequesttome.php" method="post">';
			echo '<tr>';
			echo '<td><input type="hidden" name="id" value="' . $row['id'] . '">' . $row['id'] . '</td>';
			echo '<td><input type="hidden" name="user" value="' . $row['user'] . '">' . $row['user'] . '</td>';
			echo '<td><input type="hidden" name="email" value="' . $row['email'] . '">' . $row['email'] . '</td>';
			echo '<td><input type="hidden" name="boss" value="' . $row['boss'] . '">' . $row['boss'] . '</td>';
			echo '<td><input type="hidden" name="starttime" value="' . $row['starttime'] . '">' . $row['starttime'] . '</td>';
			echo '<td><input type="hidden" name="iendtime" value="' . $row['endtime'] . '">' . $row['endtime'] . '</td>';
			echo '<td><span style="color:red">' . $row['status'] . '</span></td>';
			
?>

	<td><input type="submit" name="method" value="accept"><input type="submit" name="method" value="refuse"></td>

<?php
			
			echo '</tr>';
			echo '</form>';
		}
		
?>

</table>

<?php
		
	} else {
		// this user is HR
?>

<table width="800px" border="1px">
	<tr>
		<th>id</th>
		<th>user</th>
		<th>email</th>
		<th>boss</th>
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
	
		$query = "select request.id, request.user, user.email, request.starttime, request.endtime, request.status, user.boss from user, request where user.username = request.user";
		$result = $db->query($query);
		if (!$result) {
?>
</table>
	no result<>
		</div>
	</div>
</body>
</html>
<?php
			exit;
		}
	
		// main logic
		$num_results = $result->num_rows;
		//echo 'num_results : ' . $num_results . '<br />';
	
		for ($i=0; $i < $num_results; $i ++) {
			$row = $result->fetch_assoc();
			echo '<form action="solverequesttome.php" method="post">';
			echo '<tr>';
			echo '<td>'. $row['id'] . '</td>';
			echo '<td>' . $row['user'] . '</td>';
			echo '<td>' . $row['email'] . '</td>';
			echo '<td>' . $row['boss'] . '</td>';
			echo '<td>' . $row['starttime'] . '">' . $row['starttime'] . '</td>';
			echo '<td>' . $row['endtime'] . '">' . $row['endtime'] . '</td>';
			
			$color = 'red';
			if ($row['status'] == 'accepted') $color = 'green';
			else if ($row['status'] == 'refused') $color = 'blue';
			
			echo '<td><span style="color:' . $color . '">' . $row['status'] . '</span></td>';
			
			echo '</tr>';
			echo '</form>';
		}
		
?>

</table>

<?php
		
	}
	
	
?>

		</div>
	</div>
</body>
</html>
