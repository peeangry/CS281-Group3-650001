<?php
include_once "db.php";
if (isset($_POST["add_categories"])) {

  $cartAdd = $_POST["add_categories"];
  if(empty($cartAdd)){
    echo "
      <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
      </div>
    ";
    exit();
  } 
  


  $sql = "SELECT cat_id FROM categories WHERE cat_title = '$cartAdd' LIMIT 1" ;
  $check_query = mysqli_query($con,$sql);
  $count_cat = mysqli_num_rows($check_query);

  if($count_cat > 0){
    echo "
      <div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>Categories is already available Try Another categories</b>
      </div>
    ";
    exit();
  }else{
      $sql = "INSERT INTO `categories` 
      (`cat_id`,`cat_title`) 
      VALUES (NULL,'$cartAdd')";
      $run_query = mysqli_query($con,$sql);
      mysqli_commit($con);
      mysqli_close($con);
      echo "<script>alert('Add categories Sucess');window.location='index.php'</script>";
      
        exit();
  } 
}

?>






















































