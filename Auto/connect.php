<?php
session_start();
ob_start();
$mysqli = new mysqli("dd24526.kasserver.com", "d01a0454", "1nsy3B", "d01a0454");
			if(mysqli_connect_errno()){
				echo "<p>No connection with DB, WTFF", mysqli_connect_error(), "</p>\n";
				exit();
}
?>