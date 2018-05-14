<?php
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
include_once "db.php";
$id =$_SESSION["uid"];
if (isset($_POST["f_name"])) {

	$f_name = $_POST["f_name"];
	$l_name = $_POST["l_name"];
	$mobile = $_POST['mobile'];
	$address1 = $_POST['address1'];
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

if(empty($f_name) || empty($l_name) || empty($mobile) || empty($address1) ){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	} else {
		if(!preg_match($name,$f_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $f_name is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($name,$l_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $l_name is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $mobile is not valid</b>
			</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 10 digit</b>
			</div>
		";
		exit();
	}
	//existing email address in our database
	$sql = "UPDATE user_info SET first_name='$f_name',last_name='$l_name', mobile='$mobile',address1='$address1' WHERE user_id='$id'" ;
	if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
    echo "<br>" ;
	echo "<a href='reciept.php'><button > Next To see Bill </button></a>";
    	//<form action="reciept.php"><input type="submit"  /></form>
		//echo "<button > Next To see Bill </button>" ;
} else {
    echo "Error updating record: " . $con->error;
}
	// $check_query = mysqli_query($con,$sql);

	// 	$sql = "INSERT INTO `bill_request` 
	// 	(`user_id`, `bill_name`,  `mobile`, `address1`) 
	// 	VALUES ('$id', '$f_name', '$mobile', '$address1')";
	// 	$run_query = mysqli_query($con,$sql);
	// 	if(mysqli_query($con,$sql)){
	// 		echo "register_success";
	// 		exit();
	// 	}
	
	}
	
}



?>

