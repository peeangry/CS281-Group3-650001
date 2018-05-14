<?php
session_start();
if(!isset($_SESSION["uid"])){
  header("location:index.php");
}
include_once "db.php";
$id =$_SESSION["uid"];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>PChana Store</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <script src="js/jquery2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
<body>
<div class="wait overlay">
  <div class="loader"></div>
</div>
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
      <div class="col-md-8" id="signup_msg">
      </div>
      <div class="col-md-2"></div>
    </div>


    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="panel panel-primary">
          <div class="panel-heading">Order In Cart</div>
          <div class="panel-body">
          
            
            <div class="row">
              <div class="col-md-6">
                
                 <?php 
                    $sql = "SELECT * FROM cart,products WHERE p_id=product_id AND user_id =$id";
                          $check_query = $con->query($sql);
                          if ($check_query) {
                              while($row = $check_query->fetch_assoc()) {

                                echo"<br><br>"."<b>"."Phone : ". $row["product_title"]."<br>"."Price : ".$row["product_price"] ."<br>"."Quantity : ".$row["qty"]. "<br><br>";
                                echo "--------------------------------------------------";
                              }
                          }else{
                             echo "no in database";
                         }
                  ?> 


              </div>
            </div>
            <p><br/></p>
            <div class="row">
              <div class="col-md-12">
                <form method="post" action="delivery.php">
                  <input style="width:100%;" value="Next" type="submit" name="Bill_button" class="btn btn-success btn-lg">
                </form>
                
              </div>
            </div>
            
          </div>
        
          <div class="panel-footer"></div>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>


    
  </div>
</body>
</html>





















