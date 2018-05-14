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
// echo "$getVarname";
$cto = "DELETE FROM favorite  WHERE user_id='$check' AND product_id='$getVarname'";
if ($con->query($cto) === TRUE) {
    echo " record Delete successfully";
    
} 	
 	echo "<script>window.location='favorite.php'</script>";


?>
