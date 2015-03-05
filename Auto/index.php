<?php include_once("header.php");?>
<?php if($_GET['m']=="logged"){
echo "<h2>You are now logged! ";}
if($_GET['m']=="created"){
echo "<h2>The thread is created! ";}
if(isset($_SESSION['username'])){echo "<h2>Logged as ".$_SESSION['username'].".</h2>";}
?>
<h3>Cars comming soon!</h3></br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
<?php include_once("footer.php");?>