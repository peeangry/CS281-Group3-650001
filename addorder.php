<?php
include_once "db.php";
if (isset($_GET["orderid"])) {

  $orderid = $_GET["orderid"];
  if(empty($orderid)){
    echo "
      <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
      </div>
    ";
    exit();
  } 
  


  $sql = "SELECT * FROM orders WHERE $orderid=order_id";
                $check_query = $con->query($sql); 
                $getPasent=$check_query->num_rows;
                // echo "XXXX".$getPasent;
                if ($check_query->num_rows > 0) {
    // output data of each row
                    while($row = $check_query->fetch_assoc()) {               
                        echo " - OrderID : " . $row["order_id"]." - UserID : " . $row["user_id"]." - Product_id : ".$row["product_id"]." - Time : ".$row["date_time"]." - Status : ".$row["p_status"]."<br><br>";               
                    }
                }else{
                    echo "no in database";
                    exit();
                }



}
?>
<!DOCTYPE html>
<html>
<body>
        <?php echo "Change OrderID : ".$orderid; ?>
        <form action="addorder.php" method="get">
            <input type="hidden" name="orderid" value="<?php echo $orderid; ?>" >
            <input type="radio" name="status" value="payment" checked> Payment<br>
            <input type="radio" name="status" value="senting"> Senting<br>
            <input type="radio" name="status" value="Completed"> Completed<br><br>
            <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>submit</button>
        </form>
        <?php 
          if(isset($_GET["status"])){
            $status=$_GET["status"];
            $orderid=$_GET["orderid"];

            $sql = "UPDATE orders SET p_status='$status' WHERE order_id='$orderid'";
            $check_query = $con->query($sql); 
          }
         ?>
        <form action="loginsucess.php">
          <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>back</button>
        </form>
</body>
</html>






















































