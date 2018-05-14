<?php
include_once("db.php");
if (!isset($_SESSION["admin"])) {
    header("location:index.php");
} 

?>
<html>
    <head>
    </head>
    <body>
        <!-- <form method="post" action="send_mail.php">
        Subject :    <input type="text" name="mail_sub">
       <br/>
         Message :<textarea name="mail_msg" rows="10" cols="35"></textarea><br>
         
        <br/>
            <input type="submit" value="Send Email">
        </form> -->
        <font size="10">SENT EMAIL</font>
        <form action="send_mail.php" method="post">
            <label>Subject of email:</label><br>
            <input type="text" name="mail_sub" id="subject"/><br>
            <label>Body of email:</label><br>
            <textarea name="mail_msg" id="body" rows="10" cols="35"></textarea><br><br>
            <input type="submit" name="submit_email" value="Submit"/>
        </form>
        <label>---------------------------------------------------------------<br></label>
        <font size="10">ADD CATEGORIES</font> 
        <form action="addcategories.php" method="post">
            <label>Add Categories:</label><br>
            <input type="text" name="add_categories" id="add_categories"/><br><br>
            <input type="submit" name=submit_addcart value="Submit"/>
        </form>
        <label>---------------------------------------------------------------<br></label>
        <font size="10">ADD PRODUCT</font> 
        <form action="addnewproduct.php" method="post" enctype="multipart/form-data">
            <?php
                $sql = "SELECT * FROM categories";
                $check_query = $con->query($sql); 

                if ($check_query->num_rows > 0) {
    // output data of each row
                    while($row = $check_query->fetch_assoc()) {
                        echo "id: " . $row["cat_id"]. " - Name: " . $row["cat_title"]. " ". "<br>";
                    }
                }else{
                    echo "no in database";
                }

            ?>
            <label>Product Cart:(-ID-)</label><br>
            <input type="text" name="cat_pro" id="cat_pro"/><br>
            <label>Product Title:</label><br>
            <input type="text" name="title_pro" id="title_pro"/><br>
            <label>Product Price:</label><br>
            <input type="text" name="price_pro" id="price_pro"/><br>
            <label>Product detail:</label><br>  
            <textarea name="detail_pro" id="detail_pro" rows="10" cols="35"></textarea><br>
            
            <label>Product keywords:</label><br>
            <textarea name="key_pro" id="key_pro" rows="10" cols="35"></textarea><br>
            <label>Product image:</label><br>
            <input type="file" name="file_pro" accept=".jpg .jpeg .png" value=""><br><br>
            <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>submit</button>
        </form>
        </label> 
        <br><label>---------------------------------------------------------------<br></label>
        <font size="10">History Customer</font> <br><br> 
        <form action="history_customer.php" method="post"> 
            <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>Show History Customer</button> 
        </form> 
        
        <label>---------------------------------------------------------------<br></label>
        <font size="10">PROMOTION ADMIN</font><br>
        <?php
                $sql = "SELECT * FROM promotion WHERE id=(SELECT MAX(id) FROM `promotion`)";
                $check_query = $con->query($sql); 
                $getPasent=$check_query->num_rows;
                // echo "XXXX".$getPasent;
                if ($check_query->num_rows > 0) {
    // output data of each row
                    while($row = $check_query->fetch_assoc()) {              	
                    		echo " - Free Delivery : " . $row["freedelivery"]." - DecreaseNextTime : " . $row["decreasenext"]. "<br><br>";               
                    }
                }else{
                    echo "no in database";
                }

            ?>

        <form action="addPromotion.php" method="post">
            <label>Free Delivery:</label><br>
            <input type="text" name="freedelivery" id="freedelivery"/>
            <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>submit</button>
        </form>
        <form action="addPromotion.php" method="post">
            <label>Product DecreaseNext:</label><br>
            <input type="text" name="decreasenext" id="decreasenext"/>
            <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>submit</button>
        </form>

        <label>---------------------------------------------------------------<br></label>
        <font size="10">CHANGE STATUS</font><br>
        <label>Get Order ID:</label><br>
        <form action="addorder.php" method="get">
            <input type="text" name="orderid" id="orderid"/><br><br>
            <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>submit</button>
        </form>

        <label>---------------------------------------------------------------<br></label>
        <font size="10">HISTORY BILL</font><br>
        <label>Get People ID:</label><br>
        <form action="billid.php" method="post">
            <input type="text" name="uidgetbill" id="uidgetbill"/><br><br>
            <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>submit</button>
        </form>




        <label>---------------------------------------------------------------<br></label>
         <font size="10">Update Stock</font><br>
        <label> Id Product:</label><br>
        <form action="update_stock.php" method="post">
            <input type="text" name="idstock" id="idstock"/><br><br>
            <label> Quantity product:</label><br>
            <input type="text" name="numstock" id="numstock"/><br><br>
            <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>submit</button>
        </form>
        <label>---------------------------------------------------------------<br></label>
        <font size="10">Update Price</font><br>
        <label>Id Product:</label><br>
        <form action="update_price.php" method="post">
            <input type="text" name="idprice" id="idprice"/><br><br>
             <label>Price Product:</label><br>
            <input type="text" name="price" id="price"/><br><br>
            <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>submit</button>
        </form>
        <label>---------------------------------------------------------------<br></label>
        </label>
        <font size="10">Show Promotion</font><br>
        <label>Input Promotion:</label><br>
        <form action="promotion.php" method="post">
            <input type="text" name="promo" id="promo" size = "110"/><br><br>
            <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>submit</button>
        </form>
        <label>---------------------------------------------------------------<br></label>
        <form action="logout.php">
            <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>logout</button>
        </form>
        

    </body>
</html>