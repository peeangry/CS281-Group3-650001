<?php
include_once("db.php");
class productOO{
    private $id;

    public function __construct($id){
        $this->id=$id;
    }
    
    public function getID(){
        echo $this->id;
        // echo $this->id;
    }
    public function printAllOrders(){
        $sql = "SELECT * FROM orders WHERE user_id=$this->id";
                    $check_query = $con->query($sql); 
                if ($check_query->num_rows > 0) {
                 // output data of each row
                    while($row = $check_query->fetch_assoc()) {
                        echo $row["product_id"]. " - Name: " . $row["cat_title"]. " ". "<br>";
                    }
                }else{
                    echo "no in database";
                }
    }

    public function getusername(){
        return $this->uname;
    }

    public function getpassword(){
        return $this->pword;
    }
}
?>