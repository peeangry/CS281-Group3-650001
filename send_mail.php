<?php

include_once "db.php";
// mysql_select_db("ecom1", $con) or die("Error");
mysqli_select_db($con,"ecom1");
$sql = "SELECT email FROM email_info"; // สร้างคำสั่ง SQL เก็บไว้ในตัวแปรชื่อ $SQLCom
$query = mysqli_query($con, $sql);

    $mailSub = $_POST['mail_sub'];
    $mailMsg = $_POST['mail_msg'];
   require 'PHPMailer-master/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   // $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'tls'; //ssl
   $mail ->Host = "smtp.live.com";
   $mail ->Port = 587; // or 465
   // $mail ->IsHTML(true);
   $mail ->IsHTML();
   $mail ->Username = "cs281store@hotmail.com";
   $mail ->Password = "pchana123";
   $mail ->SetFrom("cs281store@hotmail.com","Example");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;

  // echo("initializing");

  //  $mail ->AddAddress('pchanawut@hotmail.com', 'My Friend');
  //  try{
  //     if($mail->send())
  //     {
  //   echo "YESSSSSSSSS";
  //   }
  //   else
  //   {
  //     echo 'Message was not sent.';
  // echo 'Mailer error: ' . $mail->ErrorInfo;
  //   }
  //   }catch (Exception $e){
  //     echo $e;
  //   }
   
  
   
   while($rs = mysqli_fetch_array($query))  //สร้างตัวแปร $rs มารับค่าจากการ fetch array
   {
      // echo "1";
       
      $mail ->AddAddress($rs['email']);

   }

   if($mail->Send())
   {
       echo "<script>alert('Sent Email Sucess');window.location='index.php'</script>";
   }
   else
   {
       echo "<script>alert('Error');window.location='index.php'</script>";
   }

  
 exit();
?>


   

