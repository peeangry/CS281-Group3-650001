<?php 
    include "Connection.php" ;
    include "Member.php" ;

    $firstame = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];
    $type = "user" ;

    $pwd = md5($pwd);

    $mem = new Member($firstame,$lastname,$uid,$pwd,$email,$type);
    
    if($mem->register($conn) == 1){
        echo "<script language=\"JavaScript\">";
        echo "alert('Welcome " . $mem->getfirstname()  . " " . $mem->getlastname()  . "')"; 
        echo "</script>";
        echo "<script> document.location.href=\"../index.php\";</script>";
    }else{
        echo "<script language=\"JavaScript\">";
        echo "alert('Register Fail.')";
        echo "</script>";
        echo "<script> document.location.href=\"../index.php\";</script>";
    }

?>