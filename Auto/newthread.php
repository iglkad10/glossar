<?php include_once("header.php");?>
<?php if(!(isset($_SESSION['username']))){
header("Location: login.php");}
if(isset($_POST['submit'])){
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$marke = $_POST['marke'];
$model = $_POST['model'];
$color = $_POST['color'];
$uname = $_SESSION['username'];
echo $name;

if ( $stmt = $mysqli->prepare("INSERT INTO Auto_Posts (name, description, price, marke, model, color, author) VALUES (?, ?, ?, ?, ?, ?, ?) ") ) {

	
    $stmt->bind_param( "ssisss", $name, $description, $price, $marke, $model, $color, $uname );
    $stmt->execute();
    $stmt->close();
	echo "Excecuted";
}
	
$mysqli->close();
//header("Location:index.php?m=created");
}
?>
		<h3>Open a new thread</h3>
		<form method="POST" action="">
			<table id="newthreadtable">
				<tr><td>Name of Topic: </td><td><input type="text" name="name"></td></tr>
				<tr><td>Description: </td><td><textarea name="description"></textarea></td></tr>
				<tr><td>Price: </td><td><input type="text" name="price"></td></tr>
				<tr><td>Marke: </td><td><input type="text" name="marke"></td></tr>
				<tr><td>Model: </td><td><input type="text" name="model"></td></tr>
				<tr><td>Color: </td><td><input type="text" name="color"></td></tr>
				<tr>
					<td><input type="reset" value="Reset"></td>
					<td><input type="submit" value="Submit" name="submit" value ="submit"></td>
				</tr>
			</table>
		</form>
<?php include_once("footer.php");?>