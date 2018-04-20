<?php
include_once "db.php";
if (isset($_POST["cat_pro"])) {

  $cart_ID = $_POST["cat_pro"];
  $cart_brand=0;
  $cart_title = $_POST["title_pro"];
  $cart_price = $_POST["price_pro"];
  $cart_detail = $_POST["detail_pro"];
  $cart_key = $_POST["key_pro"];
  $cart_filepic = $_FILES["file_pro"]["name"];
  $enter="   ";
   // echo $cart_ID;echo $enter;
   // echo $cart_brand;echo $enter;
   // echo $cart_title;echo $enter;
   // echo $cart_price;echo $enter;
   // echo $cart_detail;echo $enter;
   // echo $cart_filepic;echo $enter;
   // echo $cart_key;echo $enter;

  $number = "/^[0-9]+$/";
  if(empty($cart_ID)||empty($cart_title)||empty($cart_price)||empty($cart_detail)||empty($cart_key)){
      echo "<script>alert('PLease in put all field');window.location='index.php'</script>";
    exit();
  }else{
    if(!preg_match($number,$cart_price)){
        echo "<script>alert('PLease in num in --PRICE--');window.location='index.php'</script>";
        exit();
    }
    else if(!preg_match($number,$cart_ID)){
         echo "<script>alert('PLease in num in --PRICE--');window.location='index.php'</script>";
         exit();
    }
  } 
      $sql = "INSERT INTO `products`
      (`product_id`,`product_cat`,`product_brand`,`product_title`,`product_price`,`product_desc`,`product_image`,`product_keywords`) 
        VALUES (NULL,'$cart_ID','$cart_brand','$cart_title','$cart_price','$cart_detail','$cart_filepic','$cart_key')";
      $run_query = mysqli_query($con,$sql);
      mysqli_commit($con);
      mysqli_close($con);
       move_uploaded_file($_FILES["file_pro"]["tmp_name"],"../product_images/".$cart_filepic);
      echo "<script>alert('sucess');window.location='index.php'</script>"; 
      // echo "<script>alert('Add categories Sucess');window.location='index.php'</script>";

        exit();
  }   

?>






















































