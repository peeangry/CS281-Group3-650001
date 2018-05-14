<?php
include_once "db.php";
if (isset($_POST["idstock"])) {

  $cart_ID = $_POST["idstock"];
  $num_stock=$_POST["numstock"];

  $number = "/^[0-9]+$/";
  if(empty($cart_ID)||empty($num_stock)){
      echo "<script>alert('PLease in put all field');window.location='index.php'</script>";
    exit();
  }else{
    if(!preg_match($number,$cart_ID)){
         echo "<script>alert('PLease in num in --PRICE--');window.location='index.php'</script>";
         exit();
    }
  } 
        $sql="UPDATE products SET product_stock = '$num_stock' WHERE product_id = '$cart_ID'";
        if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
    echo "<br>" ;
  echo "<a href='loginsucess.php'><button > Back </button></a>";
      
} else {
    echo "Error updating record: " . $con->error;
}

        exit();
  }   

?>



















