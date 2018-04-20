<?php
include_once "db.php";
if (isset($_POST["emailinfo"])) {

	$emailinfo = $_POST["emailinfo"];
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	if(empty($emailinfo)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	} else {
		if(!preg_match($emailValidation,$emailinfo)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $email is not valid..!</b>
			</div>
		";
		exit();
		}
	}


	$sql = "SELECT ID FROM email_info WHERE email = '$emailinfo' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);

	if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email Address is already available Try Another email address</b>
			</div>
		";
		exit();
	}else{
			$sql = "INSERT INTO `email_info` 
			(`ID`,`email`) 
			VALUES (NULL,'$emailinfo')";
			$run_query = mysqli_query($con,$sql);

			echo "<script>alert('sucess');window.location='index.php'</script>";

				exit();
	}	
}

?>






















































