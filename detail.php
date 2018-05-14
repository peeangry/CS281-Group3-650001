<?php
session_start();
include_once("db.php");
if(isset($_GET["varname"])){
	$getVarname=$_GET["varname"];
}
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
	                $sql = "SELECT * FROM products WHERE product_id=$getVarname";
	                $check_query = $con->query($sql); 

	                if ($check_query->num_rows > 0) {
	    				// output data of each row
	                    while($row = $check_query->fetch_assoc()) {
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
						<h1><?php  echo $infoName;?></h1>
						<hr/>
										<div class="row">
											<div class="col-md-6">
												<img style="float:right;" src="product_images/<?php echo $infoImage; ?>" class="img-responsive img-thumbnail"/>
											</div>
											<div class="col-md-6">
												<table>
													<tr><td>Product Name</td><td><b><?php echo $infoName?></b> </td></tr>
													<tr><td>Product Price</td><td><b><?php echo "$ ".$infoPrice; ?></b></td></tr>
													<tr><td>Detail</td><td><b><?php echo $infoDetail; ?></b></td></tr>
													
												</table>
											</div>
										</div>
										
					</div>
            	


			</div>
			<!-- <div class="col-md-2"></div> -->
			
		</div>
	</div>
	<?php
				$limit = 3;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	// echo $getVarname;
	$sql = "SELECT * FROM products WHERE product_id=$getVarname";
                $check_query = $con->query($sql); 
                $getPasent=$check_query->num_rows;
                // echo "XXXX".$getPasent;
                if ($check_query->num_rows > 0) {
    // output data of each row
                    while($row = $check_query->fetch_assoc()) {              	
                    		$cat=$row["product_cat"];               
                    }
                }else{
                    echo "no in database";
                }
     // echo $cat;           

	$product_query = "SELECT * FROM products WHERE product_cat=$cat LIMIT $start,$limit " ;
	$run_query = $con->query($product_query) or die($con->connect_error);
	if($run_query->num_rows > 0){
		while($row = $run_query->fetch_array(MYSQLI_ASSOC)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			// $pro_detail = $row['product_desc'];
			$pro_stock = $row['product_stock'];
		$pro_detail = 'xxxxxxx';
			
			echo "
						<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>

										<a href=\"detail.php?varname=$pro_id\"><img src='product_images/$pro_image' style='width:200px; height:200px;'/></a>
									
								</div>
								
							</div>
						</div>	
				</div>
				
				<script>
				
					$( document ).ready(function() {
						$( '#img_$pro_id' ).hover(
						  function() {
							console.log('in');
						  }, function() {
							console.log('out');
						  }
						)
					});
					
				</script>
			";
		}
	}
			?>
</body>
</html>
















































