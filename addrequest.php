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
				<li class="btn active">Add Request</li>
				<li class="btn"><a href="myrequest.php">My Request</a></li>
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

<?php
	if ($_SESSION['error'] != '') {
		echo $_SESSION['error'] . '<br />';
		$_SESSION['error'] = '';
		echo 'refresh to add a new request<br />';
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

<script language="JavaScript" src="js/mydate.js"></script>
add a new request<hr />
<table width="500px" border="0px">  
	<form action="solveaddrequest.php" method="post">
		<tr>  
        <td>开始时间:</td>  
        <td><input type="text" name="starttime" onfocus="MyCalendar.SetDate(this)"></td>  
        </tr>  
        <tr>  
        <td>结束时间:</td>  
        <td><input type="text" name="endtime" onfocus="MyCalendar.SetDate(this)"></td>  
        </tr>  
        <tr>  
            <td><input type="submit" value="提交"></td>  
            <td><input type="submit" value="重置"></td>  
        </tr>  
	</form>
</table>


		</div>
	</div>
</body>
</html>