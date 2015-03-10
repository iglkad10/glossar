<?php
session_start();
ob_start();

$myServer = "185.30.146.120";
$myUser = "Igli Kadija";
$myPass = "kadija1";
$myDB = "4B_Glossar_IgliKlevis"; 

$conn = mssql_connect($myServer, $myUser, $myPass)
  or die("Couldn't connect to SQL Server on $myServer"); 
?>