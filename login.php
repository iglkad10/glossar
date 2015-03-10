<?php include_once("header.php");
require("PasswordHash.php");

if($_GET['r'] == "registered"){
echo "<h2>You were successfully registered! Now log in.</h2>";
}
if(isset($_POST['submit'])){
echo "WTF?";
$username = $_POST['username'];
$password = $_POST['password'];

	echo "hi?2";
$query = "SELECT Username, Password ";
$query .= "FROM [4B_Glossar_IgliKlevis].[dbo].[User] ";
$query .= "WHERE Username=$username";

$result = mssql_query($query);

$numRows = mssql_num_rows($result);
$user = $row["Username"];
$pass = $row["Password"];
echo $user,$pass;
//display the results 
	
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
$conn->close(); 
?>
<?php include_once("footer.php");?>