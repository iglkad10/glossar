<?php include_once("header.php");
require("PasswordHash.php");?>
<?
if($_GET['r'] == "registered"){
echo "<h2>You were successfully registered! Now log in.</h2>";
}
if(isset($_POST['submit'])){
$username = $_POST['username'];
$password = $_POST['password'];

if ( $stmt = $mysqli->prepare("SELECT username, password FROM Auto_Kunde WHERE username = ? ") ) {

    $stmt->bind_param( "s", $username );
    $stmt->execute();
    $stmt->bind_result( $user, $pass );
    $stmt->fetch();
    $stmt->close();
}
	$hasher = new PasswordHash(8, FALSE);
	if ($hasher->CheckPassword($password, $pass)) { 
    echo "Authentication succeeded";
	} 
	else {
		echo "Authentication failed";
		exit();
	}
	$_SESSION['username'] = $username;
	header("Location:index.php?m=logged");
}
$mysqli->close(); 
?>
<?php include_once("footer.php");?>