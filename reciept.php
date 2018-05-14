<?php
session_start();
include_once "db.php";
if(!isset($_SESSION["uid"])){
  header("location:index.php");
}
$uid=$_SESSION["uid"];
require "fpdf181/fpdf.php";
$db = new PDO('mysql:host=localhost;dbname=ecom1','root','');
class myPDF extends FPDF{
  function header()
  {
    $this->SetFont('Arial','B',20);
    $this->Cell(276,5,'Mobile Shop',0,0,'C');
    $this->Ln(10);
    $this->Cell(276,5,'History Sale Reciept',0,0,'C');
    $this->SetFont('Times','',12);
    $this->Ln(20);
  
  }
  function footer()
  {
    $this->SetY(-15);
    $this->SetFont('Arial','',8);
    $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
  }
  function headerTable()
  {
$db = new PDO('mysql:host=localhost;dbname=ecom1','root','');
  //$stmt = $db->query('SELECT * FROM orders,user_info WHERE user_info.user_id= orders.user_id' );
$check=$_SESSION["uid"];
 $stmt = $db->query("SELECT * FROM orders,products,user_info WHERE user_info.user_id = '$check' ");
    $description = array();
  while($data = $stmt->fetch(PDO::FETCH_OBJ))
     {
     $this->SetFont('Times','B',12);
     $this->Cell(45,10,'Name / Company : ',0,0,'L');
     $this->Cell(40,10,$data->first_name ,0,0,'L');
     $this->Cell(30,10,$data->last_name,0,0,'L');
     $this->Ln();
     $this->Cell(20,10,'mobile : ',0,0,'L');
     $this->Cell(15,10,$data->mobile,0,0,'C');
     $this->Ln();
     $this->Cell(20,10,'Address : ',0,0,'L');
     $this->Cell(30,10,$data->address1,0,0,'L');
     $this->Ln();
     break;
    }
    $this->SetFont('Times','B',12);
    $this->Cell(15,10,'QTY',1,0,'C');
    //$this->Cell(35,10,'brand',1,0,'C');
    $this->Cell(160,10,'Description',1,0,'C');
  $this->Cell(25,10,'Amount',1,0,'C');
    $this->Cell(40,10,'Price',1,0,'C');
    //$this->Cell(40,10,'Status',1,0,'C');

    $this->Ln();
  }
  function viewTable($db)
  {

  $description = array();
    $total = 0;
  $this->SetFont('Times','',12);
     $stmt = $db->query('SELECT cart.p_id,products.product_title FROM cart,products' );
   while($data = $stmt->fetch(PDO::FETCH_OBJ))
     {
     array_push($description,$data->p_id);
     }
   $allPrice=0;
   $stat = "Payment";
   $check=$_SESSION["uid"];
   $trx_id = "07M47684BS5725041";
   $std = $db->query("SELECT * FROM cart,products WHERE cart.p_id = products.product_id AND cart.user_id = '$check' ");
   while($data = $std->fetch(PDO::FETCH_OBJ)){
    $cto = "INSERT INTO orders SET order_id = '$data->id',user_id='$data->user_id',product_id = '$data->product_id',qty =' $data->qty',trx_id='$trx_id',p_status = '$stat'";
    $db->query($cto);

    $this->Cell(15,10,$data->product_id,1,0,'C');
    $this->Cell(160,10,$data->product_title,1,0,'L');
    $this->Cell(25,10,$data->qty,1,0,'L');
    $this->Cell(40,10,$data->product_price,1,0,'L');
    //$this->Cell(40,10,$data->p_status,1,0,'L');
     $this->Ln();
    $allPrice=$allPrice+$data->product_price;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ecom1";
     $con = new mysqli($servername, $username, $password,$database);
     $sql="UPDATE decreasenext SET allprice = '$allPrice' WHERE id =1 ";
     $con->query($sql);
        
     
   }
   while($data = $std->fetch(PDO::FETCH_OBJ)){
   $ip_add = getenv("REMOTE_ADDR");
    $sql = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id = -1";
   }
    $this->SetFont('Times','B',16);
    $this->Cell(200,10,"total",1,0,'L');
    $this->Cell(40,10,$allPrice,1,0,'L');
     $this->Ln();
    $this->SetFont('Times','B',16);
    $allPrice=$allPrice+$allPrice*0.07;
    $this->Cell(200,10,"Total + VAT 7%",1,0,'L');
    $this->Cell(40,10,$allPrice,1,0,'L');
   //$this->Cell(40,10,"",1,0,'L');

  }
}
  $sql = "SELECT * FROM decreasenext";
                $check_query = $con->query($sql); 
                $getPasent=$check_query->num_rows;
                // echo "XXXX".$getPasent;
                if ($check_query->num_rows > 0) {
    // output data of each row
                    while($row = $check_query->fetch_assoc()) {               
                        $allpricedb = $row["allprice"];               
                    }
                }else{
                    echo "no in database";
                }
    $sql = "SELECT * FROM promotion";
                $check_query = $con->query($sql); 
                $getPasent=$check_query->num_rows;
                // echo "XXXX".$getPasent;
                if ($check_query->num_rows > 0) {
    // output data of each row
                    while($row = $check_query->fetch_assoc()) {               
                        $decreasenextdb = $row["decreasenext"];               
                    }
                }else{
                    echo "no in database";
                } 
     // echo $allpricedb;
     // echo $decreasenextdb;
                $sql = "SELECT * FROM user_info WHERE user_id='$uid'";
                $check_query = $con->query($sql); 
                $getPasent=$check_query->num_rows;
                // echo "XXXX".$getPasent;
                if ($check_query->num_rows > 0) {
    // output data of each row
                    while($row = $check_query->fetch_assoc()) {               
                        $pointdb = $row["points"];               
                    }
                }else{
                    echo "no in database";
                }
    if($allpricedb>=$decreasenextdb){
      $pointdb=$pointdb+1;
    } 
    // echo $pointdb;         
   $pdf = new myPDF();
   $pdf->AliasNbPages();
   $pdf->AddPage('L','A4',0);
   $pdf->headerTable();
   $pdf->viewTable($db);
   $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ecom1";
     $con = new mysqli($servername, $username, $password,$database);
     $sql="UPDATE user_info SET points = '$pointdb' WHERE user_id ='$uid' ";
     $con->query($sql);
    // echo $pointdb;
    // echo $uid;
      
    $pdf->Output();

?>
