<?php
session_start();


if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
	if(isset($_GET["varname"])){
	$getVarname=$_GET["varname"];
}
include "db.php";
$db = $con;

$check=$_SESSION["uid"];
$cto = "INSERT INTO favorite (user_id,product_id) VALUES ($check,$getVarname)";
if ($con->query($cto) === TRUE) {
    echo "New record created successfully";
    
} 	
 	echo "<script>window.location='profile.php'</script>";


?>
