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
<form name="register" id="register" method="post" action="">
<section>
<label for="username">Username:</label>
<div>
<input type="text" tabindex="1" class="input" id="username" name="username" value=""/>
</div>
</section>
<section>
<label for="password">Password</label>
<div>
<input type="password" tabindex="3" class="input" id="password" name="password" value=""/>
</div>
</section>

<br/>
<div class="btnbox">
<input type="submit" tabindex="5" id="submit" class="sbutton" value="submit" name="submit" />
</div>
</form>
<?php include_once("footer.php");?>