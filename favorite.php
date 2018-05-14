<?php
session_start();
include_once("db.php");
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
		<style>
			table tr td {padding:10px;}
		</style>
	</head>
<body>
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
			<div class="col-md-8">

				<?php
	                $sql = "SELECT * FROM products,favorite WHERE products.product_id=favorite.product_id";
	                $check_query = $con->query($sql); 

	                if ($check_query) {
	    				// output data of each row
	                    while($row = $check_query->fetch_assoc()) {
	                    	$pro_id    = $row['product_id'];
	                        $infoName=$row["product_title"];
	                        $infoTitle=$row["product_title"];
	                        $infoPrice=$row["product_price"];
	                        $infoDetail=$row["product_desc"];
	                        $infoImage=$row["product_image"];
	                    }
	                }else{	              
	                    echo "<script>alert('No in database');window.location='index.php'</script>";
	                }
	            ?>
				<div class="panel-heading"></div>

					<div class="panel-body">
						<h1><?php  echo "Favorite";?></h1>
						<hr/>
											
								<?php 
									$sql = "SELECT * FROM products,favorite WHERE products.product_id=favorite.product_id";
	                $check_query = $con->query($sql); 

	                if ($check_query) {
	    				// output data of each row
	                    while($row = $check_query->fetch_assoc()) {
								?>
										<div class="row">
											<div class="col-md-6">
												<img style="float:right;" src="product_images/<?php echo $row["product_image"]; ?>" class="img-responsive img-thumbnail"/>
											</div>
											<div class="col-md-6">

												<table>

													<tr><td>Product Name</td><td><b><?php echo $row["product_title"]?></b> </td></tr>
													<tr><td>Product Price</td><td><b><?php echo "$ ".$row["product_price"]; ?></b></td></tr>
													<tr><td>Detail</td><td><b><?php echo $row["product_desc"]; ?></b></td></tr>
													
												</table>
											</div>
											<a href='RemoveFavorite.php?varname=<?php echo $row["product_id"] ;?>'<button style='float:left;' class='btn btn-danger btn' >Remove </button></a>
										</div>

						<?php }

							}
								?>
										
					</div>
            	


			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>
















































