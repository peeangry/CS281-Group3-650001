<?php
if(!isset($_SESSION["uid"])){
    header("location:index.php");
}
include_once("dbOO.php");
        require 'config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM orders";
                    $check_query = $conn->query($sql); 
                if ($check_query->num_rows > 0) {
                 // output data of each row
                    while($row = $check_query->fetch_assoc()) {
                         echo $row["order_id"]." ".$row["product_id"]." ".$row["p_status"]." " ;
                        //$arr=new orderClass($row["order_id"],$row["product_id"],$row["p_status"]);
                    }
                }else{
                    echo "no in database";
                }
?>