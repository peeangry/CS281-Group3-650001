<?php
session_start();
include_once("db.php");
if(!isset($_SESSION["uid"])){
    header("location:index.php");
}
        $check=$_SESSION["uid"];
        
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
                <a href="profile.php" class="navbar-brand">Mobile Shop</a>
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
                   



                ?>
                <div class="panel-heading"></div>

                    <div class="panel-body">
                        <h1>Status Orders</h1>
                        <hr/>
                                        <div class="row">
                                            <!-- <div class="col-md-6">
                                                <img style="float:right;" src="product_images/<?php echo $infoImage; ?>" class="img-responsive img-thumbnail"/>
                                            </div> -->
                                            <div class="col-md-6">
                                                <table>
                                                    <!-- <tr><td>Product Name</td><td><b><?php echo $infoName?></b> </td></tr>
                                                    <tr><td>Product Price</td><td><b><?php echo "$ ".$infoPrice; ?></b></td></tr>
                                                    <tr><td>Detail</td><td><b><?php echo $infoDetail; ?></b></td></tr> -->
                                                <?php
                                                    $sql = "SELECT * FROM orders WHERE user_id=$check";
                                                    $check_query = $con->query($sql); 

                                                    if ($check_query->num_rows > 0) {
                                                        while($row = $check_query->fetch_assoc()) {

                                                            echo " - OrderID : " . $row["order_id"]." - ProductID : " . $row["product_id"]." - ProductStatus : ". $row["p_status"]. "<br>";                                                                                                       
                                                        }
                                                    }else{
                                                        echo "no in database";
                                                    }
                                                ?>                                                   
                                                </table>

                                                <form action="recieptaction.php" method="post">
                                                	<br><br>
                                                	<!-- Get Bill : <input type="text" name="billtext"><br><br> -->
                                                	<input type="submit" name="submit">
                                                </form>                                           
                                            </div>
                                        </div>
                                        
                    </div>
                


            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>

















































