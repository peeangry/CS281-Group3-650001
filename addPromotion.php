<?php
include_once "db.php";
if (isset($_POST["freedelivery"])) {

  $sql = "SELECT decreasenext FROM promotion WHERE id=(SELECT MAX(id) FROM `promotion`)";
                $check_query = $con->query($sql); 
                $getPasent=$check_query->num_rows;
                // echo "XXXX".$getPasent;
                if ($check_query->num_rows > 0) {
    // output data of each row
                    while($row = $check_query->fetch_assoc()) {               
                        $decreasen=$row["decreasenext"];               
                    }
                }else{
                    echo "no in database";
                }

  $cartAdd = $_POST["freedelivery"];
  if(empty($cartAdd)){
    echo "
      <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
      </div>
    ";
    exit();
  }else{
      $sql = "SELECT freedelivery FROM promotion";
      $check_query = mysqli_query($con,$sql);
      $sql = "INSERT INTO `promotion` 
      (`id`,`freedelivery`,`decreasenext`) 
      VALUES (NULL,'$cartAdd',$decreasen)";
      $run_query = mysqli_query($con,$sql);
      mysqli_commit($con);
      mysqli_close($con);
      echo "<script>alert('Add freedelivery Sucess');window.location='index.php'</script>";
        exit(); 
  } 
}

if(isset($_POST["decreasenext"])){


  $sql = "SELECT freedelivery FROM promotion WHERE id=(SELECT MAX(id) FROM `promotion`)";
                $check_query = $con->query($sql); 
                $getPasent=$check_query->num_rows;
                // echo "XXXX".$getPasent;
                if ($check_query->num_rows > 0) {
    // output data of each row
                    while($row = $check_query->fetch_assoc()) {               
                        $freedeli=$row["freedelivery"];               
                    }
                }else{
                    echo "no in database";
                }

  $decrease=$_POST["decreasenext"];
  if(empty($decrease)){
    echo "
      <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
      </div>
    ";
    exit();
  }else{
    $sql = "SELECT decreasenext FROM promotion";
      $check_query = mysqli_query($con,$sql);
      $sql = "INSERT INTO `promotion` 
      (`id`,`freedelivery`,`decreasenext`) 
      VALUES (NULL,$freedeli,$decrease)";
      $run_query = mysqli_query($con,$sql);
      mysqli_commit($con);
      mysqli_close($con);
      echo "<script>alert('Add decreasenext Sucess');window.location='index.php'</script>";
      exit(); 
  }
}

?>