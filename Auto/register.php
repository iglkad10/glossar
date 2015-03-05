<?php include_once("header.php");
require("PasswordHash.php");?>
<?
if(isset($_POST['submit'])){
echo "hello?";
$username = $_POST['username'];
/*if ( $stmt = $mysqli->prepare("SELECT username FROM Auto_Kunde WHERE username = ? ") ) {

    $stmt->bind_param( "s", $username );
    $stmt->execute();
	if( $stmt->num_rows > 0) {
		echo "User ".$user." already exists!";
	}
	$stmt->close();
}*/
if($_POST['password'] != $_POST['confirm_password']){
echo "</br>Same password twice ffs!</br>";
exit();
}

$password = $_POST['password'];
$email = $_POST['email'];
$hasher = new PasswordHash(8, FALSE);
$hash = $hasher->HashPassword($password);

if ( $stmt = $mysqli->prepare("INSERT INTO Auto_Kunde (username, password, email) VALUES (?, ?, ?) ") ) {

	
    $stmt->bind_param( "sss", $username, $hash, $email );
    $stmt->execute();
    $stmt->close();
	echo "Excecuted";
}
	
$mysqli->close();
header("Location:login.php?r=registered");
}
?>


<form name="register" id="register" method="post" action="">
<section>
<label for="username">Username:</label>
<div>
<input type="text" tabindex="1" class="input" id="username" name="username" value=""/>
</div>
</section>
<section>
<label for="email">Email:</label>
<div>
<input type="text" tabindex="2" class="input" id="email" name="email" value=""/>
</div>
</section>
<section>
<label for="password">Password</label>
<div>
<input type="password" tabindex="3" class="input" id="password" name="password" value=""/>
</div>
</section>
<section>
<label for="confirm_password">Confirm Password</label>
<div>
<input type="password" tabindex="4" class="input" id="confirm_password" name="confirm_password" value=""/>
</div>
</section> 

<br/>
<div class="btnbox">
<input type="submit" tabindex="5" id="submit" class="sbutton" value="submit" name="submit" />
</div>
</form>

</body>
</html>
