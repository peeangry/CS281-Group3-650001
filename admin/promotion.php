<?php
include_once "db.php";
if (isset($_POST["promo"])) {

  $cart_ID = $_POST["promo"];
  if(empty($cart_ID)){
      echo "<script>alert('PLease in put all field');window.location='index.php'</script>";
    exit();
  }
        $sql="UPDATE text_promotion SET news = '$cart_ID'";
        if ($con->query($sql) === TRUE) {
    echo "Show Promotion Successfully";
    echo "<br>" ;
  echo "<a href='loginsucess.php'><button > Back </button></a>";
      
} else {
    echo "Error updating record: " . $con->error;
}

        exit();
  }   

?>



















