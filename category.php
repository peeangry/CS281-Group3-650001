<?php


session_start();
$ip_add = getenv("REMOTE_ADDR");

class category
{
	
	public function __construct()
	{
		

	}
	public function display()
	{
		include_once "db.php";
		$brand_query = "SELECT * FROM brands";
		$run_query = mysqli_query($con,$brand_query);
		echo "
			<div class='nav nav-pills nav-stacked'>
				<li class='active'><a href='#'><h4>Brands</h4></a></li>
		";
		if(mysqli_num_rows($run_query) > 0){
			while($row = mysqli_fetch_array($run_query)){
				$bid = $row["brand_id"];
				$brand_name = $row["brand_title"];
				echo "
						<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
				";
			}
			echo "</div>";
		}
	}
	
}
$test = new category();
$test->display();
?>