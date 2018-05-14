<?php
session_start();
if(!isset($_SESSION["uid"])){
  header("location:index.php");
}
require "fpdf181/fpdf.php";
$db = new PDO('mysql:host=localhost;dbname=ecom1','root','');
class myPDF extends FPDF{
  function header()
  {
    $this->SetFont('Arial','B',20);
    $this->Cell(276,5,'Mobile Shop',0,0,'C');
    $this->Ln(10);
    $this->Cell(276,5,'Status Orders',0,0,'C');
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
    $this->Cell(40,10,'Status',1,0,'C');

    $this->Ln();
  }
  function viewTable($db)
  {
  $description = array();
    $total = 0;
  $this->SetFont('Times','',12);
     $stmt = $db->query('SELECT orders.product_id,products.product_title FROM orders,products' );
   while($data = $stmt->fetch(PDO::FETCH_OBJ))
     {
     array_push($description,$data->product_id);
     }
   $allPrice=0;
   $check=$_SESSION["uid"];
   $std = $db->query("SELECT * FROM orders,products WHERE orders.product_id = products.product_id AND orders.user_id = '$check' ");
   while($data = $std->fetch(PDO::FETCH_OBJ)){
     
    $this->Cell(15,10,$data->product_id,1,0,'C');
    $this->Cell(160,10,$data->product_title,1,0,'L');
    $this->Cell(25,10,$data->qty,1,0,'L');
    $this->Cell(40,10,$data->product_price,1,0,'L');
    $this->Cell(40,10,$data->p_status,1,0,'L');
     $this->Ln();
     //$allPrice=$allPrice+$data->product_price;
   }
   
    //$this->SetFont('Times','B',16);
    //$this->Cell(200,10,"total",1,0,'L');
    //$this->Cell(40,10,$allPrice,1,0,'L');
    //$this->Cell(40,10,"",1,0,'L');

  }
}
   $pdf = new myPDF();
   $pdf->AliasNbPages();
   $pdf->AddPage('L','A4',0);
   $pdf->headerTable();
   $pdf->viewTable($db);
   $pdf->Output();

?>
