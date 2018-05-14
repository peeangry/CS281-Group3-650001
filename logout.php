<?php

include_once("db.php");
if (isset($_SESSION["admin"])) {
	session_destroy();
}
header("location:index.php");

?>