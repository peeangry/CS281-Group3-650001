<?php
session_start();
include_once "db.php";
if (isset($_POST["f_name"])) {

	$f_name = $_POST["f_name"];
	$l_name = $_POST["l_name"];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$mobile = $_POST['mobile'];
	$address1 = $_POST['address1'];
	$address2 = "user";
	

	class member extends db{
		private $user_id;
		private $first_name;
		private $last_name;
		private $email;
		private $password;
		private $repassword;
		private $mobile;
		private $address1;
		private $address2;

		public function __construct($user_idc,$first_namec,$last_namec,$emailc,$passwordc,$repasswordc,$mobilec,$address1c,$address2c)
		{
			$this->user_id=$user_idc;
			$this->first_name=$first_namec;
			$this->last_name=$last_namec;
			$this->email=$emailc;
			$this->password=$passwordc;
			$this->repassword=$repasswordc;
			$this->mobile=$mobilec;
			$this->address1=$address1c;
			$this->address2=$address2c;
		}
		public function registerToDb(){
			$name = "/^[a-zA-Z ]+$/";
			$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
			$number = "/^[0-9]+$/";

			if(empty($this->first_name) || empty($this->last_name) || empty($this->email) || empty($this->password) || empty($this->repassword) || empty($this->mobile) || empty($this->address1) || empty($this->address2)){
				echo "<script>alert('1PLease Fill all fields..!');window.location='customer_registration.php'</script>";
				exit();
			} else {
				if(!preg_match($name,$this->first_name)){
					echo "<script>alert('2this $f_name is not valid..!');window.location='customer_registration.php'</script>";
					exit();
				}
				if(!preg_match($name,$this->last_name)){
					echo "<script>alert('3this $l_name is not valid..!');window.location='customer_registration.php'</script>";
					exit();
				}
				if(!preg_match($emailValidation,$this->email)){
					echo "<script>alert('4this $email is not valid..!');window.location='customer_registration.php'</script>";
					exit();
				}
				if(strlen($this->password) < 9 ){
					echo "<script>alert('5Password is weak');window.location='customer_registration.php'</script>";
					exit();
				}
				if(strlen($this->repassword) < 9 ){
					echo "<script>alert('6Password is weak');window.location='customer_registration.php'</script>";
					exit();
				}
				if($this->password != $this->repassword){
					echo "<script>alert('7password is not same');window.location='customer_registration.php'</script>";
				}
				if(!preg_match($number,$this->mobile)){
					echo "<script>alert('8Mobile number $mobile is not valid');window.location='customer_registration.php'</script>";
					exit();
				}
				if(!(strlen($this->mobile) == 10)){
					echo "<script>alert('9Mobile number must be 10 digit');window.location='customer_registration.php'</script>";
					exit();
				}
				//existing email address in our database
				$this->sql = "SELECT user_id FROM user_info WHERE email = '$this->email' LIMIT 1" ;
				$this->check_query = mysqli_query($con,$this->sql);
				$this->count_email = mysqli_num_rows($this->check_query);
				if($this->count_email > 0){
					echo "<script>alert('11Email Address is already available Try Another email address');window.location='customer_registration.php'</script>";
					exit();
				} else {
					$this->password = md5($this->password);
					$this->sql = "INSERT INTO `user_info` 
					(`user_id`, `first_name`, `last_name`, `email`, 
					`password`, `mobile`, `address1`, `address2`) 
					VALUES (NULL, '$f_name', '$l_name', '$email', 
					'$password', '$mobile', '$address1', '$address2')";
					$this->run_query = mysqli_query($this->con,$this->sql);
					$_SESSION["uid"] = mysqli_insert_id($this->con);
					$_SESSION["name"] = $this->f_name;
					$ip_add = getenv("REMOTE_ADDR");
					$this->sql = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id = -1";
					if(mysqli_query($con,$sql)){
						echo "register_success";
						exit();
					}
				}
			}
		}
		public function getfname(){
			echo $this->first_name;
		}
		public function check(){
			if(empty($this->first_name)){
				
				echo "empty";
			}else{
				echo "yesss";
			}
		}
		public function checkPreg(){
			$name = "/^[a-zA-Z ]+$/";
			$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
			echo $this->email;
			if(!preg_match($emailValidation,$this->email)){
				echo "not math";

			}else{
				echo "math";
			}
		}
	}
		$memberAdd=new member(NULL,$f_name,$l_name,$email,$password,$repassword,$mobile,$address1,$address2); 
		// $memberAdd->getfname();
		  $memberAdd->registerToDb();
		// $memberAdd->checkPreg();
}
?>	
	