<?php
if(!isset($_SESSION["uid"])){
    header("location:index.php");
}
include_once("dbOO.php");
include_once("orderClass.php");
class orderOO{
    private $userID;
    private $orderID;
    private $arr =[];
    //private $database = new dbOO('localhost', 'root', '');
    public function __construct($id){
        $this->userID=$id;
        
    }
    
    public function getID(){
        echo $this->id;
        // echo $this->id;
    }
    public function printAllOrders(){
        require 'config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM orders WHERE user_id=$this->userID";
                    $check_query = $conn->query($sql); 
                if ($check_query->num_rows > 0) {
                 // output data of each row
                    while($row = $check_query->fetch_assoc()) {
                        // echo $row["order_id"]." ".$row["product_id"]." ".$row["p_status"]." " ;
                        $arr=new orderClass($row["order_id"],$row["product_id"],$row["p_status"]);
                    }
                }else{
                    echo "no in database";
                }
    }
    public function getArr(){
        echo $this->arr[0]->getIdOrder();
    }
}

?>