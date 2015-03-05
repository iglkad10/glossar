<?php require_once 'connect.php';?>
<?php if(isset($_SESSION['username'])){ $logged = true; }?>
<head>
		<title>You and The World</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
		<div><img src="Pics/AutoBanner.png" width="1031px" ID="Banner">
		<table width="1031px" id="menutable">
			<th><a href="index.php">Home</th>
			<th><a href="threads.php">My Threads</th>
			<?php if($logged){
			echo '<th><a href="newthread.php">New Thread</th>'; }
			else{
			echo '<th><a href="register.php">Register</th>'; }?>
			<?php if($logged){
			echo '<th><a href="logout.php">Log out</th>'; }
			else{
			echo '<th><a href="login.php">Login</th>'; }?>
			<th><a href="search.php">Search</th>
		</table></div><div id="mid">