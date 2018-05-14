<?php
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
include_once "db.php";
$id =$_SESSION["uid"];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Mobile Shop</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Mobile Shop</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
			</div>
			<div class="col-md-2"></div>
		</div>


		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Address</div>
					<div class="panel-body">
					
						
						<div class="row">
							<div class="col-md-6">
								<label for="f_name">Name or Company</label>
								<?php
                					$sql = "SELECT * FROM user_info WHERE user_id =$id ";
                					$check_query = $con->query($sql); 
               						if ($check_query) {
               							echo "";
    							// output data of each row
                    					while($row = $check_query->fetch_assoc()) {

                        				echo"<br>". $row["first_name"] . "<br><br>";
                   				 		}
                					}else{
                   					 echo "no in database";
               					 }
								?>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="f_name">Last Name</label>
								<?php
                					$sql = "SELECT * FROM user_info WHERE user_id =$id ";
                					$check_query = $con->query($sql); 
               						if ($check_query) {
               							echo "";
    							// output data of each row
                    					while($row = $check_query->fetch_assoc()) {

                        				echo"<br>".  $row["last_name"]. "<br><br>";
                   				 		}
                					}else{
                   					 echo "no in database";
               					 }
								?>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="mobile">Mobile</label>
								<?php
                					$sql = "SELECT * FROM user_info WHERE user_id =$id ";
                					$check_query = $con->query($sql); 
               						if ($check_query) {
               							echo "";
    							// output data of each row
                    					while($row = $check_query->fetch_assoc()) {

                        				echo"<br>". $row["mobile"] .  "<br><br>";
                   				 		}
                					}else{
                   					 echo "no in database";
               					 }
								?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="address1">Address</label>
								<?php
                					$sql = "SELECT * FROM user_info WHERE user_id =$id ";
                					$check_query = $con->query($sql); 
               						if ($check_query) {
               							echo "";
    							// output data of each row
                    					while($row = $check_query->fetch_assoc()) {

                        				echo"<br>". $row["address1"] . "<br>";
                   				 		}
                					}else{
                   					 echo "no in database";
               					 }
								?>
							</div>
						</div>
						<p><br/></p>
						<div class="row">
							<div class="col-md-12">
								<form method="post" action="reciept.php">
									<input style="width:100%;" value="Next" type="submit" name="Bill_button" class="btn btn-success btn-lg">
								</form>
								
							</div>
						</div>
						
					</div>
				
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>


		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Request Bill</div>
					<div class="panel-body">
					
					<form action="rebill.php" method="post">
						<div class="row">
							<div class="col-md-6">
								<label for="f_name">Name or Company</label>
								<input type="text" id="f_name" name="f_name" class="form-control">
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="l_name">Lastname</label>
								<input type="text" id="l_name" name="l_name" class="form-control">
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="mobile">Mobile</label>
								<input type="text" id="mobile" name="mobile" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="address1">Address</label>
								<input type="text" id="address1" name="address1" class="form-control">
							</div>
						</div>
						<p><br/></p>
						<div class="row">
							<div class="col-md-12">
								<input style="width:100%;" value="Success" type="submit" name="Bill_button" class="btn btn-success btn-lg">
							</div>
						</div>
						
					</div>
					</form>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>





















