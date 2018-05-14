<?php
class orderClass{
    private $idOrder;
    private $productOrder;
    private $statusOrder;
    public function __construct($idOrder,$productOrder,$statusOrder){
        $this->idOrder=$idOrder;
        $this->productOrder=$productOrder;
        $this->statusOrder=$statusOrder;
    }
    
    public function getIdOrder(){
        echo $this->idOrder;
    }
    public function getProductOrder(){
        echo $this->productOrder;
    }
    public function getStatusOrder(){
        echo $this->statusOrder;
    }
    public function setStatusOrder($statusOrder){
         $this->statusOrder=$statusOrder;
    }
}
?>