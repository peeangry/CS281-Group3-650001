<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "ecom1";

/*PD STYLE
$con = mysqli_connect($servername, $username, $password,$db);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
*/

/*OO STYLE*/
 $con = new mysqli($servername, $username, $password,$db);
 if ($con->connect_error) {
     printf("Connection failed: " , $con->connect_error);
	 exit();
 }

?>
